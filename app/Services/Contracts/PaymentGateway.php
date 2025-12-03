<?php

namespace App\Services\Contracts;

class PaymentGateway
{
    public string $name;
    public string $alias;
    public bool $status = false;
    public array $gateway_parameters = [];
    public ?string $description = null;
    public int $sort_order = 0;

    public static function make(string $name): static
    {
        return (new static())->name($name)->alias(str($name)->slug());
    }

    public function name(string $name): static
    {
        $this->name = $name;
        return $this;
    }

    public function alias(string $alias): static
    {
        $this->alias = $alias;
        return $this;
    }

    public function status(bool $status): static
    {
        $this->status = $status;
        return $this;
    }

    public function gateway_parameters(array $gateway_parameters): static
    {
        $this->gateway_parameters = $gateway_parameters;
        return $this;
    }


    public function description(string $description): static
    {
        $this->description = $description;
        return $this;
    }

    public function sort_order(int $sort_order): static
    {
        $this->sort_order = $sort_order;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'alias' => $this->alias,
            'status' => $this->status,
            'gateway_parameters' => $this->gateway_parameters,
            'description' => $this->description,
            'sort_order' => $this->sort_order,
        ];
    }
}