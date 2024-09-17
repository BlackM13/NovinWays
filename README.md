NovinWays
==========

package for NovinWays WebService - Laravel5.6 (published for www.novinways.com) this package only work for Iranian Users

installation
------------
For install this package, run this command

```php
composer require BlackM13/novinways
```
Publish config files:
```
php artisan vendor:publish
```
for change webServiceID and webServicePassword change ```config/novinways.php```

Usage
-----
for use this package, please register on [novinways.com](http://novinways.com)

### Get functions list

This function return a String result with list of NovinWays WebService Function
```php
Novinways::getFunctions();
```

### Get credit

This function return a JSON String result with Status and Credit of your panel

```php
Novinways::CheckCredit();
```

### Get operator status for topup

This function return a ArrayOfString result with Status and OperatorStatus

```php
Novinways::TopUpOperatorStatus($operator);
```

### check billId and paymentId is valid

This function return a ArrayOfString result with Status, BillType and BillAmount

```php
Novinways::CheckBill($billId, $paymentId);
```

### Pay a Bill

This function return a ArrayOfString result with Status, TranId, BillType and BillAmount

```php
Novinways::PayBill($billId, $paymentId, $reqId);

$reqId must be unique ID;
```


### Get list of products

This function return a JSON String result

```php
Novinways::ProductsInfo();
```


### Buy a product

This function return a JSON String result

```php
Novinways::BuyProduct($productId, $reqId, $count);

$reqId must be unique ID;
$productId equal plan_name from previous function
```


### Request for Pin code

This function return a JSON String result

```php
Novinways::PinRequest($price, $type, $reqId);

$price: for MCI and MTN operators equal: 1000, 2000, 5000, 10000, 20000, and for RTL and TAL operators equal: 2000, 5000, 10000, 20000
$type: MTN or MCI or RTL or TAL is valid
$reqId must be unique ID;
```


### Request TopUp

This function return a JSON String result

```php
Novinways::ReCharge($price, $type, $phone, $reqId);

$price: for MTN operator from 500 to 50000 and for MCI operator equal: 1000, 2000, 5000, 10000, 20000
$type: 
MTN: Noraml TopUp. 
MTN!: Amazing charge. 
MTN#: Charge permanent line. 
WiMax
MCI
$reqId must be unique ID;
```


### Check TopUp is OK

This function return a JSON String result

```php
Novinways::CheckCharge($transId);

you will get $transId from previous function
```
