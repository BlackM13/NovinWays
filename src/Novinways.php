<?php

namespace BlackM13\Novinways;

use SoapClient;

class Novinways
{
    protected array $config;
    protected SoapClient $client;

    public function __construct(array $config, SoapClient $client)
    {
        $this->config = $config;
        $this->client = $client;
    }

    private function auth(): array
    {
        return [
            'WebserviceId' => $this->config['webServiceId'],
            'WebservicePassword' => $this->config['webServicePassword'],
        ];
    }

    private function getBillType($typeId): string
    {
        return match ($typeId) {
            1 => "شرکت آب و فاضلاب",
            2 => "شرکت برق",
            3 => "شرکت گاز",
            4 => "تلفن ثابت",
            5 => "تلفن همراه",
            6 => "عوارض شهرداری",
            8 => "سازمان مالیات",
            9 => "جریمه راهنمایی و رانندگی",
            default => "نامشخص",
        };
    }

    public function ReCharge($price, $type, $phone, $reqId)
    {
        return $this->client->ReCharge([
            'Auth' => $this->auth(),
            'Amount' => $price,
            'Type' => $type,
            'Account' => $phone,
            'ReqId' => $reqId
        ]);
    }

    public function CheckCharge($transId)
    {
        return $this->client->CheckCharge([
            'Auth' => $this->auth(),
            'TranId' => $transId
        ]);
    }

    public function PinRequest($price, $type, $reqId)
    {
        return $this->client->PinRequest([
            'Auth' => $this->auth(),
            'Amount' => $price,
            'Type' => $type,
            'ReqId' => $reqId
        ]);
    }

    public function BuyProduct($productId, $reqId, $count = 1)
    {
        return $this->client->BuyProduct([
            'Auth' => $this->auth(),
            'ProductId' => $productId,
            'Number' => $count,
            'ReqId' => $reqId
        ]);
    }

    public function ProductsInfo()
    {
        $response = $this->client->ProductsInfo([
            'Auth' => $this->auth()
        ]);

        return $response->Information ?? [];
    }

    public function CheckCredit()
    {
        return $this->client->CheckCredit([
            'Auth' => $this->auth()
        ]);
    }

    public function PayBill($billId, $paymentId, $reqId)
    {
        return $this->client->PayBill([
            'Auth' => $this->auth(),
            'BillId' => $billId,
            'PaymentId' => $paymentId,
            'ReqId' => $reqId
        ]);
    }

    public function CheckBill($billId, $paymentId)
    {
        $response = $this->client->CheckBill([
            'Auth' => $this->auth(),
            'BillId' => $billId,
            'PaymentId' => $paymentId
        ]);

        $response->BillTypeName = $this->getBillType($response->BillType ?? null);

        return $response;
    }

    public function TopUpOperatorStatus($operator)
    {
        return $this->client->TopUpOperatorStatus([
            'Auth' => $this->auth(),
            'Operator' => $operator
        ]);
    }

    public function getFunctions(): array
    {
        return $this->client->__getFunctions();
    }
}