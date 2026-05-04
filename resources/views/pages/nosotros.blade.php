<x-layouts.app>
    <!-- Cabecera de Nosotros -->
    <div class="relative py-24 overflow-hidden bg-zinc-950">
        <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top,_var(--tw-gradient-stops))] from-amber-900/20 via-zinc-950 to-zinc-950"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            <span class="inline-block py-1 px-3 rounded-full bg-amber-500/10 border border-amber-500/20 text-amber-500 text-sm font-semibold tracking-wider mb-6 uppercase">Nuestras Raíces</span>
            <h1 class="text-5xl md:text-7xl font-bold font-serif text-white mb-6">Nuestra Historia</h1>
            <p class="text-zinc-400 text-lg md:text-xl max-w-2xl mx-auto leading-relaxed">
                Nacidos en el corazón de <strong class="text-amber-400">Chalchuapa, El Salvador</strong>, Cerveza El Torogoz representa la fusión perfecta entre las técnicas ancestrales de elaboración y la innovación moderna.
            </p>
        </div>
    </div>

    <!-- Línea de Tiempo / Zig Zag -->
    <div class="py-24 bg-zinc-900/30 border-y border-zinc-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-32">
            
            <!-- Sección 1: Origen -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <div class="order-2 lg:order-1 relative">
                    <div class="absolute inset-0 bg-amber-600/20 blur-3xl rounded-full"></div>
                    <img src="/images/renamed/Sobre nosotros maestro cervecero.jpg" alt="Cervecería Torogoz" class="relative z-10 rounded-3xl shadow-2xl border border-zinc-800 w-full h-auto object-cover transform -rotate-2 hover:rotate-0 transition-transform duration-500">
                </div>
                <div class="order-1 lg:order-2">
                    <h2 class="text-4xl font-bold font-serif text-white mb-6 text-amber-500">100% Hecho en Chalchuapa</h2>
                    <p class="text-zinc-300 text-lg leading-relaxed mb-6">
                        Todo comenzó con la pasión por ofrecer a los salvadoreños una verdadera experiencia artesanal. En El Torogoz, cada botella es un tributo a nuestras raíces precolombinas, mezclando el respeto por nuestra tierra con la exigencia de crear una bebida premium.
                    </p>
                    <p class="text-zinc-400 text-lg leading-relaxed">
                        Nuestro compromiso es llevar la cultura cervecera a un nuevo nivel, educando paladares y demostrando que en El Salvador se puede producir cerveza de calidad mundial.
                    </p>
                </div>
            </div>

            <!-- Sección 2: Ingredientes -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <div>
                    <h2 class="text-4xl font-bold font-serif text-white mb-6 text-amber-500">Ingredientes Seleccionados</h2>
                    <p class="text-zinc-300 text-lg leading-relaxed mb-6">
                        No hay atajos en la creación de la excelencia. El Arte de la Elaboración en El Torogoz exige paciencia, dedicación y el uso exclusivo de ingredientes puros. Seleccionamos rigurosamente las mejores maltas, lúpulos aromáticos y levaduras especializadas.
                    </p>
                    <ul class="space-y-4 mb-6">
                        <li class="flex items-center gap-3 text-zinc-300">
                            <svg class="w-6 h-6 text-amber-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            Molienda precisa para extraer azúcares esenciales.
                        </li>
                        <li class="flex items-center gap-3 text-zinc-300">
                            <svg class="w-6 h-6 text-amber-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            Lupulado maestro para perfiles únicos de aroma y amargor.
                        </li>
                        <li class="flex items-center gap-3 text-zinc-300">
                            <svg class="w-6 h-6 text-amber-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            Fermentación y maduración paciente.
                        </li>
                    </ul>
                </div>
                <div class="relative">
                    <div class="absolute inset-0 bg-blue-600/20 blur-3xl rounded-full"></div>
                    <img src="/images/renamed/Maestro cervecero tostando grano.jpg" alt="Detalle Cervecería" class="relative z-10 rounded-3xl shadow-2xl border border-zinc-800 w-full h-auto object-cover transform rotate-2 hover:rotate-0 transition-transform duration-500">
                </div>
            </div>

            <!-- Sección 3: El Logo (Torogoz) -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <div class="order-2 lg:order-1 flex justify-center relative">
                    <img src="/images/IMG-1526.PNG" alt="Logo Cervecería El Torogoz" class="relative z-10 drop-shadow-2xl hover:scale-105 transition-transform duration-500" style="max-height: 400px; width: auto; object-fit: contain;">
                </div>
                <div class="order-1 lg:order-2">
                    <h2 class="text-4xl font-bold font-serif text-white mb-6 text-amber-500">El Ave que nos Inspira</h2>
                    <p class="text-zinc-300 text-lg leading-relaxed mb-6">
                        Elegimos al Torogoz, nuestra Ave Nacional, porque representa la libertad, la belleza incomparable y el orgullo de ser salvadoreños. Así como esta ave destaca en la naturaleza con sus vivos colores, nuestras cervezas están diseñadas para destacar en tu paladar.
                    </p>
                    <a href="/#cervezas" class="inline-flex items-center gap-2 bg-amber-600 hover:bg-amber-500 text-white font-bold py-3 px-6 rounded-full transition-colors mt-4">
                        Conoce nuestros estilos <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                    </a>
                </div>
            </div>

        </div>
    </div>
</x-layouts.app>
