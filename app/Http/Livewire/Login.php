<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $email;
    public $password;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required'
    ];

    public function updated($propName)
    {
        $this->validateOnly($propName);
    }

    public function submit()
    {
        $data = $this->validate();

        Auth::attempt($data);

        return redirect()->route('home');
    }

    public function render()
    {
        return view('livewire.login')->extends('layouts.app');
    }
}
