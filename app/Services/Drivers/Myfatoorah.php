<?php
namespace App\Services\Drivers;

use App\Models\Service;
use App\Services\Contracts\PaymentGateway;
use Illuminate\Http\Request;
use App\Models\Payment;
use Illuminate\Support\Facades\Log;
use MyFatoorah\Library\API\Payment\MyFatoorahPayment;

class Myfatoorah extends Driver
{
    public static function process(Payment $payment): false|string
    {
        $stripeData = $payment->gateway->gateway_parameters;
        $isTest = ($stripeData['mode'] == 'test') ? true : false;
        $mfConfig = [
            'apiKey' => $stripeData['secret_key'],
            'isTest' => $isTest,
            'countryCode' => $stripeData['country_iso'],
        ];
        if ($isTest) {
            $payload = [
                'CustomerName' => $payment->customer["name"],
                'CustomerEmail' => $payment->customer["email"],
                'CustomerMobile' => $payment->customer["mobile"],
                'InvoiceValue' => $payment->amount,
                'DisplayCurrencyIso' => 'USD',
                'CallBackUrl' => route('myfatoorah.callback'),
                'ErrorUrl' => route('payment.cancel'),
                'CustomerReference' => 0,
                'Language' => 'en',
                'SourceInfo' => 'Laravel ' . app()::VERSION . ' - MyFatoorah Package '
            ];

            try {
                $mf = new MyFatoorahPayment($mfConfig);
                $paymentId = 0;
                $invoice = $mf->getInvoiceURL($payload, $paymentId, 0);
                return redirect()->away($invoice['invoiceURL']);
            } catch (\Exception $ex) {
                dd($ex->getMessage());
                return redirect()->back()->with('error', $ex->getMessage());
            }

        }
    }

    public static function verify(Request $request): \Illuminate\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
    {
        return redirect()->back();
    }

    public function integration(): array
    {
        return PaymentGateway::make('Myfatoorah')
            ->alias('Myfatoorah')
            ->status(true)
            ->gateway_parameters([
                "secret_key" => "",
                "mode" => "",
                "country_iso" => "",
            ])
            ->toArray();
    }

}
