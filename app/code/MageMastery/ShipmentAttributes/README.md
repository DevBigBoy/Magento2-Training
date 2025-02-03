# 🔍 What Are Extension Attributes in Magento 2?

**Extension Attributes** are a way to **extend Magento's data interfaces** (mostly for entities like `Customer`, `Order`, `Product`, etc.) **without modifying the core code**. They allow adding custom fields that can be used in:

- **Repositories**
- **Web APIs (REST/SOAP)**
- **Service contracts**

> ⚠️ They're different from custom attributes (EAV attributes) and are meant for **non-EAV entities**.

---

## 🧱 Step-by-Step: How to Add Extension Attributes in Magento 2

Let’s say we want to **add a `delivery_note` field** to the `Order` entity.

---

### ✅ Step 1: Create a Setup/Upgrade Script to Add a Column to the Database

```php
// app/code/Vendor/Module/Setup/Patch/Data/AddDeliveryNoteToSalesOrder.php

namespace Vendor\Module\Setup\Patch\Data;

use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class AddDeliveryNoteToSalesOrder implements DataPatchInterface
{
    private $moduleDataSetup;

    public function __construct(ModuleDataSetupInterface $moduleDataSetup)
    {
        $this->moduleDataSetup = $moduleDataSetup;
    }

    public function apply()
    {
        $this->moduleDataSetup->startSetup();

        $connection = $this->moduleDataSetup->getConnection();
        $connection->addColumn(
            'sales_order',
            'delivery_note',
            [
                'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                'length' => 255,
                'nullable' => true,
                'comment' => 'Delivery Note',
            ]
        );

        $this->moduleDataSetup->endSetup();
    }

    public static function getDependencies() { return []; }
    public function getAliases() { return []; }
}
```

---

### ✅ Step 2: Create `extension_attributes.xml`

```xml
<!-- app/code/Vendor/Module/etc/extension_attributes.xml -->
<?xml version="1.0"?>
<config xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
        xsi:noNamespaceSchemaLocation="urn:magento:framework:Api/etc/extension_attributes.xsd">

    <extension_attributes for="Magento\Sales\Api\Data\OrderInterface">
        <attribute code="delivery_note" type="string" />
    </extension_attributes>

</config>
```

---

### ✅ Step 3: Create a Plugin to Load/Save the Extension Attribute

This is needed because extension attributes don’t automatically get populated/saved unless you do it manually via plugins.

#### Load Extension Attribute:

```php
// app/code/Vendor/Module/Plugin/OrderRepositoryPlugin.php

namespace Vendor\Module\Plugin;

use Magento\Sales\Api\Data\OrderExtensionFactory;
use Magento\Sales\Api\Data\OrderInterface;

class OrderRepositoryPlugin
{
    protected $extensionFactory;

    public function __construct(OrderExtensionFactory $extensionFactory)
    {
        $this->extensionFactory = $extensionFactory;
    }

    public function afterGet(
        \Magento\Sales\Api\OrderRepositoryInterface $subject,
        OrderInterface $order
    ) {
        $orderModel = $order->getDataModel();
        $extensionAttributes = $order->getExtensionAttributes();

        if ($extensionAttributes === null) {
            $extensionAttributes = $this->extensionFactory->create();
        }

        $extensionAttributes->setDeliveryNote($orderModel->getData('delivery_note'));
        $order->setExtensionAttributes($extensionAttributes);

        return $order;
    }

    public function afterGetList(
        \Magento\Sales\Api\OrderRepositoryInterface $subject,
        \Magento\Sales\Api\Data\OrderSearchResultInterface $searchResult
    ) {
        foreach ($searchResult->getItems() as $order) {
            $this->afterGet($subject, $order);
        }
        return $searchResult;
    }

    public function beforeSave(
        \Magento\Sales\Api\OrderRepositoryInterface $subject,
        OrderInterface $order
    ) {
        $extensionAttributes = $order->getExtensionAttributes();
        if ($extensionAttributes && $extensionAttributes->getDeliveryNote()) {
            $order->setData('delivery_note', $extensionAttributes->getDeliveryNote());
        }

        return [$order];
    }
}
```

---

## 🎯 Best Practices for Extension Attributes

- 🧼 **Do not use extension attributes for EAV entities** like products or customers unless you really need to expose extra data via API.
- 🔁 **Always create plugins for `beforeSave`, `afterGet`, and `afterGetList`** to ensure consistency.
- 🔍 **Use them for API communication or when working with repositories**, as they're not accessible from `getData()` directly.
- 🧪 **Test API endpoints** after adding extension attributes using Postman or Swagger to confirm they’re working.

---

## 🧪 Real-Life Usage Example

After you’ve set up everything, a `GET /V1/orders/:id` call will now include:

```json
{
  "extension_attributes": {
    "delivery_note": "Leave at the front door."
  }
}
```

And you can also **submit** this via the `POST /V1/orders` or `PUT` operations.

---

## 🧠 Points You Might Want to Explain in Your Session

- Difference between **extension attributes** and **custom attributes**
- The need for plugins (loading/saving)
- Usage in Web APIs
- How extension attributes fit into **Service Contracts**
- Gotchas when working with collections or custom entities
- Auto-generation of `ExtensionInterface` (check `var/generation` in older versions or `generated/code`)
