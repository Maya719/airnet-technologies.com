<?php

namespace App\Services\Drivers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Services\Contracts\PaymentCurrency;
use App\Services\Contracts\PaymentGateway;

class Stripe extends Driver
{
    public static function process(Payment $payment): false|string
    {
        $stripeData = $payment->gateway->gateway_parameters;
        \Stripe\Stripe::setApiKey($stripeData['secret_key']);

        try {
            $customer = \Stripe\Customer::create([
                'name' => $payment->customer['name'],
                'email' => $payment->customer['email'],
            ]);
            $invoice = \Stripe\Invoice::create([
                'customer' => $customer->id,
                'collection_method' => 'send_invoice',
                'days_until_due' => 30,
                'currency' => $payment->method_currency,
            ]);

            \Stripe\InvoiceItem::create([
                'customer' => $customer->id,
                'amount' => $payment->amount * 100,
                'description' => $payment->service_info['name'],
                'invoice' => $invoice->id,
                'currency' => $payment->method_currency,
            ]);

            $invoice->sendInvoice();

            $invoiceUrl = $invoice->hosted_invoice_url;
            return redirect()->away($invoiceUrl)->with('success', 'Invoice sent successfully');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

    }

    public static function verify(Request $request): \Illuminate\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
    {
        $StripeAcc = \App\Models\PaymentGateway::where('alias', 'Stripe')->orderBy('id', 'desc')->firstOrFail();
        $gateway_parameter = $StripeAcc->gateway_parameters;

        \Stripe\Stripe::setApiKey($gateway_parameter['secret_key']);
        $stripeSession = $request->get('session');

        $session = \Stripe\Checkout\Session::retrieve($stripeSession);

        $payment = Payment::where('method_code', $session->id)->where('status', 0)->firstOrFail();

        if ($session->status === 'complete') {

            self::paymentDataUpdate($payment);

            return redirect($payment->success_url);
        }

        self::paymentDataUpdate($payment, true);
        return redirect($payment->failed_url);
    }

    public function integration(): array
    {
        return PaymentGateway::make('Stripe')
            ->alias('Stripe')
            ->status(true)
            ->gateway_parameters([
                "secret_key" => "",
                "publishable_key" => ""
            ])
            ->toArray();
    }

}