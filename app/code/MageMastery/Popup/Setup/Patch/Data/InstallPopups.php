<?php
/**
 * Copyright © MageMastery. All rights reserved.
 * See COPYING.txt for license details.
 */

declare(strict_types=1);

namespace MageMastery\Popup\Setup\Patch\Data;

use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Stdlib\DateTime\DateTime;
use Magento\Framework\Setup\Patch\PatchRevertableInterface;
use Magento\Framework\DB\Ddl\Table;

/**
 * Class InstallPopups
 *
 * @package MageMastery\Popup\Setup\Patch\Data
 */
class InstallPopups implements DataPatchInterface, PatchRevertableInterface
{
    /**
     * @var ModuleDataSetupInterface
     */
    private $setup;

    /**
     * @var DateTime
     */
    private $dateTime;

    /**
     * InstallPopups constructor.
     * @param ModuleDataSetupInterface $setup
     * @param DateTime $dateTime
     */
    public function __construct(
        ModuleDataSetupInterface $setup,
        DateTime $dateTime
    ) {
        $this->setup = $setup;
        $this->dateTime = $dateTime;
    }

    /**
     * {@inheritdoc}
     */
    public function apply(): void
    {
        // Getting the setup connection
        $connection = $this->setup->getConnection();

        // Table name
        $table = $this->setup->getTable('magemastery_popup');

        // Prepare sample data
        $data = [];
        $currentTimestamp = $this->dateTime->gmtDate(); // Get current timestamp for 'created_at' and 'updated_at'

        // Insert 10 sample records
        for ($i = 1; $i <= 10; $i++) {
            $data[] = [
                'name' => 'Popup ' . $i,
                'content' => 'This is the content for popup ' . $i,
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp,
                'is_active' => 1,
                'timeout' => rand(5, 30), // Random timeout between 5 and 30 seconds
            ];
        }

        // Insert data into the table
        $connection->insertMultiple($table, $data);
    }

    /**
     * {@inheritdoc}
     */
    public static function getDependencies(): array
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public function revert(): void
    {
        // You can implement a revert method if you want to undo the patch.
        // In this case, we'll just delete all the records we inserted.
        $connection = $this->setup->getConnection();
        $table = $this->setup->getTable('magemastery_popup');
        $connection->delete($table, '1=1'); // Delete all records in the popup table
    }

    /**
     * {@inheritdoc}
     */
    public function getAliases(): array
    {
        return [];
    }
}
