<?php

namespace Kom\CheckoutField\Plugin;

use Kom\CheckoutField\Setup\InstallSchema;
use Magento\Quote\Api\Data\PaymentInterface;

class PaymentInformationManagement
{
    const CHECKOUT_CUSTOM_FIELD_KEY = 'custom_field';
    /**
     * @var \Magento\Sales\Model\OrderFactory
     */
    protected $orderFactory;

    /**
     * @var \Magento\Framework\Json\Helper\Data
     */
    protected $jsonHelper;

    /**
     * @var \Magento\Framework\App\Request\Http
     */
    protected $request;

    /**
     * @var \Magento\Checkout\Model\Session
     */
    protected $checkoutSession;

    /**
     * PaymentInformationManagement constructor.
     * @param \Magento\Framework\Json\Helper\Data $jsonHelper
     * @param \Magento\Sales\Model\OrderFactory $orderFactory
     * @param \Magento\Framework\App\Request\Http $request
     * @param \Magento\Checkout\Model\Session $checkoutSession
     */
    public function __construct(
        \Magento\Framework\Json\Helper\Data $jsonHelper,
        \Magento\Sales\Model\OrderFactory $orderFactory,
        \Magento\Framework\App\Request\Http $request,
        \Magento\Checkout\Model\Session $checkoutSession
    ) {
        $this->jsonHelper = $jsonHelper;
        $this->orderFactory = $orderFactory;
        $this->request = $request;
        $this->checkoutSession = $checkoutSession;
    }

    /**
     * @param \Magento\Checkout\Model\PaymentInformationManagement $subject
     * @param \Closure $proceed
     * @param $cartId
     * @param PaymentInterface $paymentMethod
     * @param \Magento\Quote\Api\Data\AddressInterface|null $billingAddress
     * @return mixed
     */
    public function aroundSavePaymentInformation(
        \Magento\Checkout\Model\PaymentInformationManagement $subject,
        \Closure $proceed,
        $cartId,
        PaymentInterface $paymentMethod,
        \Magento\Quote\Api\Data\AddressInterface $billingAddress = null
    ) {
        $requestData = $this->getRequestData();
        if (!empty($requestData[self::CHECKOUT_CUSTOM_FIELD_KEY])) {
            $this->checkoutSession->setData(self::CHECKOUT_CUSTOM_FIELD_KEY,
                $requestData[self::CHECKOUT_CUSTOM_FIELD_KEY]);
        }
        return $proceed($cartId, $paymentMethod, $billingAddress);
    }

    /**
     * @param \Magento\Quote\Model\QuoteManagement $subject
     * @param \Closure $proceed
     * @param $cartId
     * @param PaymentInterface|null $paymentMethod
     * @throws \Exception
     */
    public function aroundPlaceOrder(
        \Magento\Quote\Model\QuoteManagement $subject,
        \Closure $proceed,
        $cartId,
        PaymentInterface $paymentMethod = null
    ) {
        $orderId = $proceed($cartId, $paymentMethod);
        if ($customField = $this->checkoutSession->getData(self::CHECKOUT_CUSTOM_FIELD_KEY)) {
            /** @param \Magento\Sales\Model\OrderFactory $order */
            $order = $this->orderFactory->create()->load($orderId);
            if ($order->getEntityId()) {
                $order->setData(InstallSchema::ORDER_CUSTOM_FIELD_KEY, $customField)
                    ->save();
                $this->checkoutSession->setData(self::CHECKOUT_CUSTOM_FIELD_KEY, '');
            }
        }
    }

    /**
     * @return array
     */
    protected function getRequestData()
    {
        $requestBody = $this->request->getContent();
        return $this->jsonHelper->jsonDecode($requestBody);
    }
}