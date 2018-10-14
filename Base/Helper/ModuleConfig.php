<?php

namespace Kom\Base\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;
use Magento\Store\Model\ScopeInterface;
use Magento\Store\Model\StoreManager;

abstract class ModuleConfig extends AbstractHelper
{
    /**
     * @var StoreManager
     */
    protected $storeManager;

    /**
     * ModuleConfig constructor.
     * @param StoreManager $storeManager
     * @param Context $context
     */
    public function __construct(
        StoreManager $storeManager,
        Context $context
    ) {
        $this->storeManager = $storeManager;
        parent::__construct($context);
    }

    /**
     * @param $paramName
     * @return mixed
     */
    protected function getConfigValue($paramName)
    {
        return $this->scopeConfig->getValue($this->getModuleScopePath() . '/' . $paramName,
            ScopeInterface::SCOPE_STORES,
            $this->storeManager->getStore()->getCode());
    }

    /**
     * @return bool
     */
    public function isActive()
    {
        return boolval($this->getConfigValue('active'));
    }

    /**
     * Should return module settings section ID.
     *
     * @return string
     */
    abstract protected function getModuleScopePath();

}
