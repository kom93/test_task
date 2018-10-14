<?php

namespace Kom\HelloWorld\CustomerData;

use Kom\HelloWorld\Helper\ModuleConfig;
use Magento\Customer\CustomerData\SectionSourceInterface;
use Magento\Customer\Model\Session;

class HelloWorld implements SectionSourceInterface
{
    /**
     * @var ModuleConfig
     */
    protected $moduleConfig;

    /**
     * @var Session
     */
    protected $customerSession;

    /**
     * HelloWorld constructor.
     * @param ModuleConfig $moduleConfig
     * @param Session $customerSession
     */
    public function __construct(
        ModuleConfig $moduleConfig,
        Session $customerSession
    ) {
        $this->moduleConfig = $moduleConfig;
        $this->customerSession = $customerSession;
    }

    /**
     * @return array
     */
    public function getSectionData()
    {
        if ($this->customerSession->isLoggedIn()) {
            $name = $this->customerSession->getCustomer()->getName();
        } else {
            $name = __('anonymous');
        }
        return [
            'custom_message' => __('Hello World! And you, %1 !', $name)
        ];
    }
}