@section('title', "Posts")
<div>
    @include('livewire.create')
    @include('livewire.update')
    @include('livewire.delete')
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-8 offset-2">
                @if(session('message'))
                    <p class="alert alert-success">{{ session('message') }}</p>
                @endif
                <div class="card ">
                    <div class="card-header d-flex">
                        <h3 class="me-auto">Posts</h3>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPost">
                            Add Post
                        </button>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered">
                            <thead class="text-center">
                            <tr>
                                <th>Title</th>
                                <th>Body</th>
                                <th width="15%">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <td>{{ $post->title }}</td>
                                    <td>{{  $post->body }}</td>
                                    <td>
                                        @can('update', $post)
                                            <div class="d-flex justify-content-between">
                                                <button type="button" wire:click.prevent="edit({{ $post->id }})"
                                                        data-bs-toggle="modal" data-bs-target="#editPost"
                                                        class="btn btn-warning btn-sm">Edit
                                                </button>
                                                <button type="button" wire:click.prevent="deleteModal({{ $post->id }})"
                                                        data-bs-toggle="modal" data-bs-target="#deletePost"
                                                        class="btn btn-danger btn-sm ">Delete
                                                </button>
                                            </div>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
