@if ($onSearch)
    <a href="{{ route('search', ['category' => $category->name]) }}"
        class="badge badge-outline {{ request('category') == $category->name ? 'badge-primary' : '' }}">{{ $category->name }}</a>
@else
    <a href="{{ route('search', ['category' => $category->name]) }}" class="badge badge-outline">{{ $category->name }}</a>
@endif
