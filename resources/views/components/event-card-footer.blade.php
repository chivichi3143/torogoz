@props(['event'])

<div {{ $attributes->class('mt-auto border-t border-zinc-800/70 px-6 py-4') }}>
    <div class="flex flex-col gap-4 sm:flex-row sm:flex-wrap sm:items-center sm:justify-between">
        <a
            href="{{ $event->resolvedMapsUrl() }}"
            target="_blank"
            rel="noopener noreferrer"
            class="group/loc flex min-w-0 max-w-full items-start gap-2 text-left text-sm font-medium text-zinc-400 transition hover:text-amber-400 sm:max-w-[55%] lg:max-w-[60%]"
        >
            <svg class="mt-0.5 h-4 w-4 shrink-0 text-zinc-500 transition group-hover/loc:text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
            <span class="min-w-0 leading-snug underline decoration-zinc-600 decoration-1 underline-offset-2 transition group-hover/loc:decoration-amber-500">{{ $event->location }}</span>
        </a>

        <div class="flex flex-wrap items-center gap-3 sm:gap-4 sm:justify-end">
            <a
                href="{{ route('events.show', $event->slug) }}"
                class="inline-flex shrink-0 items-center gap-2 rounded-full border border-amber-600/45 bg-amber-600/10 px-4 py-2 text-xs font-bold uppercase tracking-wide text-amber-400 transition hover:border-amber-500/80 hover:bg-amber-500/15 hover:text-amber-300"
            >
                Ir al evento
                <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </a>
            <x-event-share :event="$event" variant="compact" />
        </div>
    </div>
</div>
