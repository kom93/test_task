<?php

namespace Kom\HelloWorld\Block;

use Kom\HelloWorld\Helper\ModuleConfig;
use Magento\Framework\View\Element\Template;

class Custom extends Template
{
    /**
     * @var ModuleConfig
     */
    protected $moduleConfig;

    /**
     * Custom constructor.
     * @param ModuleConfig $moduleConfig
     * @param Template\Context $context
     * @param array $data
     */
    public function __construct(
        ModuleConfig $moduleConfig,
        Template\Context $context,
        array $data = []
    ) {
        $this->moduleConfig = $moduleConfig;
        parent::__construct($context, $data);
    }

    /**
     * {@inheritdoc}
     */
    protected function _toHtml()
    {
        return $this->moduleConfig->isActive() ? parent::_toHtml() : '';
    }
}