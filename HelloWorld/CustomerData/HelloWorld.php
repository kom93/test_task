<?php

namespace Kom\HelloWorld\CustomerData;

use Kom\HelloWorld\Helper\ModuleConfig;
use Magento\Customer\CustomerData\SectionSourceInterface;
use Magento\Customer\Model\Session;
use Magento\Framework\UrlInterface;

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
     * @var UrlInterface
     */
    protected $url;

    /**
     * HelloWorld constructor.
     * @param ModuleConfig $moduleConfig
     * @param Session $customerSession
     * @param UrlInterface $url
     */
    public function __construct(
        ModuleConfig $moduleConfig,
        Session $customerSession,
        UrlInterface $url
    ) {
        $this->moduleConfig = $moduleConfig;
        $this->customerSession = $customerSession;
        $this->url = $url;
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
            'custom_message' => __(
                'Hello World! And you, %1! Check <a href="%2">this</a> attribute page (if enabled).',
                $name,
                $this->url->getUrl('kom')
            )
        ];
    }
}