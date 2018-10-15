define(['jquery', 'ko', 'uiComponent'], function ($, ko, Component) {
    'use strict';

    return Component.extend({
        defaults: {
            template: 'Kom_CheckoutField/checkout/shipping/additional-block'
        },
        canVisibleBlock: window.checkoutConfig.show_custom_field
    });
});
