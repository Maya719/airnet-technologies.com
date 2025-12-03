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
    public $recaptcha = '';

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'subject' => 'required|string|max:255',
        'message' => 'required|string|max:5000',
        'recaptcha' => 'required',
    ];

    protected $messages = [
        'recaptcha.required' => 'Please verify that you are not a robot.',
    ];

    public function submit()
    {
        $this->validate();

        // Verify reCAPTCHA
        if (!$this->verifyRecaptcha()) {
            $this->addError('recaptcha', 'reCAPTCHA verification failed. Please try again.');
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
        $this->reset(['name', 'email', 'subject', 'message', 'recaptcha']);

        // Dispatch event to reset reCAPTCHA
        $this->dispatch('reset-recaptcha');

        session()->flash('success', 'Your message has been sent successfully!');
    }

    protected function verifyRecaptcha()
    {
        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => config('services.recaptcha.secret_key'),
            'response' => $this->recaptcha,
            'remoteip' => request()->ip(),
        ]);

        return $response->json('success');
    }

    public function render()
    {
        return view('livewire.contact');
    }
}