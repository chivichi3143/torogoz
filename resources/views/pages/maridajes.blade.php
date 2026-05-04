@php
    $maridajeImg = static function (string $filename): string {
        return '/imagenes/'.rawurlencode('ubicar imagenes').'/'.rawurlencode($filename);
    };

    $items = [
        ['id' => 'apa', 'file' => 'Maridaje APA.jpg', 'title' => 'APA'],
        ['id' => 'honey', 'file' => 'Maridaje Honey.jpg', 'title' => 'Honey'],
        ['id' => 'porter', 'file' => 'Maridaje Porter.jpg', 'title' => 'Porter'],
        ['id' => 'red-ale', 'file' => 'Maridaje Red ALE.jpg', 'title' => 'Red Ale'],
        ['id' => 'weissbier', 'file' => 'Maridaje Weissbier.jpg', 'title' => 'Weissbier'],
    ];
@endphp

<x-layouts.app>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <a href="/#cervezas" class="text-amber-500 hover:text-amber-400 font-medium mb-8 inline-flex items-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Volver al catálogo
        </a>

        <div class="text-center mb-16">
            <span class="inline-block py-1 px-3 rounded-full bg-amber-500/10 border border-amber-500/20 text-amber-500 text-sm font-semibold tracking-wider mb-4 uppercase">Torogoz</span>
            <h1 class="text-5xl md:text-6xl font-bold font-serif text-white mb-4">Maridajes</h1>
            <p class="text-zinc-400 text-lg max-w-2xl mx-auto">
                Infografías con combinaciones recomendadas, notas técnicas y perfiles de sabor por estilo.
            </p>
        </div>

        <div class="space-y-20">
            @foreach($items as $item)
                <section id="maridaje-{{ $item['id'] }}" class="scroll-mt-24">
                    <h2 class="text-2xl font-bold font-serif text-amber-500 mb-6 border-b border-zinc-800 pb-3">{{ $item['title'] }}</h2>
                    <div class="rounded-3xl overflow-hidden border border-zinc-800 bg-zinc-900/40 shadow-2xl">
                        <img
                            src="{{ $maridajeImg($item['file']) }}"
                            alt="Maridaje {{ $item['title'] }}"
                            class="w-full h-auto block"
                            loading="lazy"
                            decoding="async"
                        >
                    </div>
                </section>
            @endforeach
        </div>

        <p class="text-center text-zinc-500 text-sm mt-16">
            ¿Quieres profundizar en historias y contexto?
            <a href="/guia" class="text-amber-500 hover:text-amber-400 font-medium">Guía de estilos y maridaje</a>
        </p>
    </div>
</x-layouts.app>
