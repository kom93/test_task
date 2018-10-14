<?php

namespace Kom\PaymentTest\Model;

class PaymentTest extends \Magento\Payment\Model\Method\Cc
{
    const CODE = 'kom_paymenttest';

    /**
     * @var string
     */
    protected $_code = self::CODE;

    /**
     * @var bool
     */
    protected $_canAuthorize = true;

    /**
     * @var bool
     */
    protected $_canCapture = true;

    /**
     * @param \Magento\Payment\Model\InfoInterface $payment
     * @param float $amount
     * @return $this|\Magento\Payment\Model\Method\Cc
     */
    public function capture(\Magento\Payment\Model\InfoInterface $payment, $amount)
    {
        $transId = time();
        $payment->setTransactionId($transId);
        $payment->setParentTransactionId($transId);
        $payment->setIsTransactionClosed(1);
        return $this;
    }

    /**
     * @return string
     */
    public function getConfigPaymentAction()
    {
        return self::ACTION_AUTHORIZE_CAPTURE;
    }
}