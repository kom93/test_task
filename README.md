# 1. Kom/Base

## 1.1. Requirements
Magento 2.2.x

PHP 7.x
    
## 1.2. Technical features
Base Vendor Magento 2 extension. Designed to create styled general configuration tab, called "Kom Extensions", at Admin Dashboard -> Stores -> Configuration,
and define abstract helper for all other extensions.

## 1.3. Installation
Typical Magento 2 extensions installation.*


# 2. Kom/HelloWorld

## 2.1. Requirements
Magento 2.2.x

PHP 7.x
    
## 2.2. Technical features
Sample Magento 2 extension. Displays custom "Hello World" message on each page, different for logged/not logged in customers.
Also shows current customer's name using custom CustomerData section. 
Can be disabled at Admin Dashboard -> Stores -> Configuration -> Kom Extensions -> HelloWorld Configuration.

## 2.3. Installation
Typical Magento 2 extensions installation.*


# 3. Kom/PaymentTest

## 3.1. Requirements
Magento 2.2.x

PHP 7.x
    
## 3.2. Technical features
Extension designed to create custom offline payment method, it's configuration at payments list, and display this method at checkout.

## 3.3. Installation
Typical Magento 2 extensions installation.*


# 4. Kom/ShippingTest

## 4.1. Requirements
Magento 2.2.x

PHP 7.x
    
## 4.2. Technical features
Extension designed to create custom offline shipping method, it's configuration at shipping methods list, and display this method at checkout.

## 4.3. Installation
Typical Magento 2 extensions installation.*


# 5. Kom/CheckoutField

## 5.1. Requirements
Magento 2.2.x

PHP 7.x
    
## 5.2. Technical features
Extension designed to create custom field ("Sale Recommendation") at checkout, save specified by customer value to "sales_flat_order" table,
and show this value to admin at order view page (under "Placed from IP" field). "sales_flat_order" custom column and order extension attribute are used to implement it.
Can be disabled at Admin Dashboard -> Stores -> Configuration -> Kom Extensions -> Checkout Field Configuration.

## 5.3. Installation
Typical Magento 2 extensions installation.*


# 6. Kom/AttributeTab

## 6.1. Requirements
Magento 2.2.x

PHP 7.x
    
## 6.2. Technical features
Extension designed to create custom page (with url "/kom") displaying chosen attribute and it's options as tabs. Every tab contains products list, filtered by
selected attribute option. Extension can be disabled, and attribute can be selected at Admin Dashboard -> Stores -> Configuration -> Kom Extensions -> Attribute Tab Configuration. 

## 6.3. Installation
Typical Magento 2 extensions installation.*


# 7. Kom/Youtube

## 7.1. Requirements
Magento 2.2.x

PHP 7.x

madcoda/php-youtube-api 1.*
    
## 7.2. Technical features
Extension designed to display tab on product page with youtube videos, related to product. 
Product meta keywords are used for video search.
Extension can be disabled at Admin Dashboard -> Stores -> Configuration -> Kom Extensions -> Youtube Configuration. 

## 7.3. Installation
Run "composer require madcoda/php-youtube-api" before extension installation.
Typical Magento 2 extensions installation.*
You need to specify Youtube API key at module configuration page (Admin Dashboard -> Stores -> Configuration -> Kom Extensions -> Youtube Configuration).


# Summary

These extensions are developed only as a code examples, and should not be used at production.
They are tested on Magento 2.2.3 version running on apache2 with PHP 7.1 as module, 
but should work on Magento 2.0.x - 2.3.x running on nginx/apache2 with PHP 5.6.x/7.x as well.

\* Typical Magento 2 extensions installation: 
 - Upload module files to your server (directory MAGENTO_ROOT/app/code/Kom, create if does not exist)
 - Run ssh command "bin/magento setup:upgrade"
 - Flush magento cache (from admin dashboard, or by using ssh command "bin/magento cache:flush")
 - (Only for "production" deploy mode) Run ssh command "bin/magento setup:di:compile"
 - (Only for "production" deploy mode) Run ssh command "bin/magento setup:static-content:deploy"