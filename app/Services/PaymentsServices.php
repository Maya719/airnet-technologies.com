<?php

namespace App\Services;

use App\Models\Team;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\Payment;
use App\Models\PaymentGateway;
use App\Services\Contracts\PaymentRequest;

class PaymentsServices
{
    public function pay(PaymentRequest $data, bool $json = false)
    {
        // Define the validation rules
        $rules = [
            'currency' => 'required|string|size:3|uppercase',
            'model' => 'required|string',
            'model_id' => 'required|numeric',
            'method_id' => 'required|numeric',

            'amount' => 'required|numeric',
            'details' => 'required|string|max:100',
            'success_url' => 'required|url',
            'cancel_url' => 'required|url',

            'customer' => 'required|array',
            'customer.name' => 'required|string|max:255',
            'customer.email' => 'required|email',
            'customer.mobile' => 'required|string|max:20',

            'service_info' => 'required|array',
            'service_info.name' => 'required|string|max:255',
            'service_info.quantity' => 'required|string|max:20',
            'service_info.total_price' => 'required|string|max:20',
            'service_info.price' => 'nullable|string|max:20',
            'service_info.others' => 'nullable|string',
            'service_info.description' => 'nullable|string',
        ];
        $validator = Validator::make($data->toArray(), $rules);
        // Check if validation fails
        if ($validator->fails()) {
            if ($json) {
                return response()->json([
                    'error' => $validator->errors()
                ], 400);
            } else {
                return [
                    'error' => $validator->errors()
                ];
            }
        }

        $validated = $validator->validated();


        // Create the Payment
        $payment = Payment::create([
            'model_id' => $validated['model_id'],
            'method_id' => $validated['method_id'],
            'model_type' => $validated['model'],
            'method_currency' => $validated['currency'],
            'amount' => $validated['amount'],
            'detail' => $validated['details'],
            'trx' => Str::random(22),
            'status' => 0,
            'from_api' => true,
            'success_url' => $validated['success_url'],
            'failed_url' => $validated['cancel_url'],
            'customer' => $validated['customer'],
            'service_info' => $validated['service_info'],
        ]);

        if ($json) {
            return response()->json([
                'status' => 'success',
                'message' => 'Payment created successfully',
                'data' => [
                    'id' => $payment->trx,
                    'url' => route('payment.index', ['trx' => $payment->trx, 'gateway' => $payment->gateway->alias]),
                ]
            ], 201);
        } else {
            return route('payment.index', ['trx' => $payment->trx, 'gateway' => $payment->gateway->alias]);
        }
    }

    public function loadDrivers(): void
    {
        $drivers = config('payments.drivers');
        foreach ($drivers as $driver) {
            $driver = app($driver);
            $paymentGate = $driver->integration();
            if (isset($paymentGate['alias'])) {
                $payment = PaymentGateway::query()
                    ->where('alias', $paymentGate['alias'])
                    ->first();

                if (!$payment) {
                    PaymentGateway::query()->create($paymentGate);
                }
            }
        }
    }
}