<div class="bg-zinc-900 border border-zinc-800 rounded-3xl p-8 shadow-2xl relative overflow-hidden mt-12">
    <!-- Decorative elements -->
    <div class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 bg-amber-500/10 rounded-full blur-xl"></div>
    
    <div class="relative z-10">
        <h3 class="text-2xl font-bold font-serif text-white mb-6">Sube tu fotografía y reseña del evento</h3>
        
        @if($isSubmitted)
            <div class="text-center py-8">
                <div class="w-16 h-16 bg-green-500/20 text-green-400 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                </div>
                <h4 class="text-xl font-bold text-white mb-2">¡Gracias por compartir!</h4>
                <p class="text-zinc-400">Tu reseña y fotografía han sido enviadas. Aparecerán en la galería una vez que sean aprobadas por nuestro equipo.</p>
                <button wire:click="$set('isSubmitted', false)" type="button" class="mt-6 text-amber-500 hover:text-amber-400 font-medium transition-colors">Enviar otra reseña</button>
            </div>
        @else
            <form wire:submit="submit" class="space-y-6">
                <div>
                    <label class="block text-sm font-medium text-zinc-400 mb-2">Tu nombre *</label>
                    <input type="text" wire:model="author_name" class="w-full bg-zinc-950 border border-zinc-800 rounded-xl px-4 py-3 text-white focus:outline-none focus:ring-2 focus:ring-amber-500/50 focus:border-amber-500 transition-all" placeholder="Ej. Kevin García">
                    @error('author_name') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-zinc-400 mb-2">Correo electrónico *</label>
                    <input type="email" wire:model="email" class="w-full bg-zinc-950 border border-zinc-800 rounded-xl px-4 py-3 text-white focus:outline-none focus:ring-2 focus:ring-amber-500/50 focus:border-amber-500 transition-all" placeholder="tu@correo.com">
                    @error('email') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-zinc-400 mb-2">¿Qué te pareció el evento? *</label>
                    <textarea wire:model="comment" rows="3" class="w-full bg-zinc-950 border border-zinc-800 rounded-xl px-4 py-3 text-white focus:outline-none focus:ring-2 focus:ring-amber-500/50 focus:border-amber-500 transition-all" placeholder="Increíble ambiente y la mejor cerveza..."></textarea>
                    @error('comment') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-zinc-400 mb-2">Sube una fotografía (opcional)</label>
                    <input type="file" wire:model="photo" accept="image/*" class="w-full bg-zinc-950 border border-zinc-800 rounded-xl px-4 py-3 text-white focus:outline-none focus:ring-2 focus:ring-amber-500/50 focus:border-amber-500 transition-all file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-amber-500/10 file:text-amber-500 hover:file:bg-amber-500/20">
                    
                    @if ($photo)
                        <div class="mt-4">
                            <p class="text-xs text-zinc-500 mb-2">Vista previa:</p>
                            <img src="{{ $photo->temporaryUrl() }}" class="h-32 object-contain rounded-lg border border-zinc-700" alt="">
                        </div>
                    @endif
                    @error('photo') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                </div>

                <div class="flex items-start gap-3">
                    <input type="checkbox" wire:model="accepted_terms" id="accepted_terms_{{ $event_id }}" class="mt-1 rounded border-zinc-600 bg-zinc-950 text-amber-600 focus:ring-amber-500/50">
                    <label for="accepted_terms_{{ $event_id }}" class="text-sm text-zinc-400 leading-relaxed">
                        Acepto los
                        <a href="{{ url('/terminos-fotos') }}" target="_blank" rel="noopener noreferrer" class="text-amber-500 hover:text-amber-400 underline font-medium">términos y condiciones</a>
                        del envío de fotografías y reseñas.
                    </label>
                </div>
                @error('accepted_terms') <span class="text-red-500 text-xs block -mt-2">{{ $message }}</span> @enderror

                <button type="submit" class="w-full bg-amber-600 hover:bg-amber-500 text-white font-bold py-3 rounded-xl transition-all flex justify-center items-center gap-2">
                    <span wire:loading.remove>Enviar reseña</span>
                    <span wire:loading>Subiendo...</span>
                </button>
            </form>
        @endif
    </div>
</div>
