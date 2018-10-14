<?php

namespace Kom\AttributeTab\Controller\Index;

use Kom\AttributeTab\Helper\ModuleConfig;
use Magento\Framework\App\Action\Context;

class Index extends \Magento\Framework\App\Action\Action
{
    /**
     * @var ModuleConfig
     */
    protected $moduleConfig;

    /**
     * Index constructor.
     * @param ModuleConfig $moduleConfig
     * @param Context $context
     */
    public function __construct(
        ModuleConfig $moduleConfig,
        Context $context
    ) {
        $this->moduleConfig = $moduleConfig;
        parent::__construct($context);
    }

    /**
     * {@inheritdoc}
     */
    public function execute()
    {
        if ($this->moduleConfig->isActive()) {
            $this->_view->loadLayout()->renderLayout();
        } else {
            $this->_forward('index', 'noroute', 'cms');
        }
    }
}
