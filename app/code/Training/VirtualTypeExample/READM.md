# Magento 2 Virtual Types Example Module

**Module Name**: `Training_VirtualTypeExample`
**Purpose**: Demonstrates how to use **virtual types** in Magento 2 for flexible dependency injection and service customization without duplicating classes or relying on global preferences.

---

## 🧠 What This Module Teaches

- How to define service contracts and repositories
- How to create multiple versions of a class using **virtual types**
- How to wire different dependencies into the same class in different contexts
- When and why to use **virtual types** vs **preferences** vs **plugins**
- How to inject customized logic into **ViewModels** for frontend templates

---

## 📦 Module Structure

```text
Training_VirtualTypeExample/
├── Api/
│   ├── WarehouseManagementInterface.php
│   └── WarehouseRepositoryInterface.php
├── Model/
│   ├── WarehouseManagement.php
│   ├── WarehouseManagementExtend.php
│   └── WarehouseRepository.php
├── ViewModel/
│   └── Example.php
├── view/frontend/templates/
│   └── example.phtml
├── etc/
│   ├── module.xml
│   └── di.xml
└── registration.php
