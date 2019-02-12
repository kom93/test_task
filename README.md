# 1. Kom/Base

## 1. Requirements
Magento 2.2.x
PHP 7.x
    
## 2. Technical features
Base Vendor Magento 2 extension. Designed to create styled general configuration tab, called "Kom Extensions", at Admin Dashboard -> Stores -> Configuration,
and define abstract helper for all other extensions.

## 3. Installation
Typical Magento 2 extensions installation.*


# 2. Kom/HelloWorld

## 1. Requirements
Magento 2.2.x
PHP 7.x
    
## 2. Technical features
Sample Magento 2 extension. Displays custom "Hello World" message on each page, different for logged/not logged in customers.
Also shows current customer's name using custom CustomerData section. 
Can be disabled at Admin Dashboard -> Stores -> Configuration -> Kom Extensions -> HelloWorld Configuration.

## 3. Installation
Typical Magento 2 extensions installation.*


# 3. Kom/PaymentTest

## 1. Requirements
Magento 2.2.x
PHP 7.x
    
## 2. Technical features
Extension designed to create custom offline payment method, it's configuration at payments list, and display this method at checkout.

## 3. Installation
Typical Magento 2 extensions installation.*


# 4. Kom/ShippingTest

## 1. Requirements
Magento 2.2.x
PHP 7.x
    
## 2. Technical features
Extension designed to create custom offline shipping method, it's configuration at shipping methods list, and display this method at checkout.

## 3. Installation
Typical Magento 2 extensions installation.*


# 5. Kom/CheckoutField

## 1. Requirements
Magento 2.2.x
PHP 7.x
    
## 2. Technical features
Extension designed to create custom field ("Sale Recommendation") at checkout, save specified by customer value to "sales_flat_order" table,
and show this value to admin at order view page (under "Placed from IP" field). "sales_flat_order" custom column and order extension attribute are used to implement it.
Can be disabled at Admin Dashboard -> Stores -> Configuration -> Kom Extensions -> Checkout Field Configuration.

## 3. Installation
Typical Magento 2 extensions installation.*


# 6. Kom/AttributeTab

## 1. Requirements
Magento 2.2.x
PHP 7.x
    
## 2. Technical features
Extension designed to create custom page (with url "/kom") displaying chosen attribute and it's options as tabs. Every tab contains products list, filtered by
selected attribute option. Extension can be disabled, and attribute can be selected at Admin Dashboard -> Stores -> Configuration -> Kom Extensions -> Attribute Tab Configuration. 

## 3. Installation
Typical Magento 2 extensions installation.*


# 7. Kom/Youtube

## 1. Requirements
Magento 2.2.x
PHP 7.x
madcoda/php-youtube-api 1.*
    
## 2. Technical features
Extension designed to display tab on product page with youtube videos, related to product. 
Product meta keywords are used for video search.
Extension can be disabled at Admin Dashboard -> Stores -> Configuration -> Kom Extensions -> Youtube Configuration. 

## 3. Installation
Run "composer require madcoda/php-youtube-api" before extension installation.
Typical Magento 2 extensions installation.*
You need to specify Youtube API key at module configuration page (Admin Dashboard -> Stores -> Configuration -> Kom Extensions -> Youtube Configuration).
