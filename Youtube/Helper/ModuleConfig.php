<?php

namespace Kom\Youtube\Helper;

use Kom\Base\Helper\ModuleConfig as BaseHelper;

class ModuleConfig extends BaseHelper
{
    /**
     * {@inheritdoc}
     */
    protected function getModuleScopePath()
    {
        return 'youtube/configuration';
    }

    /**
     * @return string
     */
    public function getApiKey()
    {
        return $this->getConfigValue('api_key');
    }
}
