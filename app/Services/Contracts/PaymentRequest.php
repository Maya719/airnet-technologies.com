<?php

namespace App\Services\Contracts;


class PaymentRequest
{
    public ?string $model = null;
    public ?int $model_id = null;
    public ?int $method_id = null;
    public string $currency = 'USD';
    public float $amount = 0;
    public ?string $details = null;
    public string $success_url;
    public string $cancel_url;
    public ?PaymentCustomer $customer;
    public ?ServiceInfo $service_info;

    public static function make(string $model): self
    {
        return (new static())->model($model);
    }

    public function model(string $model): self
    {
        $this->model = $model;
        return $this;
    }

    public function model_id(int $model_id): self
    {
        $this->model_id = $model_id;
        return $this;
    }
    public function method_id(int $method_id): self
    {
        $this->method_id = $method_id;
        return $this;
    }

    public function currency(string $currency): self
    {
        $this->currency = $currency;
        return $this;
    }

    public function amount(float $amount): self
    {
        $this->amount = $amount;
        return $this;
    }

    public function details(string $details): self
    {
        $this->details = $details;
        return $this;
    }

    public function success_url(string $success_url): self
    {
        $this->success_url = $success_url;
        return $this;
    }

    public function cancel_url(string $cancel_url): self
    {
        $this->cancel_url = $cancel_url;
        return $this;
    }

    public function customer(PaymentCustomer $customer): self
    {
        $this->customer = $customer;
        return $this;
    }

    public function service_info(ServiceInfo $service_info): self
    {
        $this->service_info = $service_info;
        return $this;
    }


    public function toArray(): array
    {
        return [
            'model' => $this->model,
            'model_id' => $this->model_id,
            'method_id' => $this->method_id,
            'currency' => $this->currency,
            'amount' => $this->amount,
            'details' => $this->details,
            'success_url' => $this->success_url,
            'cancel_url' => $this->cancel_url,
            'customer' => $this->customer->toArray(),
            'service_info' => $this->service_info->toArray(),
        ];
    }
}