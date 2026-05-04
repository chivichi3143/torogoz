@props([
    'title' => null,
    'metaDescription' => null,
])
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@if($title){{ $title }} | @endif Cerveza El Torogoz — Chalchuapa, El Salvador</title>
    <meta name="description" content="{{ $metaDescription ?? 'Descubre Cerveza El Torogoz, la cerveza artesanal originaria de Chalchuapa, El Salvador. Sabores únicos: Porter, Ginger, APA, Honey y Weissbier.' }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('favicon.png') }}">

    @stack('head')
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;800&family=Playfair+Display:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="bg-zinc-950 text-zinc-100 font-sans antialiased selection:bg-amber-500 selection:text-white flex flex-col min-h-screen">

    <!-- Navbar con Glassmorphism -->
    <header class="fixed w-full top-0 z-50 backdrop-blur-md bg-zinc-950/70 border-b border-zinc-800/50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <div class="flex-shrink-0 flex items-center gap-3">
                    <a href="/" class="flex items-center gap-2 p-1 rounded-xl">
                        <img src="/images/Logo Dorado.png" alt="Logo Cerveza El Torogoz" class="h-20 w-auto object-contain" style="height: 80px; max-width: 250px; object-fit: contain;">
                    </a>
                </div>
                
                <nav class="hidden md:flex space-x-8">
                    <a href="/" class="text-zinc-300 hover:text-amber-400 transition-colors px-3 py-2 text-sm font-medium tracking-wide">Inicio</a>
                    <a href="/nosotros" class="text-zinc-300 hover:text-amber-400 transition-colors px-3 py-2 text-sm font-medium tracking-wide">Sobre Nosotros</a>
                    <a href="/#cervezas" class="text-zinc-300 hover:text-amber-400 transition-colors px-3 py-2 text-sm font-medium tracking-wide">Catálogo</a>
                    <a href="/eventos" class="text-zinc-300 hover:text-amber-400 transition-colors px-3 py-2 text-sm font-medium tracking-wide">Eventos</a>
                    <a href="/galeria" class="text-zinc-300 hover:text-amber-400 transition-colors px-3 py-2 text-sm font-medium tracking-wide">Galería</a>
                    <a href="/maridajes" class="text-zinc-300 hover:text-amber-400 transition-colors px-3 py-2 text-sm font-medium tracking-wide">Maridajes</a>
                </nav>

                <div class="hidden md:flex">
                    <a href="#contacto" class="bg-amber-600 hover:bg-amber-500 text-white px-5 py-2 rounded-full font-medium transition-all shadow-[0_0_15px_rgba(217,119,6,0.5)] hover:shadow-[0_0_25px_rgba(217,119,6,0.8)]">
                        Contáctanos
                    </a>
                </div>
                
                <!-- Mobile menu button -->
                <div class="md:hidden flex items-center">
                    <button type="button" class="text-zinc-300 hover:text-white p-2" aria-controls="mobile-menu" aria-expanded="false">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-grow pt-20">
        {{ $slot }}
    </main>

    <!-- Footer -->
    <footer class="bg-zinc-950 border-t border-zinc-900 pt-16 pb-8 mt-auto relative overflow-hidden">
        <!-- Decoración de fondo footer -->
        <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_bottom,_var(--tw-gradient-stops))] from-amber-900/20 via-zinc-950 to-zinc-950 pointer-events-none"></div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12 text-center md:text-left">
                
                <div>
                    <h3 class="text-2xl font-serif font-bold text-white mb-4">Cervecería <span class="text-amber-500">El Torogoz</span></h3>
                    <p class="text-zinc-400 text-sm leading-relaxed mb-6">
                        Orgullosamente elaborada en Chalchuapa, El Salvador. Combinamos la tradición artesanal con la pasión por crear sabores únicos e inolvidables.
                    </p>
                    <div class="flex justify-center md:justify-start space-x-4">
                        <a href="https://www.instagram.com/cervezaeltorogoz/" target="_blank" class="text-zinc-400 hover:text-amber-500 transition-colors">
                            <span class="sr-only">Instagram</span>
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>
                </div>

                <div>
                    <h4 class="text-white font-semibold mb-4 tracking-wide uppercase text-sm">Enlaces Rápidos</h4>
                    <ul class="space-y-2">
                        <li><a href="/" class="text-zinc-400 hover:text-amber-500 transition-colors text-sm">Inicio</a></li>
                        <li><a href="/#cervezas" class="text-zinc-400 hover:text-amber-500 transition-colors text-sm">Nuestras Cervezas</a></li>
                        <li><a href="/nosotros" class="text-zinc-400 hover:text-amber-500 transition-colors text-sm">Sobre Nosotros</a></li>
                        <li><a href="/eventos" class="text-zinc-400 hover:text-amber-500 transition-colors text-sm">Eventos</a></li>
                        <li><a href="/galeria" class="text-zinc-400 hover:text-amber-500 transition-colors text-sm">Galería</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-white font-semibold mb-4 tracking-wide uppercase text-sm">Contacto</h4>
                    <ul class="space-y-2 text-zinc-400 text-sm">
                        <li class="flex items-start justify-center md:justify-start gap-2">
                            <svg class="h-5 w-5 text-amber-500 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <span>Chalchuapa, El Salvador</span>
                        </li>
                    </ul>
                </div>
            </div>
            
            <div class="border-t border-zinc-800 mt-12 pt-8 flex flex-col md:flex-row justify-between items-center text-xs text-zinc-500">
                <p>&copy; {{ date('Y') }} Cerveza El Torogoz. Todos los derechos reservados.</p>
                <p class="mt-2 md:mt-0">Bebe con responsabilidad.</p>
            </div>
        </div>
    </footer>

    <dialog id="site-image-modal" class="max-w-[min(96vw,56rem)] w-full rounded-2xl bg-zinc-900 text-zinc-100 border border-zinc-800 shadow-2xl p-0 overflow-hidden backdrop:bg-black/75">
        <div class="relative flex max-h-[90vh] flex-col">
            <form method="dialog" class="absolute right-3 top-3 z-10">
                <button type="submit" class="rounded-full bg-zinc-800 px-3 py-1.5 text-sm font-semibold text-zinc-200 hover:bg-zinc-700 focus:outline-none focus-visible:ring-2 focus-visible:ring-amber-500" aria-label="Cerrar">Cerrar</button>
            </form>
            <div class="flex min-h-0 flex-1 flex-col items-center justify-center gap-4 p-6 pt-14">
                <img id="site-image-modal-img" src="" alt="" class="max-h-[min(70vh,720px)] w-auto max-w-full rounded-xl object-contain shadow-lg">
                <p id="site-image-modal-caption" class="hidden max-w-full whitespace-pre-wrap text-center text-sm leading-relaxed text-zinc-400"></p>
            </div>
        </div>
    </dialog>

    <script>
    document.addEventListener('click', function (e) {
        var trigger = e.target.closest('.js-site-image-modal');
        if (!trigger) return;
        e.preventDefault();
        var src = trigger.getAttribute('data-image-url');
        if (!src) return;
        var dialog = document.getElementById('site-image-modal');
        var img = document.getElementById('site-image-modal-img');
        var cap = document.getElementById('site-image-modal-caption');
        if (!dialog || !img || !cap) return;
        img.src = src;
        img.alt = trigger.getAttribute('data-alt') || '';
        var text = trigger.getAttribute('data-caption') || '';
        if (text.trim()) {
            cap.textContent = text;
            cap.classList.remove('hidden');
        } else {
            cap.textContent = '';
            cap.classList.add('hidden');
        }
        dialog.showModal();
    });
    document.getElementById('site-image-modal')?.addEventListener('click', function (e) {
        if (e.target === this) this.close();
    });
    </script>
    @stack('scripts')
    @livewireScripts
</body>
</html>
