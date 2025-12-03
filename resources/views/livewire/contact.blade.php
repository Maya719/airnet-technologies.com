<div>
    @if (session()->has('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if (session()->has('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif
    <form wire:submit.prevent="submit" class="space-y-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="group">
                <label class="block text-sm font-medium text-gray-700 mb-2">Your Name</label>
                <input type="text" wire:model="name"
                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-primary focus:ring-2 outline-none @error('name') border-red-500 @enderror">
                @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div class="group">
                <label class="block text-sm font-medium text-gray-700 mb-2">Your Email</label>
                <input type="email" wire:model="email"
                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-primary focus:ring-2 outline-none @error('email') border-red-500 @enderror">
                @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="group">
            <label class="block text-sm font-medium text-gray-700 mb-2">Subject</label>
            <input type="text" wire:model="subject"
                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-primary focus:ring-2 outline-none @error('subject') border-red-500 @enderror">
            @error('subject') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="group">
            <label class="block text-sm font-medium text-gray-700 mb-2">Message</label>
            <textarea wire:model="message" rows="5"
                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-primary focus:ring-2 outline-none resize-none @error('message') border-red-500 @enderror"></textarea>
            @error('message') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- reCAPTCHA v2 -->
        <div class="group">
            <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.site_key') }}"
                data-callback="onRecaptchaSuccess"></div>
            @error('recaptcha') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <button type="submit" wire:loading.attr="disabled"
            class="w-full lg:w-auto inline-flex items-center justify-center px-8 py-3 bg-primary text-white font-bold rounded-lg disabled:opacity-50">
            Send Message
        </button>
    </form>

    @push('scripts')
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
        <script>
            function onRecaptchaSuccess(token) {
                @this.set('recaptcha', token);
            }

            // Reset reCAPTCHA when form is submitted
            document.addEventListener('livewire:init', () => {
                Livewire.on('reset-recaptcha', () => {
                    if (typeof grecaptcha !== 'undefined') {
                        grecaptcha.reset();
                    }
                });
            });
        </script>
    @endpush
</div>