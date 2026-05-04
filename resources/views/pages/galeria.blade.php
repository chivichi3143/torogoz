<x-layouts.app>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
        
        <div class="text-center mb-12">
            <span class="inline-block py-1 px-3 rounded-full bg-amber-500/10 text-amber-500 text-sm font-semibold tracking-wider mb-4 uppercase">Comunidad</span>
            <h1 class="text-5xl font-bold font-serif text-white mb-6">Galería Torogoz</h1>
            <p class="text-zinc-400 text-lg max-w-2xl mx-auto mb-10">Explora nuestra colección de momentos, cervezas y eventos. Las fotos aprobadas de la comunidad aparecen junto a nuestras imágenes editoriales.</p>
            
            <div class="flex flex-wrap justify-center gap-2 md:gap-4 mb-12" id="gallery-filters" role="tablist" aria-label="Filtrar galería">
                <button type="button" data-gallery-filter="all" class="gallery-filter-btn px-6 py-2 rounded-full bg-amber-500 text-white font-bold text-sm shadow-lg shadow-amber-500/30 transition-all">Todas</button>
                <button type="button" data-gallery-filter="{{ \App\Models\GalleryItem::CATEGORY_CERVEZAS }}" class="gallery-filter-btn px-6 py-2 rounded-full bg-zinc-900 text-zinc-400 hover:text-white font-semibold text-sm hover:bg-zinc-800 transition-all">Cervezas</button>
                <button type="button" data-gallery-filter="{{ \App\Models\GalleryItem::CATEGORY_EVENTOS }}" class="gallery-filter-btn px-6 py-2 rounded-full bg-zinc-900 text-zinc-400 hover:text-white font-semibold text-sm hover:bg-zinc-800 transition-all">Eventos</button>
                <button type="button" data-gallery-filter="{{ \App\Models\GalleryItem::CATEGORY_CULTURA }}" class="gallery-filter-btn px-6 py-2 rounded-full bg-zinc-900 text-zinc-400 hover:text-white font-semibold text-sm hover:bg-zinc-800 transition-all">Cultura</button>
            </div>
        </div>

        @if($tiles->isEmpty())
            <div class="text-center py-20 border border-zinc-800 rounded-2xl bg-zinc-900/40">
                <p class="text-zinc-400">Pronto añadiremos más momentos a la galería.</p>
            </div>
        @else
            <div class="gallery-grid" id="gallery-grid">
                @foreach($tiles as $tile)
                    @php
                        $caption = trim((string) ($tile['description'] ?? ''));
                        $title = $tile['title'] ?? '';
                    @endphp
                    <div class="gallery-item relative group rounded-2xl overflow-hidden bg-zinc-900 ring-1 ring-zinc-800" data-category="{{ $tile['category'] }}" data-gallery-key="{{ $tile['key'] }}">
                        <button type="button" class="js-site-image-modal block w-full h-full min-h-[140px] p-0 border-0 bg-transparent cursor-zoom-in text-left focus:outline-none focus-visible:ring-2 focus-visible:ring-amber-500 rounded-2xl" data-image-url="{{ $tile['image_url'] }}" data-caption="{{ e(trim($title.($caption !== '' ? ' — '.$caption : ''))) }}">
                            <img src="{{ $tile['image_url'] }}" alt="{{ $title }}" class="w-full h-full object-cover min-h-[140px] group-hover:scale-105 transition-transform duration-500 bg-zinc-800">
                        </button>
                        @if($caption !== '' || $title !== '')
                            <div class="pointer-events-none absolute bottom-0 left-0 right-0 bg-zinc-950/95 backdrop-blur-md p-4 translate-y-full group-hover:translate-y-0 transition-transform duration-300 max-md:translate-y-0">
                                <h3 class="text-amber-500 font-bold mb-1">{{ $title }}</h3>
                                @if($caption !== '')
                                    <p class="text-zinc-400 text-sm line-clamp-3">{{ $caption }}</p>
                                @endif
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    @push('scripts')
    <script>
    (function () {
        var root = document.getElementById('gallery-filters');
        var grid = document.getElementById('gallery-grid');
        if (!root || !grid) return;

        function setActive(filter) {
            root.querySelectorAll('.gallery-filter-btn').forEach(function (btn) {
                var isAll = btn.getAttribute('data-gallery-filter') === 'all';
                var match = btn.getAttribute('data-gallery-filter') === filter;
                var active = filter === 'all' ? isAll : match;
                btn.classList.toggle('bg-amber-500', active);
                btn.classList.toggle('text-white', active);
                btn.classList.toggle('font-bold', active);
                btn.classList.toggle('shadow-lg', active);
                btn.classList.toggle('shadow-amber-500/30', active);
                btn.classList.toggle('bg-zinc-900', !active);
                btn.classList.toggle('text-zinc-400', !active);
                btn.classList.toggle('font-semibold', !active);
            });
        }

        function applyFilter(filter) {
            grid.querySelectorAll('.gallery-item').forEach(function (el) {
                var cat = el.getAttribute('data-category') || '';
                var show = filter === 'all' || cat === filter;
                el.classList.toggle('hidden', !show);
            });
            setActive(filter);
        }

        root.addEventListener('click', function (e) {
            var btn = e.target.closest('[data-gallery-filter]');
            if (!btn) return;
            applyFilter(btn.getAttribute('data-gallery-filter') || 'all');
        });
    })();
    </script>
    @endpush
</x-layouts.app>
