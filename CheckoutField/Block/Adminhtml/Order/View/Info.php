<?php

namespace Kom\CheckoutField\Block\Adminhtml\Order\View;

class Info extends \Magento\Sales\Block\Adminhtml\Order\View\Info
{
    /**
     * {@inheritdoc}
     */
    public function getTemplate()
    {
        return 'Kom_CheckoutField::order/view/info.phtml';
    }
}