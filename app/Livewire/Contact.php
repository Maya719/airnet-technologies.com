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
    public $recaptcha_token = '';

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'subject' => 'required|string|max:255',
        'message' => 'required|string|max:5000',
        'recaptcha_token' => 'required',
    ];

    public function submit()
    {
        $this->validate();

        // Verify reCAPTCHA token
        if (!$this->verifyRecaptcha($this->recaptcha_token)) {
            session()->flash('error', 'reCAPTCHA verification failed. Please try again.');
            return;
        }

        // Save contact to database
        \App\Models\Contact::create([
            'name' => $this->name,
            'email' => $this->email,
            'subject' => $this->subject,
            'message' => $this->message,
        ]);

        // Reset form
        $this->reset(['name', 'email', 'subject', 'message', 'recaptcha_token']);

        session()->flash('success', 'Your message has been sent successfully!');
    }

    private function verifyRecaptcha($token)
    {
        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => config('services.recaptcha.secret_key'),
            'response' => $token,
            'remoteip' => request()->ip(),
        ]);

        $result = $response->json();
        return $result['success'] && ($result['score'] ?? 0) >= 0.5;
    }

    public function render()
    {
        return view('livewire.contact');
    }
}