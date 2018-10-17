<?php

namespace Kom\AttributeTab\Helper;

use Kom\Base\Helper\ModuleConfig as BaseHelper;

class ModuleConfig extends BaseHelper
{
    /**
     * {@inheritdoc}
     */
    protected function getModuleScopePath()
    {
        return 'attributetab/configuration';
    }

    /**
     * @return string
     */
    public function getAttributeCode()
    {
        return $this->getConfigValue('attribute');
    }
}
