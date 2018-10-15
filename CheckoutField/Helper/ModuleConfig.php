<?php

namespace Kom\CheckoutField\Helper;

use Kom\Base\Helper\ModuleConfig as BaseHelper;

class ModuleConfig extends BaseHelper
{
    /**
     * {@inheritdoc}
     */
    protected function getModuleScopePath()
    {
        return 'checkoutfield/configuration';
    }
}
