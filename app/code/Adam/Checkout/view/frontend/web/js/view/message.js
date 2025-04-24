define([
    'uiComponent',
    'ko',
    'Magento_Customer/js/model/customer',
    'Magento_Customer/js/customer-data'
], function (Component, ko, customer, customerData) {
    'use strict';

    return Component.extend({
        defaults: {
            template: 'Adam_Checkout/message',
            message: '',
            messagePrefix: ''
        },

        isCustomerLoggedIn: customer.isLoggedIn,

        initialize: function () {

            this._super();

            // if (customer.isLoggedIn()) {
            //     const customerInfo = customerData.get('customer')();
            //     const firstName = customerInfo.firstname || 'Guest';
            //
            //     this.message = this.messagePrefix.replace('%1', firstName);
            // }

            // return this;
        }
    });
});
