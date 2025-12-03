<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentGateway extends Model
{
    protected $fillable = [
        'name',
        'alias',
        'status',
        'gateway_parameters',
        'supported_currencies',
        'description',
        'sort_order',
        'created_at',
        'updated_at'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'status' => 'boolean',
        'name' => 'json',
        'description' => 'json',
        'gateway_parameters' => 'json',
        'supported_currencies' => 'json',
        'sort_order' => 'integer',
    ];
}
