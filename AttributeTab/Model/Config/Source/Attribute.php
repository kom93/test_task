<?php

namespace Kom\AttributeTab\Model\Config\Source;

use Magento\Catalog\Setup\CategorySetup;
use Magento\Eav\Model\ResourceModel\Entity\Attribute\CollectionFactory;

class Attribute implements \Magento\Framework\Option\ArrayInterface
{
    /**
     * @var CollectionFactory
     */
    protected $collectionFactory;

    /**
     * @param CollectionFactory $collectionFactory
     */
    public function __construct(CollectionFactory $collectionFactory)
    {
        $this->collectionFactory = $collectionFactory;
    }

    /**
     * @return array
     */
    public function toOptionArray()
    {
        $collection = $this->collectionFactory->create()
            ->addFieldToFilter('entity_type_id', CategorySetup::CATALOG_PRODUCT_ENTITY_TYPE_ID)
            ->addFieldToFilter('frontend_input', 'select')
            ->addFieldToFilter('is_user_defined', true);
        $result = [];
        foreach ($collection as $attribute) {
            $result[] = [
                'value' => $attribute->getAttributeCode(),
                'label' => $attribute->getFrontendLabel()
            ];
        }
        return $result;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        $optionArray = $this->toOptionArray();
        $array = [];
        foreach ($optionArray as $option) {
            $array[$option['value']] = $option['label'];
        }
        return $array;
    }
}
