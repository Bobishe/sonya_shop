{{--
    Breadcrumbs Component

    Props:
    - $items (array): Array of breadcrumb items
      Example: [
          ['label' => 'Home', 'url' => '/'],
          ['label' => 'Category', 'url' => '/category'],
          ['label' => 'Product'] // Last item without URL
      ]
--}}

@props([
    'items' => [],
])

@if(count($items) > 0)
<nav class="breadcrumbs" aria-label="Breadcrumb">
    <ol class="breadcrumb-list">
        @foreach($items as $index => $item)
            <li class="breadcrumb-item {{ $index === count($items) - 1 ? 'active' : '' }}">
                @if(isset($item['url']) && $index < count($items) - 1)
                    <a href="{{ $item['url'] }}">{{ $item['label'] }}</a>
                @else
                    <span>{{ $item['label'] }}</span>
                @endif

                @if($index < count($items) - 1)
                    <svg class="breadcrumb-separator" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="9 18 15 12 9 6"></polyline>
                    </svg>
                @endif
            </li>
        @endforeach
    </ol>
</nav>

@push('css')
<style>
    .breadcrumbs {
        padding: 1rem 0;
        background: #f5f5f5;
    }

    .breadcrumb-list {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        list-style: none;
        margin: 0;
        padding: 0;
        gap: 0.5rem;
    }

    .breadcrumb-item {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-size: 0.875rem;
    }

    .breadcrumb-item a {
        color: #666;
        text-decoration: none;
        transition: color 0.3s;
    }

    .breadcrumb-item a:hover {
        color: #000;
    }

    .breadcrumb-item.active span {
        color: #000;
        font-weight: 500;
    }

    .breadcrumb-separator {
        color: #999;
    }
</style>
@endpush
@endif
