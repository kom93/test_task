<?php

namespace Kom\CheckoutField\Plugin;

use Kom\CheckoutField\Setup\InstallSchema;

class GuestPaymentInformationManagement extends PaymentInformationManagement
{
    /**
     * @param \Magento\Checkout\Model\GuestPaymentInformationManagement $subject
     * @param \Closure $proceed
     * @param $cartId
     * @param $email
     * @param \Magento\Quote\Api\Data\PaymentInterface $paymentMethod
     * @param \Magento\Quote\Api\Data\AddressInterface $billingAddress
     * @return mixed
     * @throws \Exception
     */
    public function aroundSavePaymentInformationAndPlaceOrder(
        \Magento\Checkout\Model\GuestPaymentInformationManagement $subject,
        \Closure $proceed,
        $cartId,
        $email,
        \Magento\Quote\Api\Data\PaymentInterface $paymentMethod,
        \Magento\Quote\Api\Data\AddressInterface $billingAddress
    ) {
        $requestData = $this->getRequestData();
        $orderId = $proceed($cartId, $email, $paymentMethod, $billingAddress);
        if ($customField = $requestData[PaymentInformationManagement::CHECKOUT_CUSTOM_FIELD_KEY]) {
            $order = $this->orderFactory->create()->load($orderId);
            if ($order->getEntityId()) {
                $order->setData(InstallSchema::ORDER_CUSTOM_FIELD_KEY, $customField)
                    ->save();
            }
        }
        return $orderId;
    }
}