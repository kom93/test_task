<?php

namespace Kom\AttributeTab\Block\Attribute;

use Kom\AttributeTab\Helper\ModuleConfig;
use Magento\Catalog\Model\Product;
use Magento\Catalog\Model\ResourceModel\Product\CollectionFactory;
use Magento\Eav\Model\Config;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\View\Element\Template;

class Tab extends Template
{
    /**
     * Options limit due to incorrect tab styles if more then one tab rows
     */
    const OPTIONS_LIMIT = 8;

    /**
     * @var ModuleConfig
     */
    protected $moduleConfig;

    /**
     * @var Config
     */
    protected $config;

    /**
     * @var CollectionFactory
     */
    protected $collectionFactory;

    /**
     * Tab constructor.
     * @param ModuleConfig $moduleConfig
     * @param Config $config
     * @param Template\Context $context
     * @param CollectionFactory $collectionFactory
     * @param array $data
     */
    public function __construct(
        ModuleConfig $moduleConfig,
        Config $config,
        Template\Context $context,
        CollectionFactory $collectionFactory,
        array $data = []
    ) {
        $this->moduleConfig = $moduleConfig;
        $this->config = $config;
        $this->collectionFactory = $collectionFactory;
        parent::__construct($context, $data);
    }

    /**
     * @return array|bool
     */
    public function getAttributeData()
    {
        $attributeCode = $this->moduleConfig->getAttributeCode();
        try {
            $result = [
                'options' => []
            ];
            $attribute = $this->config->getAttribute(Product::ENTITY, $attributeCode);
            $result['title'] = __($attribute->getDefaultFrontendLabel());
            $count = 0;
            foreach ($attribute->getOptions() as $option) {
                if ($count > self::OPTIONS_LIMIT) {
                    break;
                }
                if ($label = trim($option->getLabel())) {
                    $value = $option->getValue();
                    $optionData = [
                        'title' => $label,
                        'products' => []
                    ];
                    $productCollection = $this->collectionFactory->create()
                        ->addFieldToSelect('*')
                        ->addAttributeToFilter($attributeCode, $value)
                        ->addOrder('name', 'ASC');
                    foreach ($productCollection as $product) {
                        $optionData['products'][] = "{$product->getName()} ({$product->getSku()})";
                    }
                    $result['options'][$value] = $optionData;
                }
                $count++;
            }
            return $result;
        } catch (LocalizedException $e) {
            //no attribute found
        }
        return false;
    }
}