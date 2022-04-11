<?php

namespace App\Http\Livewire;

use App\Models\Post as ModelsPost;
use Livewire\Component;

class Post extends Component
{
    public $title;
    public $body;

    protected $rules = [
        'title' => 'required|string',
        'body' => 'required'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function resetFields()
    {
        $this->title = '';
        $this->body = '';
    }

    public function store()
    {
        $data = $this->validate();

        ModelsPost::create($data);

        session()->flash('message', 'Post Added Successfully');

        $this->resetFields();

        $this->emit('postAdded');
    }

    public function render()
    {
        $posts = ModelsPost::orderBy('id', 'DESC')->get();
        return view('livewire.post', ['posts' => $posts])->extends('layouts.app');
    }
}
