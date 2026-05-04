<?php

use Livewire\Volt\Component;

new class extends \Livewire\Component {
    public $businessName = '';
    public $contactName = '';
    public $email = '';
    public $phone = '';
    public $estimatedVolume = '';
    public $message = '';
    
    public $isSubmitted = false;

    public function submit()
    {
        $this->validate([
            'businessName' => 'required|min:3',
            'contactName' => 'required|min:3',
            'email' => 'required|email',
            'phone' => 'required|min:8',
            'estimatedVolume' => 'required',
            'message' => 'nullable|max:500'
        ]);

        // Aquí se podría guardar en base de datos o enviar email.
        // Por ahora simulamos el éxito.
        
        $this->isSubmitted = true;
        
        // Limpiamos los campos
        $this->reset(['businessName', 'contactName', 'email', 'phone', 'estimatedVolume', 'message']);
    }
}; ?>

<div class="bg-zinc-900 border border-zinc-800 rounded-3xl p-8 shadow-2xl relative overflow-hidden">
    <!-- Decorative elements -->
    <div class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 bg-amber-500/10 rounded-full blur-xl"></div>
    <div class="absolute bottom-0 left-0 -mb-4 -ml-4 w-32 h-32 bg-amber-700/10 rounded-full blur-xl"></div>

    <div class="relative z-10">
        @if($isSubmitted)
            <div class="text-center py-12">
                <div class="w-20 h-20 bg-green-500/20 text-green-400 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                </div>
                <h3 class="text-2xl font-bold font-serif text-white mb-2">¡Solicitud Enviada!</h3>
                <p class="text-zinc-400">Gracias por tu interés en distribuir Cerveza El Torogoz. Nos pondremos en contacto contigo muy pronto.</p>
                <button wire:click="$set('isSubmitted', false)" class="mt-8 text-amber-500 hover:text-amber-400 font-medium transition-colors">Enviar otra solicitud</button>
            </div>
        @else
            <form wire:submit="submit" class="space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-zinc-400 mb-2">Nombre del Negocio *</label>
                        <input type="text" wire:model="businessName" class="w-full bg-zinc-950 border border-zinc-800 rounded-xl px-4 py-3 text-white focus:outline-none focus:ring-2 focus:ring-amber-500/50 focus:border-amber-500 transition-all placeholder-zinc-700" placeholder="Ej. Restaurante La Ola">
                        @error('businessName') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-zinc-400 mb-2">Nombre de Contacto *</label>
                        <input type="text" wire:model="contactName" class="w-full bg-zinc-950 border border-zinc-800 rounded-xl px-4 py-3 text-white focus:outline-none focus:ring-2 focus:ring-amber-500/50 focus:border-amber-500 transition-all placeholder-zinc-700" placeholder="Tu nombre completo">
                        @error('contactName') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-zinc-400 mb-2">Correo Electrónico *</label>
                        <input type="email" wire:model="email" class="w-full bg-zinc-950 border border-zinc-800 rounded-xl px-4 py-3 text-white focus:outline-none focus:ring-2 focus:ring-amber-500/50 focus:border-amber-500 transition-all placeholder-zinc-700" placeholder="correo@empresa.com">
                        @error('email') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-zinc-400 mb-2">Teléfono *</label>
                        <input type="tel" wire:model="phone" class="w-full bg-zinc-950 border border-zinc-800 rounded-xl px-4 py-3 text-white focus:outline-none focus:ring-2 focus:ring-amber-500/50 focus:border-amber-500 transition-all placeholder-zinc-700" placeholder="+503 0000-0000">
                        @error('phone') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-zinc-400 mb-2">Volumen Estimado Mensual *</label>
                    <select wire:model="estimatedVolume" class="w-full bg-zinc-950 border border-zinc-800 rounded-xl px-4 py-3 text-white focus:outline-none focus:ring-2 focus:ring-amber-500/50 focus:border-amber-500 transition-all appearance-none">
                        <option value="">Selecciona una opción</option>
                        <option value="1-5">1 a 5 cajas</option>
                        <option value="6-15">6 a 15 cajas</option>
                        <option value="16-50">16 a 50 cajas</option>
                        <option value="50+">Más de 50 cajas</option>
                    </select>
                    @error('estimatedVolume') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-zinc-400 mb-2">Mensaje Adicional</label>
                    <textarea wire:model="message" rows="4" class="w-full bg-zinc-950 border border-zinc-800 rounded-xl px-4 py-3 text-white focus:outline-none focus:ring-2 focus:ring-amber-500/50 focus:border-amber-500 transition-all placeholder-zinc-700" placeholder="Cuéntanos más sobre tu negocio o interés en nuestra cerveza..."></textarea>
                    @error('message') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                </div>

                <button type="submit" class="w-full bg-amber-600 hover:bg-amber-500 text-white font-bold py-4 rounded-xl transition-all shadow-[0_0_15px_rgba(217,119,6,0.3)] hover:shadow-[0_0_25px_rgba(217,119,6,0.6)] flex justify-center items-center gap-2">
                    <span wire:loading.remove>Enviar Solicitud</span>
                    <span wire:loading>Enviando...</span>
                    <svg wire:loading.remove class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </button>
            </form>
        @endif
    </div>
</div>