<a href="{{ $attributes->get('link') }}" @class([
    'text-gray-600 hover:bg-gray-50 hover:text-gray-900 group flex items-center px-2 py-2 text-base font-medium rounded-md' => $mobile,
    'text-gray-600 hover:bg-gray-50 hover:text-gray-900 group flex items-center px-2 py-2 text-sm font-medium rounded-md' => !$mobile,
    'bg-gray-100 text-gray-900' => $attributes->get('match') == 1,
])>
    <!-- Heroicon name: outline/view-grid -->
    {{ $slot }}
    {{ $attributes->get('title') }}
</a>
