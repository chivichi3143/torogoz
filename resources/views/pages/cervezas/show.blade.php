<x-layouts.app>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <a href="/#cervezas" class="text-amber-500 hover:text-amber-400 font-medium mb-8 inline-flex items-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Volver al Catálogo
        </a>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <!-- Imagen de la cerveza con fondo -->
            <div class="w-full relative overflow-hidden rounded-3xl shadow-2xl ring-1 ring-zinc-800">
                <button type="button" class="js-site-image-modal block w-full p-0 border-0 bg-transparent cursor-zoom-in text-left" data-image-url="{{ $beer->image_background }}" data-caption="{{ e($beer->description) }}">
                    <img src="{{ $beer->image_background }}" alt="{{ $beer->name }}" style="width: 100%; height: 100%; object-fit: cover; min-height: 400px;" class="relative z-10 hover:scale-105 transition-transform duration-700">
                </button>
            </div>

            <!-- Información Detallada -->
            <div>
                <span class="text-amber-500 font-bold tracking-wider uppercase text-sm mb-2 block">{{ $beer->style }}</span>
                <h1 class="text-6xl font-bold font-serif text-white mb-6" style="color: {{ $beer->accent }}">{{ $beer->name }}</h1>
                
                <div class="flex items-center gap-8 border-y border-zinc-800 py-6 mb-8">
                    <div class="text-center">
                        <span class="block text-3xl font-bold text-white">{{ $beer->abv }}%</span>
                        <span class="text-xs text-zinc-500 uppercase tracking-wider font-semibold mt-1 block">Alcohol (ABV)</span>
                    </div>
                    <div class="w-px h-12 bg-zinc-800"></div>
                    <div class="text-center">
                        <span class="block text-3xl font-bold text-white">{{ $beer->ibus }}</span>
                        <span class="text-xs text-zinc-500 uppercase tracking-wider font-semibold mt-1 block">Amargor (IBU)</span>
                    </div>
                </div>

                <p class="text-zinc-300 text-lg leading-relaxed mb-10">
                    {{ $beer->description }}
                </p>

                <!-- Perfil de Sabor con Estrellas -->
                <h3 class="text-xl font-bold text-white mb-6">Perfil de Sabor</h3>
                <div class="space-y-6 mb-10 bg-zinc-900/50 p-6 rounded-2xl border border-zinc-800">
                    @foreach(['Amargor' => $beer->amargor, 'Cuerpo' => $beer->cuerpo, 'Aroma' => $beer->aroma] as $statName => $statValue)
                    <div class="flex items-center justify-between text-sm">
                        <span class="text-zinc-400 font-medium uppercase tracking-wider">{{ $statName }}</span>
                        <div class="flex gap-1">
                            @for($i = 1; $i <= 5; $i++)
                                <svg class="w-5 h-5 {{ $i <= $statValue ? 'text-amber-500' : 'text-zinc-700' }}" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                            @endfor
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="bg-amber-900/10 border border-amber-500/20 rounded-2xl p-6">
                    <div class="flex flex-wrap items-start justify-between gap-4 mb-3">
                        <h4 class="text-amber-500 font-bold uppercase tracking-wider text-sm flex items-center gap-2">
                            <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                            Maridaje recomendado
                        </h4>
                        @php
                            $maridajeAnchors = [
                                'apa' => 'maridaje-apa',
                                'honey' => 'maridaje-honey',
                                'porter' => 'maridaje-porter',
                                'weissbier' => 'maridaje-weissbier',
                                'ginger' => null,
                            ];
                            $maridajeHash = $maridajeAnchors[$beer->slug] ?? null;
                        @endphp
                        <a
                            href="{{ $maridajeHash ? '/maridajes#'.$maridajeHash : '/maridajes' }}"
                            class="text-amber-400 hover:text-amber-300 text-sm font-semibold inline-flex items-center gap-1 shrink-0"
                        >
                            Ver más
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </a>
                    </div>
                    <p class="text-zinc-300">{{ $beer->pairing }}</p>
                    @if($beer->slug === 'ginger')
                        <p class="text-zinc-500 text-xs mt-3">En la página de maridajes hay fichas de otros estilos (por ejemplo Red Ale) como referencia de combinaciones.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
