@if ($status === 'Aktif')
    <div class="inline-flex items-center rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-700">
        Aktif
    </div>

@elseif ($status === 'Nonaktif')
    <div class="inline-flex items-center rounded-full bg-red-100 px-3 py-1 text-xs font-semibold text-red-700">
        Nonaktif
    </div>

@endif