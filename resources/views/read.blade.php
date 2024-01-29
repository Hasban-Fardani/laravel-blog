@extends('layout.user')

@section('title', 'Posts')

@section('content')
<div class="w-screen px-6 md:px-12 py-6">
    <div class="card bg-base-100 rounded-none">
        <h2 class="card-title text-2xl justify-center">{{ $post->title }}</h2>
        <figure><img src="{{ $post->image }}" alt="Shoes" class="w-full h-96 object-cover mt-3"/></figure>
        <div class="card-body py-6 px-0">
            <div class="flex flex-wrap gap-4 text-xs">
                <span>{{ $post->author->name }}</span>
                <span>|</span>
                <span>{{ $post->category->name }}</span>
                <span>|</span>
                <span>{{ $post->created_at }}</span>
            </div>
          <p>{{ $post->body }}</p>
          {{-- <div class="card-actions justify-between">
            <button class="btn btn-primary">Prev</button>
            <button class="btn btn-primary">Next</button>
          </div> --}}
        </div>
      </div>
</div>
@endsection