# NovinWays Laravel Package

A Laravel package for integrating with NovinWays SOAP WebService.

This package is developed for Iranian users and works with novinways.com services.

---

## 📦 Installation

Install via Composer:

composer require BlackM13/novinways:6.0.x-dev

---

## ⚙️ Publish Config

php artisan vendor:publish --provider="BlackM13\Novinways\NovinwaysServiceProvider"

---

## 🔐 Environment Variables

Add to .env file:

NOVINWAYS_URL=https://your-novinways-url?wsdl
NOVINWAYS_ID=your-webservice-id
NOVINWAYS_PASSWORD=your-webservice-password

---

## 🚀 Usage

use Novinways;

---

## Methods

1. getFunctions()
Novinways::getFunctions();

2. CheckCredit()
Novinways::CheckCredit();

3. TopUpOperatorStatus()
Novinways::TopUpOperatorStatus('MTN');

4. CheckBill()
Novinways::CheckBill($billId, $paymentId);

5. PayBill()
Novinways::PayBill($billId, $paymentId, $reqId);

6. ProductsInfo()
Novinways::ProductsInfo();

7. BuyProduct()
Novinways::BuyProduct($productId, $reqId, $count);

8. PinRequest()
Novinways::PinRequest($price, $type, $reqId);

9. ReCharge()
Novinways::ReCharge($price, $type, $phone, $reqId);

10. CheckCharge()
Novinways::CheckCharge($transId);

---

## Notes
- reqId must be unique
- SOAP extension required
- PHP 8+

---

MIT License