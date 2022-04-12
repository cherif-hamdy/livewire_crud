<div wire:ignore.self class="modal fade" id="deletePost" tabindex="-1" aria-labelledby="deletePostLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deletePostLabel">Edit Post</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Are You Sure You Want To Delete This Record</p>
                <p>Title : {{ $title }}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger" wire:click.prevent="delete">Delete Post</button>
            </div>
        </div>
    </div>
</div>
