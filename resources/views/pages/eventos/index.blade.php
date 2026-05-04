<x-layouts.app>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="text-center mb-16">
            <span class="inline-block py-1 px-3 rounded-full bg-amber-500/10 text-amber-500 text-sm font-semibold tracking-wider mb-4 uppercase">Agenda</span>
            <h1 class="text-5xl font-bold font-serif text-white mb-6">Próximos Eventos</h1>
            <p class="text-zinc-400 text-lg max-w-2xl mx-auto">Acompáñanos a disfrutar de la mejor cerveza artesanal en nuestros próximos festivales y degustaciones.</p>
        </div>

        @if($events->isEmpty())
            <div class="text-center py-12">
                <p class="text-zinc-400 text-xl">Actualmente no tenemos eventos programados. ¡Vuelve pronto!</p>
            </div>
        @else
            <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
                @foreach($events as $event)
                    <div class="flex h-full flex-col overflow-hidden rounded-2xl border border-zinc-800 bg-zinc-900/50 shadow-lg transition-all hover:-translate-y-1 hover:border-amber-500/50">
                        <a href="{{ route('events.show', $event->slug) }}" class="group block min-h-0 flex-1">
                            @if($imgUrl = $event->imageStorageUrl())
                                <div class="relative h-48 w-full overflow-hidden">
                                    <div class="absolute inset-0 z-10 bg-black/40 transition-colors group-hover:bg-transparent"></div>
                                    <img src="{{ $imgUrl }}" alt="{{ $event->title }}" class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-110">
                                </div>
                            @else
                                <div class="flex h-48 w-full items-center justify-center bg-zinc-800">
                                    <svg class="h-12 w-12 text-zinc-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                </div>
                            @endif

                            <div class="p-6">
                                <div class="mb-4 flex items-center gap-3">
                                    <div class="min-w-[60px] rounded-lg bg-amber-600 p-2 text-center text-white">
                                        <span class="block text-[10px] font-bold uppercase tracking-wider">{{ \Carbon\Carbon::parse($event->date)->format('M') }}</span>
                                        <span class="block text-xl font-bold leading-none">{{ \Carbon\Carbon::parse($event->date)->format('d') }}</span>
                                    </div>
                                    <span class="text-xs font-semibold uppercase tracking-wider text-amber-500">{{ $event->location }}</span>
                                </div>

                                <h2 class="mb-2 text-2xl font-bold text-white transition-colors group-hover:text-amber-400">{{ $event->title }}</h2>
                                <p class="line-clamp-3 text-sm text-zinc-400">{{ $event->description }}</p>
                            </div>
                        </a>
                        <x-event-card-footer :event="$event" />
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</x-layouts.app>
