define(['jquery', 'Magento_Payment/js/view/payment/cc-form'], function ($, Component) {
        'use strict';
        return Component.extend({
            defaults: {
                template: 'Kom_PaymentTest/payment/paymenttest'
            },
            context: function () {
                return this;
            },
            getCode: function () {
                return 'kom_paymenttest';
            },
            isActive: function () {
                return true;
            }
        });
    }
);