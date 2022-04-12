<?php

namespace App\Http\Livewire;

use App\Models\Post as ModelsPost;
use Livewire\Component;

class Post extends Component
{
    public $title;
    public $body;
    public $ids;

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

    public function edit($id)
    {
        $post = ModelsPost::where([['id', $id],['deleted', 0]])->first();
        $this->title = $post->title;
        $this->body = $post->body;
        $this->ids = $post->id;
    }

    public function update()
    {
        $post = ModelsPost::where([['id', $this->ids],['deleted', 0]])->first();

        $data = $this->validate();

        $post->update($data);

        session()->flash('message', 'Post Updated Successfully');

        $this->resetFields();

        $this->emit('postUpdated');

    }

    public function deleteModal($id)
    {
        $post = ModelsPost::where([['id', $id],['deleted', 0]])->first();
        $this->title = $post->title;
        $this->body = $post->body;
        $this->ids = $post->id;
    }

    public function delete()
    {
        $post = ModelsPost::where([['id', $this->ids],['deleted', 0]])->update(['deleted' => 1]);

//        dd($post);
//        $post->update([
//            'deleted' => 1
//        ]);

        session()->flash('message', 'Post Deleted Successfully');

        $this->resetFields();

        $this->emit('postDeleted');
    }

    public function render()
    {
        $posts = ModelsPost::where('deleted', 0)->orderBy('id', 'DESC')->get();
        return view('livewire.post', ['posts' => $posts])->extends('layouts.app');
    }
}
