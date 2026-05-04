@props([
    'event',
    'variant' => 'full',
])

@php
    use Illuminate\Support\Str;
    $shareUrl = $event->publicUrl();
    $shareTitle = $event->title;
    $shareText = $event->shareDescriptionExcerpt($variant === 'compact' ? 140 : 240);
    $eUrl = rawurlencode($shareUrl);
    $waBody = rawurlencode($shareTitle."\n\n".$shareText."\n\n".$shareUrl);
    $twBody = rawurlencode(Str::limit($shareTitle.' — '.$shareText, 220));
    $tgText = rawurlencode($shareTitle);
    $fbHref = 'https://www.facebook.com/sharer/sharer.php?u='.$eUrl;
    $xHref = 'https://twitter.com/intent/tweet?text='.$twBody.'&url='.$eUrl;
    $waHref = 'https://api.whatsapp.com/send?text='.$waBody;
    $liHref = 'https://www.linkedin.com/sharing/share-offsite/?url='.$eUrl;
    $tgHref = 'https://t.me/share/url?url='.$eUrl.'&text='.$tgText;
    $isCompact = $variant === 'compact';
    $btnBase = $isCompact
        ? 'inline-flex h-10 w-10 shrink-0 items-center justify-center rounded-xl border border-zinc-600/90 bg-zinc-900 text-zinc-300 shadow-sm transition hover:border-amber-500/60 hover:bg-zinc-800 hover:text-amber-400 focus:outline-none focus-visible:ring-2 focus-visible:ring-amber-500'
        : 'inline-flex h-11 w-11 shrink-0 items-center justify-center rounded-xl border border-zinc-600/90 bg-zinc-900 text-zinc-300 shadow-sm transition hover:border-amber-500/60 hover:bg-zinc-800 hover:text-amber-400 focus:outline-none focus-visible:ring-2 focus-visible:ring-amber-500';
@endphp

<div {{ $attributes->class($isCompact ? 'inline-flex flex-wrap items-center gap-3 sm:gap-4' : 'rounded-2xl border border-zinc-800/80 bg-zinc-900/60 p-5 sm:p-6') }}>
    @unless($isCompact)
        <p class="mb-3 text-xs font-semibold uppercase tracking-wider text-amber-500/90">Compartir este evento</p>
        <p class="mb-5 text-sm leading-relaxed text-zinc-400 line-clamp-2">{{ $shareText }}</p>
    @endunless

    <div class="{{ $isCompact ? '' : 'flex w-full flex-col gap-4 sm:flex-row sm:flex-wrap sm:items-center sm:justify-between' }}">
        <div class="{{ $isCompact ? 'inline-flex flex-wrap items-center gap-3 sm:gap-4' : 'flex flex-wrap items-center gap-3 sm:gap-4' }}">
            <a href="{{ $fbHref }}" target="_blank" rel="noopener noreferrer" class="{{ $btnBase }}" title="Compartir en Facebook" aria-label="Compartir en Facebook">
                <svg class="{{ $isCompact ? 'h-4 w-4' : 'h-5 w-5' }}" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M9 8H4v4h5v12h5V12h3.642L18 8h-4V6.333C14 5.378 14.192 5 15.115 5H18V0h-3.808C10.596 0 9 1.583 9 4.615V8z"/></svg>
            </a>
            <a href="{{ $xHref }}" target="_blank" rel="noopener noreferrer" class="{{ $btnBase }}" title="Compartir en X" aria-label="Compartir en X">
                <svg class="{{ $isCompact ? 'h-4 w-4' : 'h-5 w-5' }}" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
            </a>
            <a href="{{ $waHref }}" target="_blank" rel="noopener noreferrer" class="{{ $btnBase }}" title="Compartir por WhatsApp" aria-label="Compartir por WhatsApp">
                <svg class="{{ $isCompact ? 'h-4 w-4' : 'h-5 w-5' }}" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.435 9.884-9.881 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
            </a>
            <a href="{{ $liHref }}" target="_blank" rel="noopener noreferrer" class="{{ $btnBase }}" title="Compartir en LinkedIn" aria-label="Compartir en LinkedIn">
                <svg class="{{ $isCompact ? 'h-4 w-4' : 'h-5 w-5' }}" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
            </a>
            <a href="{{ $tgHref }}" target="_blank" rel="noopener noreferrer" class="{{ $btnBase }}" title="Compartir en Telegram" aria-label="Compartir en Telegram">
                <svg class="{{ $isCompact ? 'h-4 w-4' : 'h-5 w-5' }}" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M11.944 0A12 12 0 0 0 0 12a12 12 0 0 0 12 12 12 12 0 0 0 12-12A12 12 0 0 0 12 0a12 12 0 0 0-.056 0zm4.962 7.224c.1-.002.321.023.465.14a.506.506 0 0 1 .171.325c.016.093.036.306.02.472-.18 1.898-.962 6.502-1.36 8.627-.168.9-.499 1.201-.82 1.23-.696.065-1.225-.46-1.9-.902-1.056-.693-1.653-1.124-2.678-1.8-1.185-.78-.417-1.21.258-1.91.177-.184 3.247-2.977 3.307-3.23.007-.032.014-.15-.056-.212s-.174-.041-.249-.024c-.106.024-1.793 1.14-5.061 3.345-.48.33-.913.49-1.302.48-.428-.008-1.252-.241-1.865-.44-.752-.245-1.349-.374-1.297-.789.027-.216.325-.437.893-.663 3.498-1.524 5.83-2.529 6.998-3.014 3.332-1.386 4.025-1.627 4.476-1.635z"/></svg>
            </a>
            <button type="button" class="{{ $btnBase }} js-copy-event-link" data-share-url="{{ e($shareUrl) }}" title="Copiar enlace" aria-label="Copiar enlace del evento">
                <svg class="{{ $isCompact ? 'h-4 w-4' : 'h-5 w-5' }}" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
            </button>
        </div>
        @unless($isCompact)
            <button type="button" class="js-native-share hidden w-full items-center justify-center gap-2 rounded-xl border border-amber-600/40 bg-amber-600/10 px-4 py-2.5 text-sm font-semibold text-amber-400 transition hover:bg-amber-600/20 focus:outline-none focus-visible:ring-2 focus-visible:ring-amber-500 sm:inline-flex sm:w-auto sm:justify-center" data-share-title="{{ e($shareTitle) }}" data-share-text="{{ e($shareText) }}" data-share-url="{{ e($shareUrl) }}">
                <svg class="h-4 w-4 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"/></svg>
                Compartir…
            </button>
        @endunless
    </div>
</div>

@once
    @push('scripts')
    <script>
    (function () {
        document.addEventListener('click', function (e) {
            var copyBtn = e.target.closest('.js-copy-event-link');
            if (copyBtn) {
                e.preventDefault();
                var url = copyBtn.getAttribute('data-share-url');
                if (!url || !navigator.clipboard) return;
                navigator.clipboard.writeText(url).then(function () {
                    copyBtn.classList.add('ring-2', 'ring-amber-500', 'text-amber-400');
                    setTimeout(function () { copyBtn.classList.remove('ring-2', 'ring-amber-500', 'text-amber-400'); }, 1200);
                });
                return;
            }
            var nativeBtn = e.target.closest('.js-native-share');
            if (nativeBtn && navigator.share) {
                e.preventDefault();
                navigator.share({
                    title: nativeBtn.getAttribute('data-share-title') || '',
                    text: nativeBtn.getAttribute('data-share-text') || '',
                    url: nativeBtn.getAttribute('data-share-url') || window.location.href
                }).catch(function () {});
            }
        });
        document.addEventListener('DOMContentLoaded', function () {
            if (!navigator.share) return;
            document.querySelectorAll('.js-native-share').forEach(function (el) {
                el.classList.remove('hidden');
                el.classList.add('inline-flex');
            });
        });
    })();
    </script>
    @endpush
@endonce
