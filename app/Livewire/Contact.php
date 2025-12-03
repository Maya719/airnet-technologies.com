<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Contact extends Component
{
    public $name;
    public $email;
    public $subject;
    public $message;
    public $gRecaptchaResponse;

    protected function rules()
    {
        return [
            'name' => 'required|min:3',
            'email' => 'required|email',
            'subject' => 'required|min:3',
            'message' => 'required|min:10',
            'gRecaptchaResponse' => 'required',
        ];
    }

    protected $messages = [
        'gRecaptchaResponse.required' => 'Please complete the reCAPTCHA verification.',
    ];

    public function submit()
    {
        $this->validate();

        $verify = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => config('services.recaptcha.secret_key'),
            'response' => $this->gRecaptchaResponse,
        ]);

        if (!$verify->json('success')) {
            session()->flash('error', 'Captcha verification failed');
            return;
        }

        \App\Models\Contact::create([
            'name' => $this->name,
            'email' => $this->email,
            'subject' => $this->subject,
            'message' => $this->message,
        ]);

        $this->reset();

        $this->dispatch('reset-recaptcha');

        session()->flash('success', 'Message sent successfully!');
    }

    public function render()
    {
        return view('livewire.contact');
    }
}
