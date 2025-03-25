@props(['name', 'show' => false, 'maxWidth' => '2xl'])

@php
    $maxWidth = [
        'sm' => 'sm:max-w-sm',
        'md' => 'sm:max-w-md',
        'lg' => 'sm:max-w-lg',
        'xl' => 'sm:max-w-xl',
        '2xl' => 'sm:max-w-2xl',
    ][$maxWidth];
@endphp

<div 
    x-data="{ 
        show: @js($show), 
        openModal(name) {
            if (name === '{{ $name }}') {
                this.show = true;
                document.body.classList.add('overflow-y-hidden');
            }
        },
        closeModal(name) {
            if (name === '{{ $name }}') {
                this.show = false;
                document.body.classList.remove('overflow-y-hidden');
            }
        }
    }"
    x-init="
        $watch('show', (value) => {
            if (value) {
                $nextTick(() => {
                    $el.querySelector('[x-ref=\'modal-content\']')?.focus();
                });
            }
        });
        
        Livewire.on('open-modal', (name) => openModal(name));
        Livewire.on('close-modal', (name) => closeModal(name));
    "
    x-on:keydown.escape.window="show = false"
>
    <div 
        x-show="show" 
        class="fixed inset-0 z-50 overflow-y-auto px-4 py-6 sm:px-0"
        x-cloak
    >
        {{-- Overlay --}}
        <div 
            x-show="show" 
            class="fixed inset-0 bg-gray-500/75 dark:bg-gray-900/75"
            x-on:click="show = false"
            x-transition.opacity
        ></div>

        {{-- Modal Container --}}
        <div 
            x-show="show"
            x-ref="modal-content"
            tabindex="0"
            class="relative bg-white dark:bg-gray-800 rounded-lg shadow-xl {{ $maxWidth }} mx-auto"
            x-transition:enter="ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        >
            {{ $slot }}
        </div>
    </div>
</div>