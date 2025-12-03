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

    protected function rules()
    {
        return [
            'name' => 'required|min:3',
            'email' => 'required|email',
            'subject' => 'required|min:3',
            'message' => 'required|min:10',
        ];
    }

    public function submit()
    {
        $this->validate();

        \App\Models\Contact::create([
            'name' => $this->name,
            'email' => $this->email,
            'subject' => $this->subject,
            'message' => $this->message,
        ]);

        $this->reset();
        session()->flash('success', 'Message sent successfully!');
    }

    public function render()
    {
        return view('livewire.contact');
    }
}
