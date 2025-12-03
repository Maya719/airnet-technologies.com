<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'model_type',
        'model_id',
        'method_id',
        'method_name',
        'method_currency',
        'amount',
        'detail',
        'trx',
        'status',
        'from_api',
        'success_url',
        'failed_url',
        'customer',
        'service_info',
    ];
    /**
     * @var string[]
     */
    protected $casts = [
        'customer' => 'array',
        'service_info' => 'array',
        'from_api' => 'boolean',
    ];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function model(): \Illuminate\Database\Eloquent\Relations\MorphTo
    {
        return $this->morphTo('model');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function gateway(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(PaymentGateway::class, 'method_id', 'id');
    }
}
