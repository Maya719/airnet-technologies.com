<?php

namespace App\Services\Contracts;

class ServiceInfo
{
    public ?string $name = null;
    public ?string $description = null;
    public ?string $price = null;
    public ?string $quantity = null;
    public ?string $total_price = null;
    public ?string $others = null;

    public static function make(string $name): self
    {
        return (new static())->name($name);
    }

    public function name(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function description(string $description): self
    {
        $this->description = $description;
        return $this;
    }

    public function price(string $price): self
    {
        $this->price = $price;
        return $this;
    }

    public function quantity(string $quantity): self
    {
        $this->quantity = $quantity;
        return $this;
    }

    public function total_price(string $total_price): self
    {
        $this->total_price = $total_price;
        return $this;
    }

    public function others(?string $others): self
    {
        $this->others = $others;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'quantity' => $this->quantity,
            'total_price' => $this->total_price,
            'others' => $this->others,
        ];
    }
}