<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LegalController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ServicesController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/privacy-policy', [LegalController::class, 'index'])->name('privacy_policy_view');
Route::get('/terms-conditions', [LegalController::class, 'terms_conditions'])->name('terms_conditions_view');
Route::get('/refund-policy', [LegalController::class, 'refund_policy'])->name('refund_policy_view');
Route::get('/qibla-finder', [LegalController::class, 'qibla_finder'])->name('qibla_finder_view');
Route::get('/voice-changer', [LegalController::class, 'voice_changer'])->name('voice_changer_view');

/**
 * Services Page Route
 */
Route::get('/more_services', [ServicesController::class, 'index'])->name('view_more_projects');
Route::get('/service_detail/{id}', [ServicesController::class, 'details'])->name('service_detail');

/**
 * Payment Routes
 */
Route::post('payment/stripe', [PaymentController::class, 'stripe'])->name('payment.stripe');
Route::post('payment/myfatoorah', [PaymentController::class, 'myfatoorah'])->name('payment.myfatoorah');

Route::get('payment/{trx}/index/{gateway}', [PaymentController::class, 'index'])->name('payment.index');

Route::get('payment/success', [PaymentController::class, 'success'])->name('payment.success');
Route::get('payment/fail', [PaymentController::class, 'cancel'])->name('payment.cancel');

Route::get('/payment/stripe/callback', [PaymentController::class, 'callback'])->name('payments.callback');
Route::get('/payment/myfatoorah/callback', [PaymentController::class, 'callback'])->name('myfatoorah.callback');

/**
 * 
 *  Products Pages
 * 
 */
Route::get('/pie', [HomeController::class, 'pie'])->name('pie');