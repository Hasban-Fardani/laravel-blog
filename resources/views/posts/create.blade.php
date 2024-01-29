@extends('layout.admin')

@section('page', 'post / create')

@section('content')
    <div class="w-full px-6 py-6 mx-auto text-black">
        <div class="flex flex-wrap -mx-3">
            <div class="flex-none w-full max-w-full px-3">
                <div
                    class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                    <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                        <div class="flex items-center">
                            <h6 class="dark:text-white">Create a Posts</h6>
                            
                        </div>
                    </div>
                    <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data"
                        class="flex flex-col gap-3 w-full h-fit px-6 mt-3">
                        @csrf
                        {{-- title --}}
                        <div class="flex flex-col">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" class="border text-lg px-2 py-1 rounded-2">
                        </div>

                        {{-- slug --}}
                        <div class="flex flex-col">
                            <label for="slug">Slug</label>
                            <input type="text" name="slug" id="slug" class="border text-lg px-2 py-1 rounded-2">
                        </div>

                        {{-- category select input --}}
                        <div class="flex flex-col">
                            <label for="category_id">Category</label>
                            <select name="category_id" id="category_id" class="border text-lg px-2 py-1 rounded-2 bg-white">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- tags --}}
                        <div class="flex flex-col">
                            <label for="tags">Tags (separated by comma ,)</label>
                            <input type="text" id="tags" class="border text-lg px-2 py-1 rounded-2" name="tags">
                        </div>


                        {{-- image --}}
                        <div class="flex flex-col">
                            <label for="image">Image</label>
                            <input type="file" name="image" id="image" class="border text-lg px-2 py-1 rounded-2">
                        </div>

                        {{-- published --}}
                        <div class="flex flex-col">
                            <label for="published">Publish</label>
                            <div class="flex gap-4">
                                <div>
                                    <input type="radio" value="now" name="publish" checked>
                                    <label>now</label>
                                </div>
                                <div>
                                    <input type="radio" value="schedule" name="publish">
                                    <label>schedule</label>
                                </div>
                            </div>
                        </div>

                        {{-- published time --}}
                        <div class="flex flex-col">
                            <label for="published_at">Published At</label>
                            <input type="datetime-local" name="published_at" id="published_at"
                                class="border text-lg px-2 py-1 rounded-2" value="" disabled>
                        </div>

                        <textarea id="tinymce" name="body" class="editor"></textarea>

                        <button type="submit"
                            class="bg-blue-500 text-white px-4 py-1 rounded-md hover:bg-blue-700 mt-4">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('head')
    <script src="https://cdn.tiny.cloud/1/xmbkvq3c55a3out0mcazzve3hsj1oi9dxwrt25my8prdh9qx/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>
@endpush

@push('scripts')
    <script>
        // tinymce initialization
        tinymce.init({
            selector: '#tinymce',
            plugins: 'code table lists',
            toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table'
        });

        // slug checker
        const title = document.getElementById('title');
        const slug = document.getElementById('slug');

        title.addEventListener('change', function() {
            fetch("{{ route('slug') }}?title=" + title.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });

        // publish & published_at
        const published = document.querySelectorAll('input[name=publish]');
        const published_at = document.querySelector('input[name=published_at]');
        published.forEach(i => {
            i.addEventListener('click', function() {
            console.log(i.value, published_at);
            if (i.value == 'now') {
                published_at.setAttribute('disabled', true);
            } else {
                published_at.removeAttribute('disabled');
                console.log('removing');
            }
        })
        })
    </script>
@endpush
