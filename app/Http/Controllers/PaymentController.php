<?php

namespace App\Http\Controllers;

use App\Facades\FilamentPayments;
use App\Models\Payment;
use App\Models\PaymentGateway;
use App\Models\Service;
use App\Services\Contracts\PaymentCustomer;
use App\Services\Contracts\PaymentRequest;
use App\Services\Contracts\ServiceInfo;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index($trx, $gateway)
    {
        $payment = Payment::where('trx', $trx)->first();
        $gateway = PaymentGateway::where('alias', $gateway)->first();
        $drivers = config('payments.drivers');
        $gaywayClass = false;
        foreach ($drivers as $driver) {
            if (str($driver)->contains($gateway->alias)) {
                $gaywayClass = app($driver);
                break;
            }
        }
        if (!$gaywayClass) {
            $gaywayClass = app(config('payments.path') . "\\" . $gateway->alias);
        }
        return $gaywayClass->process($payment);
    }

    public function stripe(Request $request)
    {
        $request->validate([
            'service_id' => 'required|exists:services,id',
            'quantity' => 'required|integer|min:1',
            'total_price' => 'required|numeric|min:1',
            'customer_name' => 'required|string|max:100',
            'customer_email' => 'required|email',
            'customer_mobile' => 'required|string|max:20',
        ]);

        $service = Service::findOrFail($request->service_id);
        $gateway = PaymentGateway::where('alias', 'stripe')->first();
        return redirect()->to(
            FilamentPayments::pay(
                data: PaymentRequest::make(Service::class)
                    ->model_id($service->id)
                    ->currency('USD')
                    ->method_id($gateway->id)
                    ->amount($request->total_price)
                    ->details('Service Purchase')
                    ->success_url(url('/success'))
                    ->cancel_url(url('/cancel'))
                    ->customer(
                        PaymentCustomer::make($request->customer_name)
                            ->email($request->customer_email)
                            ->mobile($request->customer_mobile)
                    )
                    ->service_info(
                        ServiceInfo::make($service->name)
                            ->price($service->price)
                            ->quantity($request->quantity)
                            ->total_price($request->total_price)
                            ->others($request->extras)
                    )
            )
        );
    }

    public function myfatoorah(Request $request)
    {
        $request->validate([
            'service_id' => 'required|exists:services,id',
            'quantity' => 'required|integer|min:1',
            'total_price' => 'required|numeric|min:1',
            'customer_name' => 'required|string|max:100',
            'customer_email' => 'required|email',
            'customer_mobile' => 'required|string|max:20',
        ]);

        $service = Service::findOrFail($request->service_id);
        $gateway = PaymentGateway::where('alias', 'myfatoorah')->first();
        return redirect()->to(
            FilamentPayments::pay(
                data: PaymentRequest::make(Service::class)
                    ->model_id($service->id)
                    ->currency('USD')
                    ->method_id($gateway->id)
                    ->amount($request->total_price)
                    ->details('Service Purchase')
                    ->success_url(url('/success'))
                    ->cancel_url(url('/cancel'))
                    ->customer(
                        PaymentCustomer::make($request->customer_name)
                            ->email($request->customer_email)
                            ->mobile($request->customer_mobile)
                    )
                    ->service_info(
                        ServiceInfo::make($service->name)
                            ->price($service->price)
                            ->quantity($request->quantity)
                            ->total_price($request->total_price)
                            ->others($request->extras)
                    )
            )
        );
    }
    public function callback(Request $request)
    {
        return redirect()->route('payment.success');
    }
    public function success(Request $request)
    {
        return redirect()->route('home');
    }
}
