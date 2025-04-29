# CrocoIT_UpdateCustomer

## Overview

`CrocoIT_UpdateCustomer` is a custom Magento 2 module that introduces a secure workflow for updating a logged-in customer's email address and password using OTP (One-Time Password) verification via GraphQL APIs.

This module enhances customer account security by ensuring that only verified email addresses can be set for customer accounts, reducing the risk of email-based account takeovers.

---

## Features

- ✅ Send OTP to the new email address for verification.
- 🔐 Update customer email and password securely after OTP validation.
- 💬 Clear response structure for both success and error states.
- 📡 Fully compatible with Magento 2 GraphQL API framework.
- 👤 Requires the customer to be authenticated.

---

Then run the following Magento CLI commands:

```bash
bin/magento module:enable CrocoIT_UpdateCustomer
bin/magento setup:upgrade
bin/magento cache:flush
```

---

## GraphQL API

### 1. Send OTP to New Email

**Mutation**

```graphql
mutation {
  sendCustomerEmailUpdateOtp(
    input: { email: "newemail@example.com" }
  ) {
    status
    message
  }
}
```

### 2. Update Email and Password

**Mutation**

```graphql
mutation {
  updateCustomerEmailWithOtp(
    input: {
      email: "newemail@example.com"
      password: "NewPassword123!"
      otp: "123456"
    }
  ) {
    customer {
      id
      email
      firstname
      lastname
    }
  }
}
```

---

## Technical Details

- **Module Name**: `CrocoIT_UpdateCustomer`
- **Namespace**: `CrocoIT\UpdateCustomer`
- **Entry Point**: `registration.php`
- **Configuration**: `etc/module.xml`
- **GraphQL Schema**: `etc/graphql/schema.graphqls`
- **Resolvers**:
    - `\CrocoIT\UpdateCustomer\Model\Resolver\SendCustomerEmailUpdateOtp`
    - `\CrocoIT\UpdateCustomer\Model\Resolver\UpdateCustomerEmailWithOtp`

---

## Requirements

- Magento 2.4.0 or higher
- GraphQL must be enabled
- Customer must be authenticated to use mutations

---

## Security Considerations

- OTPs should be securely generated and have a short expiry window.
- Rate-limiting should be implemented to prevent abuse of OTP generation.
- Consider hashing/storing OTPs securely in the database or using Magento's cache system.

