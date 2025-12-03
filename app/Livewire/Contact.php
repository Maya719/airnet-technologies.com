<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Contact extends Component
{
    public $name = '';
    public $email = '';
    public $subject = '';
    public $message = '';
    public $recaptchaToken = '';

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'subject' => 'required|string|max:255',
        'message' => 'required|string|max:5000',
        'recaptchaToken' => 'required',
    ];

    public function submit()
    {
        $this->validate();

        // Verify reCAPTCHA
        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => config('services.recaptcha.secret_key'),
            'response' => $this->recaptchaToken,
        ]);

        $recaptchaData = $response->json();

        if (!$recaptchaData['success'] || $recaptchaData['score'] < 0.5) {
            session()->flash('error', 'reCAPTCHA verification failed. Please try again.');
            return;
        }

        // Save contact to database
        Contact::create([
            'name' => $this->name,
            'email' => $this->email,
            'subject' => $this->subject,
            'message' => $this->message,
        ]);

        // Reset form
        $this->reset(['name', 'email', 'subject', 'message', 'recaptchaToken']);

        session()->flash('success', 'Your message has been sent successfully!');
    }

    public function render()
    {
        return view('livewire.contact');
    }
}