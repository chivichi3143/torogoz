<x-layouts.app>
    <!-- Hero Section -->
    <section class="relative min-h-[90vh] flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 bg-zinc-950">
            @if(!empty($heroVideoUrl))
                <video
                    class="absolute inset-0 h-full w-full object-cover"
                    autoplay
                    muted
                    loop
                    playsinline
                    preload="metadata"
                >
                    <source src="{{ $heroVideoUrl }}" type="video/mp4">
                </video>
            @endif

            <!-- Filtro oscuro y gradiente más intenso para legibilidad del hero -->
            <div class="absolute inset-0 bg-zinc-950/70"></div>
            <div class="absolute inset-0 bg-[radial-gradient(circle_at_center,_var(--tw-gradient-stops))] from-amber-900/35 via-zinc-950/85 to-zinc-950"></div>

            <!-- Decorative blur blobs -->
            <div class="absolute top-1/4 -left-32 w-96 h-96 bg-amber-600/10 rounded-full mix-blend-screen filter blur-[100px] animate-blob"></div>
            <div class="absolute bottom-1/4 -right-32 w-96 h-96 bg-red-600/10 rounded-full mix-blend-screen filter blur-[100px] animate-blob animation-delay-2000"></div>
        </div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center mt-10">
            <span class="inline-block py-1 px-3 rounded-full bg-amber-500/10 border border-amber-500/20 text-amber-400 text-sm font-semibold tracking-wider mb-6">
                CERVECERÍA EL TOROGOZ
            </span>
            <h1 class="text-5xl md:text-7xl font-bold font-serif text-white mb-8 tracking-tight">
                El Auténtico Sabor de <br>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-amber-400 to-amber-600">El Salvador</span>
            </h1>
            <p class="mt-4 text-xl md:text-2xl text-white max-w-3xl mx-auto font-normal leading-relaxed mb-10" style="text-shadow: 0 2px 14px rgba(0, 0, 0, 0.65);">
                Orgullosamente originaria de Chalchuapa. Una experiencia artesanal con una visión hacia el futuro. Descubre nuestras variedades únicas y siente la tradición salvadoreña en cada sorbo.
            </p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="#cervezas" class="bg-amber-600 hover:bg-amber-500 text-white px-8 py-4 rounded-full font-bold text-lg transition-all shadow-[0_0_20px_rgba(217,119,6,0.4)] hover:shadow-[0_0_30px_rgba(217,119,6,0.7)] flex items-center justify-center gap-2">
                    Explorar Cervezas
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path></svg>
                </a>
            </div>
        </div>
    </section>

    <!-- Nuestras Cervezas Section -->
    <section id="cervezas" class="py-24 relative bg-zinc-900/30 border-y border-zinc-800">
        <div class="absolute right-0 top-0 w-1/3 h-full bg-[radial-gradient(ellipse_at_right,_var(--tw-gradient-stops))] from-amber-900/10 via-transparent to-transparent"></div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-20">
                <h2 class="text-4xl md:text-5xl font-bold font-serif text-white mb-4">Nuestro Catálogo</h2>
                <p class="text-zinc-400 text-lg max-w-2xl mx-auto">Explora nuestra selección de cervezas de especialidad, elaboradas para satisfacer paladares exigentes.</p>
            </div>

            <!-- Beer Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($beers as $beer)
                <a href="/cervezas/{{ $beer->slug }}" class="block bg-zinc-900/80 border border-zinc-800 rounded-3xl overflow-hidden hover:border-zinc-700 transition-all duration-300 group hover:-translate-y-2 backdrop-blur-md shadow-xl flex flex-col cursor-pointer">
                    
                    <!-- Top section with Image -->
                    <div class="w-full relative overflow-hidden flex items-center justify-center bg-zinc-950" style="height: 20rem;">
                        <!-- Abstract Background for Image -->
                        <div class="absolute inset-0 opacity-30" style="background: radial-gradient(circle at center, {{ $beer->color }}40 0%, transparent 70%);"></div>
                        
                        <!-- Original Beer Image -->
                        <img src="{{ $beer->imageBottleUrl() }}" alt="{{ $beer->name }} Cerveza Artesanal" style="width: 100%; height: 100%; object-fit: contain; padding: 2rem;" class="relative z-10 group-hover:scale-105 transition-transform duration-700 drop-shadow-2xl">
                    </div>

                    <!-- Info Section -->
                    <div class="p-8 flex-grow flex flex-col">
                        <div class="flex justify-between items-start mb-4">
                            <div>
                                <h3 class="text-2xl font-bold font-serif text-white group-hover:text-amber-400 transition-colors" style="color: {{ $beer->accent }}">{{ $beer->name }}</h3>
                                <p class="text-sm text-zinc-400 font-medium">{{ $beer->style }}</p>
                            </div>
                            <div class="text-right">
                                <span class="block text-lg font-bold text-white">{{ $beer->abv }}% <span class="text-xs text-zinc-500 font-normal">ABV</span></span>
                            </div>
                        </div>

                        <div class="mt-auto pt-4 border-t border-zinc-800 text-center">
                            <span class="text-amber-500 text-sm font-semibold group-hover:text-amber-400">Ver detalles y maridaje &rarr;</span>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Cultura Cervecera Salvadoreña (SEO Section) -->
    <section
        class="py-24 bg-[url('/images/background_parallax.png')] bg-fixed bg-cover bg-center relative overflow-hidden"
        style="background-image: url('/images/background_parallax.png'); background-attachment: fixed; background-size: cover; background-position: center;"
    >
        <div class="absolute inset-0 bg-zinc-950/55"></div>
        <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_left,_var(--tw-gradient-stops))] from-amber-900/30 via-transparent to-transparent"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <div>
                    <h2 class="text-4xl md:text-5xl font-bold font-serif text-white mb-6">Cultura Cervecera Salvadoreña</h2>
                    <div class="w-20 h-1 bg-amber-500 mb-8 rounded-full"></div>
                    <p class="text-zinc-300 text-lg leading-relaxed mb-6">
                        Cerveza El Torogoz no es solo una bebida, es el reflejo del espíritu emprendedor y la riqueza cultural de <strong class="text-amber-400">El Salvador</strong>. Pioneros en la revolución de la cerveza artesanal en la región occidental, elaboramos nuestras cervezas en Chalchuapa utilizando métodos tradicionales y tecnología de vanguardia.
                    </p>
                    <p class="text-zinc-400 text-lg leading-relaxed mb-8">
                        Nuestra misión es educar el paladar local, ofreciendo alternativas de alta calidad que compiten a nivel internacional. Desde maltas importadas hasta el agua cristalina de nuestros nacimientos, cada elemento es cuidadosamente seleccionado para garantizar una experiencia premium.
                    </p>
                    <a href="/guia" class="inline-flex items-center gap-2 text-amber-500 font-bold hover:text-amber-400 transition-colors">
                        Ver Guía Completa de Estilos <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                    </a>
                </div>
                <div class="relative h-[400px] md:h-[500px] w-full mt-12 lg:mt-0">
                    <img src="/images/renamed/Lote de cervezas sobre helador.jpg" alt="Lote de cervezas" class="absolute top-0 right-0 w-4/5 h-4/5 object-cover rounded-3xl shadow-2xl border border-zinc-700/50 z-10">
                    <img src="/images/renamed/Weisbier bandera salvadoreña.jpg" alt="Weissbier El Torogoz" class="absolute bottom-0 left-0 w-3/5 h-3/5 object-contain bg-zinc-950/60 rounded-3xl shadow-[0_20px_50px_rgba(0,0,0,0.5)] border-4 border-zinc-900 z-20 hover:scale-105 transition-transform duration-500 p-3">
                </div>
            </div>
        </div>
    </section>

    <!-- Encuentra tu Torogoz (Maridaje Interactivo) -->
    <section class="py-24 bg-zinc-950 border-t border-zinc-800 relative overflow-hidden">
        <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top,_var(--tw-gradient-stops))] from-amber-900/10 via-transparent to-transparent pointer-events-none"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
            <span class="inline-block py-1 px-3 rounded-full bg-amber-500/10 text-amber-500 text-sm font-semibold tracking-wider mb-4 uppercase">¿Qué vas a comer hoy?</span>
            <h2 class="text-4xl md:text-5xl font-bold font-serif text-white mb-16">Encuentra tu Maridaje Perfecto</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 text-left">
                <!-- Mariscos -->
                <div class="bg-zinc-950 p-6 rounded-3xl border border-zinc-800 hover:border-amber-500/50 transition-colors group">
                    <div class="w-12 h-12 bg-amber-500/10 text-amber-500 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path></svg>
                    </div>
                        <h3 class="text-xl font-bold text-white mb-2">Mariscos y Ceviches</h3>
                        <p class="text-zinc-400 text-sm mb-6">Sabores frescos y cítricos que combinan perfecto con cervezas ligeras.</p>
                        <div class="border-t border-zinc-800 pt-4">
                            <span class="text-xs text-zinc-500 uppercase tracking-wider font-semibold">Cerveza Ideal:</span>
                            <p class="text-amber-500 font-bold mt-1 group-hover:text-amber-400">Honey o Weissbier</p>
                        </div>
                </div>

                <!-- Carnes -->
                <div class="bg-zinc-950 p-6 rounded-3xl border border-zinc-800 hover:border-amber-500/50 transition-colors group">
                    <div class="w-12 h-12 bg-amber-500/10 text-amber-500 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.879 16.121A3 3 0 1012.015 11L11 14H9c0 .768.293 1.536.879 2.121z"></path></svg>
                    </div>
                        <h3 class="text-xl font-bold text-white mb-2">Asados y Parrilladas</h3>
                        <p class="text-zinc-400 text-sm mb-6">Cortes de carne que requieren sabores con cuerpo y amargor presente.</p>
                        <div class="border-t border-zinc-800 pt-4">
                            <span class="text-xs text-zinc-500 uppercase tracking-wider font-semibold">Cerveza Ideal:</span>
                            <p class="text-amber-500 font-bold mt-1 group-hover:text-amber-400">APA o Porter</p>
                        </div>
                </div>

                <!-- Comida Ligera -->
                <div class="bg-zinc-950 p-6 rounded-3xl border border-zinc-800 hover:border-amber-500/50 transition-colors group">
                    <div class="w-12 h-12 bg-amber-500/10 text-amber-500 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>
                    </div>
                        <h3 class="text-xl font-bold text-white mb-2">Comida Ligera</h3>
                        <p class="text-zinc-400 text-sm mb-6">Ensaladas o platillos suaves que no compiten con el sabor de la cerveza.</p>
                        <div class="border-t border-zinc-800 pt-4">
                            <span class="text-xs text-zinc-500 uppercase tracking-wider font-semibold">Cerveza Ideal:</span>
                            <p class="text-amber-500 font-bold mt-1 group-hover:text-amber-400">Ginger o Weissbier</p>
                        </div>
                </div>

                <!-- Postres -->
                <div class="bg-zinc-950 p-6 rounded-3xl border border-zinc-800 hover:border-amber-500/50 transition-colors group">
                    <div class="w-12 h-12 bg-amber-500/10 text-amber-500 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                        <h3 class="text-xl font-bold text-white mb-2">Postres Chocolatosos</h3>
                        <p class="text-zinc-400 text-sm mb-6">El cacao y el dulce resaltan espectacularmente con notas tostadas.</p>
                        <div class="border-t border-zinc-800 pt-4">
                            <span class="text-xs text-zinc-500 uppercase tracking-wider font-semibold">Cerveza Ideal:</span>
                            <p class="text-amber-500 font-bold mt-1 group-hover:text-amber-400">Porter (Cerveza Oscura)</p>
                        </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Últimos Eventos -->
    <section class="py-24 bg-zinc-950 border-t border-zinc-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="flex justify-between items-end mb-12">
                <div>
                    <span class="inline-block py-1 px-3 rounded-full bg-amber-500/10 text-amber-500 text-sm font-semibold tracking-wider mb-4 uppercase">Agenda</span>
                    <h2 class="text-4xl font-bold font-serif text-white">Eventos Destacados</h2>
                </div>
                <a href="/eventos" class="hidden sm:inline-flex items-center gap-2 text-amber-500 font-bold hover:text-amber-400 transition-colors group">
                    Ver todos los eventos <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
                @forelse($events as $event)
                <div class="flex h-full flex-col overflow-hidden rounded-3xl border border-zinc-800 bg-zinc-900/50 transition-all duration-300 hover:-translate-y-1 hover:border-amber-500/50">
                    <a href="{{ route('events.show', $event->slug) }}" class="group block min-h-0 flex-1">
                        <div class="relative aspect-video overflow-hidden bg-zinc-800">
                            @if($imgUrl = $event->imageStorageUrl())
                                <img src="{{ $imgUrl }}" alt="{{ $event->title }}" class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105">
                            @else
                                <div class="flex h-full w-full items-center justify-center text-zinc-600">
                                    <svg class="h-12 w-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                </div>
                            @endif
                            <div class="absolute right-4 top-4 rounded-full border border-zinc-700 bg-zinc-950/90 px-3 py-1 text-xs font-bold text-white backdrop-blur-sm">
                                {{ \Carbon\Carbon::parse($event->date)->format('d M, Y') }}
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="mb-2 text-xl font-bold text-white transition-colors group-hover:text-amber-500">{{ $event->title }}</h3>
                            <p class="mb-4 line-clamp-2 text-sm text-zinc-400">{{ $event->description }}</p>
                        </div>
                    </a>
                    <x-event-card-footer :event="$event" />
                </div>
                @empty
                <div class="col-span-3 text-center py-12 bg-zinc-900/30 rounded-3xl border border-zinc-800 border-dashed">
                    <p class="text-zinc-500">No hay eventos programados en este momento.</p>
                </div>
                @endforelse
            </div>
            
            <div class="sm:hidden text-center mt-6">
                <a href="/eventos" class="inline-flex items-center gap-2 text-amber-500 font-bold hover:text-amber-400 transition-colors">
                    Ver todos los eventos &rarr;
                </a>
            </div>
        </div>
    </section>

    <!-- Galería Preview -->
    <section
        class="py-24 bg-[url('/images/background_parallax.png')] bg-fixed bg-cover bg-center border-t border-zinc-800 relative overflow-hidden"
        style="background-image: url('/images/background_parallax.png'); background-attachment: fixed; background-size: cover; background-position: center;"
    >
        <div class="absolute inset-0 bg-zinc-950/70"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
            <span class="inline-block py-1 px-3 rounded-full bg-amber-500/10 text-amber-500 text-sm font-semibold tracking-wider mb-4 uppercase">Nuestra Comunidad</span>
            <h2 class="text-4xl font-bold font-serif text-white mb-12">Galería Torogoz</h2>
            
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-10">
                <img src="/images/renamed/Cervezas sobre la mesa y chopera.jpg" alt="Galería Torogoz" class="w-full h-48 md:h-64 object-cover rounded-2xl hover:opacity-80 transition-opacity cursor-pointer shadow-xl">
                <img src="/images/renamed/Lote de cervezas sobre helador.jpg" alt="Galería Torogoz" class="w-full h-48 md:h-64 object-cover rounded-2xl hover:opacity-80 transition-opacity cursor-pointer shadow-xl">
                <img src="/images/renamed/Maestro cervecero tostando grano.jpg" alt="Galería Torogoz" class="w-full h-48 md:h-64 object-cover rounded-2xl hover:opacity-80 transition-opacity cursor-pointer shadow-xl">
                <img src="/images/renamed/Sobre nosotros maestro cervecero.jpg" alt="Galería Torogoz" class="w-full h-48 md:h-64 object-cover rounded-2xl hover:opacity-80 transition-opacity cursor-pointer shadow-xl">
            </div>

            <a href="/galeria" class="bg-zinc-800 hover:bg-zinc-700 text-white border border-zinc-700 px-8 py-3 rounded-full font-bold transition-all shadow-lg inline-flex items-center gap-2">
                Ver Galería Completa
            </a>
        </div>
    </section>

    <!-- Distribución (B2B Form) -->
    <section id="distribucion" class="py-24 relative bg-zinc-900/50 border-t border-zinc-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <div>
                    <span class="inline-block py-1 px-3 rounded-full bg-amber-500/10 text-amber-500 text-xs font-semibold tracking-wider mb-4 uppercase">Para Negocios</span>
                    <h2 class="text-4xl md:text-5xl font-bold font-serif text-white mb-6">Sé un Distribuidor</h2>
                    <p class="text-zinc-400 text-lg leading-relaxed mb-6">
                        ¿Tienes un restaurante, bar o supermercado? Sorprende a tus clientes con la auténtica cerveza artesanal de Chalchuapa. Ofrecemos Cerveza El Torogoz con beneficios exclusivos para aliados comerciales.
                    </p>
                    <ul class="space-y-4 mb-8">
                        <li class="flex items-center gap-3 text-zinc-300">
                            <svg class="w-6 h-6 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            Precios preferenciales por volumen.
                        </li>
                        <li class="flex items-center gap-3 text-zinc-300">
                            <svg class="w-6 h-6 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            Capacitación sobre estilos y maridaje para tu personal.
                        </li>
                        <li class="flex items-center gap-3 text-zinc-300">
                            <svg class="w-6 h-6 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            Entrega programada y soporte continuo.
                        </li>
                    </ul>
                </div>

                <!-- Formulario Livewire -->
                <div>
                    <livewire:distributor-form />
                </div>
            </div>
        </div>
    </section>

</x-layouts.app>
