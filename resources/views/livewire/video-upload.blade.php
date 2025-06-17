<div>
    <form wire:submit.prevent="submit" enctype="multipart/form-data" class="card p-4">
        @if (session()->has('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif

        <div class="mb-3">
            <label class="form-label">Video File</label>
            <input type="file" wire:model="video" class="form-control" accept="video/*">
            @error('video') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Thumbnail Image</label>
            <input type="file" wire:model="thumbnail" class="form-control" accept="image/*">
            @error('thumbnail') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" wire:model="title" class="form-control">
            @error('title') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea wire:model="description" class="form-control"></textarea>
            @error('description') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Tags (comma separated)</label>
            <input type="text" wire:model="tags" class="form-control">
            @error('tags') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="btn btn-primary w-100">Upload Video</button>
    </form>
</div>