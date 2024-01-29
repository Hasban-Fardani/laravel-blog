<div class="card bg-base-100 shadow-xl rounded-none">
    <figure><img src="{{ $post->image }}" alt="{{ $post->title }}" /></figure>
    <div class="card-body">

        <h2 class="card-title truncate">
            {{ $post->title }}
            {{-- <div class="badge badge-secondary">NEW</div> --}}
        </h2>
        <p>{{ \Illuminate\Support\Str::limit($post->body, 40) }}</p>
        <div class="card-actions justify-between mt-2">
            <a href="{{ route('read', $post->slug) }}" class="btn btn-primary">read</a>
            <div class="flex flex-col">
                <x-category :category="$post->category" />
                <div class="flex">
                    {{-- tags --}}
                </div>
            </div>
        </div>
    </div>
</div>
