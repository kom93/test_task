<?php

namespace Kom\CheckoutField\Model;

use Kom\CheckoutField\Helper\ModuleConfig;
use Magento\Checkout\Model\ConfigProviderInterface;

class CustomConfigProvider implements ConfigProviderInterface
{
    /**
     * @var ModuleConfig
     */
    protected $moduleConfig;

    /**
     * CommentBlockConfigProvider constructor.
     * @param ModuleConfig $moduleConfig
     */
    public function __construct(
        ModuleConfig $moduleConfig
    ) {
        $this->moduleConfig = $moduleConfig;
    }

    /**
     * @return array
     */
    public function getConfig()
    {
        return ['show_custom_field' => $this->moduleConfig->isActive()];
    }
}