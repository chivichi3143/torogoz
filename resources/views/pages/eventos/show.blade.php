@php
    $metaDescription = $event->shareDescriptionExcerpt(160);
    $canonical = $event->publicUrl();
    $ogImage = $event->absoluteShareImageUrl();
@endphp
<x-layouts.app :title="$event->title" :meta-description="$metaDescription">
    @push('head')
        <link rel="canonical" href="{{ $canonical }}">
        <meta property="og:title" content="{{ e($event->title) }}">
        <meta property="og:description" content="{{ e($metaDescription) }}">
        <meta property="og:url" content="{{ $canonical }}">
        <meta property="og:image" content="{{ $ogImage }}">
        <meta property="og:image:alt" content="{{ e($event->title) }}">
        <meta property="og:type" content="article">
        <meta property="og:site_name" content="Cerveza El Torogoz">
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="{{ e($event->title) }}">
        <meta name="twitter:description" content="{{ e($metaDescription) }}">
        <meta name="twitter:image" content="{{ $ogImage }}">
    @endpush

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <a href="/eventos" class="text-amber-500 hover:text-amber-400 font-medium mb-8 inline-flex items-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Volver a Eventos
        </a>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
            <!-- Detalles del Evento -->
            <div>
                <h1 class="text-5xl font-bold font-serif text-white mb-4">{{ $event->title }}</h1>
                <div class="mb-6 flex flex-wrap items-center gap-4 text-sm font-semibold uppercase tracking-wider text-zinc-400">
                    <span>{{ \Carbon\Carbon::parse($event->date)->format('d M, Y') }}</span>
                    <span>&bull;</span>
                    <a
                        href="{{ $event->resolvedMapsUrl() }}"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="max-w-full text-amber-500 underline decoration-amber-600/40 underline-offset-2 transition hover:text-amber-400 hover:decoration-amber-400"
                    >
                        {{ $event->location }}
                    </a>
                </div>

                <x-event-share :event="$event" variant="full" class="mb-8" />

                @if($imgUrl = $event->imageStorageUrl())
                    <button type="button" class="js-site-image-modal mb-8 block w-full overflow-hidden rounded-2xl border border-zinc-800 p-0 focus:outline-none focus-visible:ring-2 focus-visible:ring-amber-500" data-image-url="{{ $imgUrl }}" data-alt="{{ $event->title }}" data-caption="{{ e(\Illuminate\Support\Str::limit($event->description, 1200)) }}">
                        <img src="{{ $imgUrl }}" alt="{{ $event->title }}" class="h-64 w-full object-cover transition-opacity hover:opacity-95">
                    </button>
                @endif

                <div class="prose prose-invert prose-amber max-w-none text-zinc-300 leading-relaxed">
                    {!! nl2br(e($event->description)) !!}
                </div>

                <!-- Formulario de Reseñas -->
                <livewire:event-review-form :eventId="$event->id" />
            </div>

            <!-- Galería y Reseñas de Usuarios -->
            <div>
                <h2 class="text-3xl font-bold font-serif text-white mb-8">Galería y Comentarios</h2>
                
                @if($event->reviews->isEmpty())
                    <div class="bg-zinc-900/50 border border-zinc-800 rounded-2xl p-8 text-center">
                        <svg class="w-12 h-12 text-zinc-600 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        <p class="text-zinc-400">Aún no hay fotos ni comentarios de este evento. ¡Sé el primero en compartir tu experiencia!</p>
                    </div>
                @else
                    <div class="space-y-6">
                        @foreach($event->reviews as $review)
                            <div class="bg-zinc-900/80 border border-zinc-800 rounded-2xl p-6 shadow-xl">
                                <div class="flex items-center gap-3 mb-4">
                                    <div class="w-10 h-10 bg-amber-500/20 text-amber-500 rounded-full flex items-center justify-center font-bold">
                                        {{ mb_substr($review->author_name, 0, 1) }}
                                    </div>
                                    <div>
                                        <h4 class="text-white font-bold">{{ $review->author_name }}</h4>
                                        <p class="text-xs text-zinc-500">{{ $review->created_at->diffForHumans() }}</p>
                                    </div>
                                </div>
                                
                                <p class="text-zinc-300 text-sm leading-relaxed mb-4">{{ $review->comment }}</p>
                                
                                @if($photoUrl = $review->photoStorageUrl())
                                    @php
                                        $modalCaption = trim(collect([$review->comment, $review->author_name])->filter()->implode(' — '));
                                    @endphp
                                    <button type="button" class="js-site-image-modal block w-full overflow-hidden rounded-xl border border-zinc-800 p-0 focus:outline-none focus-visible:ring-2 focus-visible:ring-amber-500" data-image-url="{{ $photoUrl }}" data-alt="Foto de {{ $review->author_name }}" data-caption="{{ e($modalCaption) }}">
                                        <img src="{{ $photoUrl }}" alt="Foto de {{ $review->author_name }}" class="h-48 w-full object-cover transition-opacity hover:opacity-90">
                                    </button>
                                @endif
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-layouts.app>
