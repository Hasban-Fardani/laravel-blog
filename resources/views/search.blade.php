@extends('layout.user')

@section('content')
    <div class="px-12 py-6">
        <div class="flex justify-between">
            <h2 class="text-3xl font-bold underline">All Posts</h2>
            <div class="flex flex-col gap-1">
                <div class="flex  gap-1 items-center">
                    <p class="mr-2">Category: </p>
                    <div class="flex flex-wrap gap-1">
                        <a href="{{ route('search') }}" class="badge badge-outline {{ request('category') == null ? 'badge-primary' : '' }}">All</a>
                        @foreach ($categories as $category)
                            <x-category :category="$category" onSearch/>
                        @endforeach
                    </div>
                </div>
                <div class="flex">
                    <p>Tags: </p>
                    @foreach ($tags as $tag)
                        <a href="{{ route('search', ['tag' => $tag->name]) }}" class="badge badge-outline">{{ $tag->name }}</a>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mt-6">
            @foreach ($posts as $post)
                <x-post-card :post="$post" />
            @endforeach
        </div>
    </div>
@endsection