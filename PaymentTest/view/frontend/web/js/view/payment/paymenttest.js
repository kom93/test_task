define(['uiComponent', 'Magento_Checkout/js/model/payment/renderer-list'], function (Component, rendererList) {
    'use strict';
    rendererList.push(
        {
            type: 'kom_paymenttest',
            component: 'Kom_PaymentTest/js/view/payment/method-renderer/paymenttest'
        }
    );
    return Component.extend({});
});
