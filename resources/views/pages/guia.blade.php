@php
    $maridajeImg = static function (string $filename): string {
        return '/imagenes/'.rawurlencode('ubicar imagenes').'/'.rawurlencode($filename);
    };
@endphp

<x-layouts.app>
    <!-- Cabecera -->
    <div class="relative py-24 overflow-hidden bg-zinc-950">
        <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top,_var(--tw-gradient-stops))] from-amber-900/20 via-zinc-950 to-zinc-950"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            <span class="inline-block py-1 px-3 rounded-full bg-amber-500/10 border border-amber-500/20 text-amber-500 text-sm font-semibold tracking-wider mb-6 uppercase">Aprende con Torogoz</span>
            <h1 class="text-5xl md:text-7xl font-bold font-serif text-white mb-6">Guía de Estilos y Maridaje</h1>
            <p class="text-zinc-400 text-lg md:text-xl max-w-3xl mx-auto leading-relaxed">
                Descubre los secretos detrás de cada estilo de cerveza y aprende a combinarlos perfectamente con tus platillos favoritos.
            </p>
        </div>
    </div>

    <!-- Sección de Historias -->
    <section class="py-24 bg-zinc-900/30 border-y border-zinc-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold font-serif text-white mb-4">Nuestras Historias</h2>
                <p class="text-zinc-400 text-lg">El origen y la inspiración detrás de nuestros estilos principales.</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <img src="/images/renamed/Historia APA.jpg" alt="Historia APA" class="w-full h-auto rounded-3xl shadow-xl border border-zinc-800 hover:border-amber-500/50 transition-colors">
                <img src="/images/renamed/Historia Honey.jpg" alt="Historia Honey" class="w-full h-auto rounded-3xl shadow-xl border border-zinc-800 hover:border-amber-500/50 transition-colors">
                <img src="/images/renamed/Historia Porter.jpg" alt="Historia Porter" class="w-full h-auto rounded-3xl shadow-xl border border-zinc-800 hover:border-amber-500/50 transition-colors">
                <img src="/images/renamed/Historia RedAle.jpg" alt="Historia Red Ale" class="w-full h-auto rounded-3xl shadow-xl border border-zinc-800 hover:border-amber-500/50 transition-colors">
                <div class="md:col-span-2 max-w-2xl mx-auto">
                    <img src="/images/renamed/Weissbier historia.jpg" alt="Historia Weissbier" class="w-full h-auto rounded-3xl shadow-xl border border-zinc-800 hover:border-amber-500/50 transition-colors">
                </div>
            </div>
        </div>
    </section>

    <!-- Sección de Maridaje -->
    <section class="py-24 bg-zinc-950 relative overflow-hidden">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_center,_var(--tw-gradient-stops))] from-amber-900/10 via-transparent to-transparent"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold font-serif text-white mb-4">El Arte del Maridaje</h2>
                <p class="text-zinc-400 text-lg max-w-2xl mx-auto">Encuentra la combinación ideal para resaltar el sabor de tu comida y tu bebida.</p>
                <a href="/maridajes" class="inline-flex items-center gap-2 mt-6 text-amber-500 hover:text-amber-400 font-semibold text-sm">
                    Ver página solo de maridajes
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </a>
            </div>

            <div class="space-y-12">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <img src="{{ $maridajeImg('Maridaje APA.jpg') }}" alt="Maridaje APA" class="w-full h-auto rounded-3xl shadow-2xl border border-zinc-800 hover:border-amber-500/50 transition-colors transform hover:-translate-y-1">
                    <img src="{{ $maridajeImg('Maridaje Honey.jpg') }}" alt="Maridaje Honey" class="w-full h-auto rounded-3xl shadow-2xl border border-zinc-800 hover:border-amber-500/50 transition-colors transform hover:-translate-y-1">
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <img src="{{ $maridajeImg('Maridaje Porter.jpg') }}" alt="Maridaje Porter" class="w-full h-auto rounded-3xl shadow-2xl border border-zinc-800 hover:border-amber-500/50 transition-colors transform hover:-translate-y-1">
                    <img src="{{ $maridajeImg('Maridaje Red ALE.jpg') }}" alt="Maridaje Red Ale" class="w-full h-auto rounded-3xl shadow-2xl border border-zinc-800 hover:border-amber-500/50 transition-colors transform hover:-translate-y-1">
                </div>
                <div class="max-w-2xl mx-auto">
                    <img src="{{ $maridajeImg('Maridaje Weissbier.jpg') }}" alt="Maridaje Weissbier" class="w-full h-auto rounded-3xl shadow-2xl border border-zinc-800 hover:border-amber-500/50 transition-colors transform hover:-translate-y-1">
                </div>
            </div>
        </div>
    </section>

</x-layouts.app>
