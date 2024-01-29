@extends('layout.user')

@section('title')

@section('content')
    <div class="hero py-12 bg-base-200 overflow-x-scroll" style="height: calc(100vh - 70px)">
        <div class="flex gap-12 justify-center items-center">
            @foreach ($latest as $post)
            <div class="hero-content max-w-screen-2xl w-screen flex-col lg:flex-row z-20">
                <img src="{{ $post->image }}" class="max-w-sm rounded-lg shadow-2xl" />
                <div class="px-6 flex flex-col gap-2">
                    <h1 class="text-2xl lg:text-4xl font-bold">{{ $post->title }}</h1>
                    <p class="">{{  $post->slug }}</p>
                    <a href="{{ route('read', $post->slug) }}" class="btn btn-primary w-fit">read</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div class="px-12 py-6">
        <h2 class="text-3xl font-bold underline">All Posts</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12 mt-6">
            @foreach ($posts as $post)
                <x-post-card :post="$post" />
            @endforeach
        </div>
        <div class="mt-6 z-50">
            {{ $posts->links() }}
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        const heroContents = document.querySelectorAll('.hero-content');
        let current = 0;
        let direction = 'next';

        // Function to scroll horizontally
        const scrollHorizontally = (element) => {
            const container = element.parentElement.parentElement;
            const scrollOptions = {
                behavior: 'smooth',
                left: element.offsetLeft
            };
            container.scrollTo(scrollOptions);
        }

        // Function to determine the next index
        const next = () => {
            if (current < heroContents.length - 1) {
                current++;
            } else {
                current = 0;
            }
        }

        // Function to determine the previous index
        const prev = () => {
            if (current > 0) {
                current--;
            } else {
                current = heroContents.length - 1;
            }
        }

        // Function to scroll view to hero_content index - i
        const scroll = (i) => {
            scrollHorizontally(heroContents[i]);
        }

        // Loop every 5 seconds, scroll to the next element, and change direction accordingly
        setInterval(() => {
            if (current == heroContents.length - 1) {
                direction = 'prev';
            } else if (current == 0) {
                direction = 'next';
            }

            if (direction == 'next') {
                next();
            } else {
                prev();
            }
            scroll(current);
        }, 4000);
    </script>
@endpush
