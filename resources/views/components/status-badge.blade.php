<span
    @class([
        'inline-flex items-center px-2.5 py-1 text-xs font-medium',
        'bg-green-100 text-green-700' => $color === 'green',
        'bg-red-100 text-red-700' => $color === 'red',
    ])
>
    {{ $label }}
</span>