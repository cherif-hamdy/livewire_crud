<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class Register extends Component
{
    public $name;
    public $email;
    public $password;
    public $password_confirmation;

    protected $rules = [
        'name' => 'required|string|unique:users,name',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:8|confirmed'
    ];

    public function updated($propName)
    {
        $this->validateOnly($propName);
    }

    public function submit()
    {
        $data = $this->validate();

        User::create(array_merge($data, ['password' => bcrypt($data['password'])]));

        return redirect()->route('login');
    }
    public function render()
    {
        return view('livewire.register')->extends('layouts.app');
    }
}
