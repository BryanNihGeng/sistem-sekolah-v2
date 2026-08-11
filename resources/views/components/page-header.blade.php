<div class="mb-8 flex items-end justify-between border-b border-[#E5E3DB] pb-5">
 
    <div>
        <p class="mb-1 text-[11px] uppercase tracking-[0.2em] text-[#A16207]">
            Tahun Ajaran 2025/2026
        </p>
 
        <h1 class="font-display text-3xl font-semibold text-[#16213A]">
            {{ $title }}
        </h1>
    </div>
 
    @if ($actionRoute && $actionText)
        <a href="{{ route($actionRoute) }}"
            class="bg-[#16213A] px-5 py-2.5 text-sm font-medium text-white transition hover:bg-[#26324f]">
            {{ $actionText }}
        </a>
    @endif
 
</div>