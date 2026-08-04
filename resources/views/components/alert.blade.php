@if ($type === 'INFO')
    <div class="rounded-lg bg-blue-100 border-blue-500 p-4 text-sm" role="alert">
        <p class="font-medium">Info</p>
        <p>{{ $slot }}</p>
    </div>

@elseif ($type === 'WARNING')
    <div class="rounded-lg bg-yellow-100 border-yellow-500 p-4 text-sm" role="alert">
        <p class="font-medium">Peringatan</p>
        <p>{{ $slot }}</p>
    </div>

@elseif ($type === 'ERROR')
    <div class="rounded-lg bg-red-100 border-red-500 p-4 text-sm" role="alert">
        <p class="font-medium">Kesalahan</p>
        <p>{{ $slot }}</p>
    </div>

@endif