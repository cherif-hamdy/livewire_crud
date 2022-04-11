@section('title', "Posts")
<div>
    @include('livewire.create')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-2">
                <div class="card ">
                    <div class="card-header d-flex">
                        <h3>Posts</h3>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPost">
                            Add Post
                          </button>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Body</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $post)
                                    <tr>
                                        <td>{{ $post->title }}</td>
                                        <td>{{  $post->body }}</td>
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
