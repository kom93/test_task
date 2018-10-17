<?php

namespace Kom\Youtube\Block\Product;

use Kom\Youtube\Helper\ModuleConfig;

class Youtube extends \Magento\Catalog\Block\Product\View\Description
{
    /**
     * @var ModuleConfig
     */
    protected $moduleConfig;

    /**
     * @var string
     */
    protected $youtubeLinkTemplate = 'https://www.youtube.com/embed/%s';

    /**
     * Youtube constructor.
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param ModuleConfig $moduleConfig
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Framework\Registry $registry,
        ModuleConfig $moduleConfig,
        array $data = []
    ) {
        $this->moduleConfig = $moduleConfig;
        parent::__construct($context, $registry, $data);
        $this->setTitle(__('Youtube'));
    }

    /**
     * @return \Madcoda\Youtube\Youtube
     * @throws \Exception
     */
    protected function getYoutubeClient()
    {
        return new \Madcoda\Youtube\Youtube(
            [
                'key' => $this->moduleConfig->getApiKey(),
                'referer' => $this->getUrl('/')
            ]
        );
    }

    /**
     * @return array[]|false|string[]
     */
    protected function getProductMetaKeywords()
    {
        return preg_split("/[ ,]+/", $this->getProduct()->getMetaKeyword());
    }

    /**
     * @return array|bool
     */
    public function getVideoLinks()
    {
        try {
            $keywords = $this->getProductMetaKeywords();
            $client = $this->getYoutubeClient();
            $videoLinks = [];
            foreach ($keywords as $keyword) {
                if ($keyword) {
                    $videos = $client->search($keyword, 2);
                    foreach ($videos as $videoData) {
                        if (isset($videoData->id->videoId)) {
                            $videoLinks[] = $this->getVideoLinkById($videoData->id->videoId);
                        }
                    }
                }
            }
            return $videoLinks;
        } catch (\Exception $e) {
            //failed to retrieve videos
        }
        return false;
    }

    /**
     * @param string $id
     * @return string
     */
    public function getVideoLinkById($id)
    {
        return sprintf($this->youtubeLinkTemplate, $id);
    }

    /**
     * {@inheritdoc}
     */
    protected function _toHtml()
    {
        return $this->moduleConfig->isActive() ? parent::_toHtml() : '';
    }
}
