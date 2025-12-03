<div>
    <form x-data x-on:submit.prevent="
        grecaptcha.ready(() => {
            grecaptcha.execute('{{ config('services.recaptcha.site_key') }}', {action: 'submit'})
                .then(token => {
                    @this.set('gRecaptchaResponse', token);
                    @this.call('submit');
                });
        })
    " class="space-y-6">
        @csrf
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

        <input type="hidden" id="g-recaptcha-response" wire:model="gRecaptchaResponse">

        @if (session()->has('success'))
            <div class="mb-4 p-4 text-sm text-green-700 bg-green-100 rounded-lg">{{ session('success') }}</div>
        @endif

        @if (session()->has('error'))
            <div class="mb-4 p-4 text-sm text-red-700 bg-red-100 rounded-lg">{{ session('error') }}</div>
        @endif

        <button type="submit" wire:loading.attr="disabled"
            class="w-full lg:w-auto inline-flex items-center justify-center px-8 py-3 bg-primary text-white font-bold rounded-lg disabled:opacity-50">
            <span wire:loading.remove>Send Message</span>
            <span wire:loading>Sending...</span>
        </button>
    </form>

    <script src="https://www.google.com/recaptcha/api.js?render={{ config('services.recaptcha.site_key') }}"></script>
</div>