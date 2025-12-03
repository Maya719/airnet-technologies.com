<!-- ======= Portfolio Section ======= -->
<section id="portfolio" class="py-20 bg-gray-50">
    <div class="container mx-auto px-6">
        <div class="text-center mb-16">
            <span class="text-secondary font-semibold uppercase tracking-wider text-sm">Offering</span>
            <h2 class="text-3xl md:text-4xl font-bold text-primary mt-2">Services</h2>
            <p class="text-gray-600 mt-4">Check our latest products</p>
        </div>

        <!-- Custom Tabs -->
        <div class="flex flex-wrap justify-center gap-4 mb-12" role="tablist">
            @foreach ($categories as $key => $category)
                <button onclick="switchTab('{{ $category->name }}-tab-pane', this)"
                    class="px-6 py-2 rounded-full font-medium transition-all duration-300 {{ $key === 0 ? 'bg-primary text-white shadow-lg' : 'bg-white text-gray-600 hover:bg-gray-100' }}"
                    role="tab" aria-selected="{{ $key === 0 ? 'true' : 'false' }}">
                    {{ $category->name }}
                </button>
            @endforeach
        </div>

        <div class="tab-content relative min-h-[400px]">
            @foreach ($categories as $key => $category)
                <div id="{{ $category->name }}-tab-pane"
                    class="tab-pane transition-opacity duration-500 {{ $key === 0 ? 'block opacity-100' : 'hidden opacity-0 absolute top-0 w-full' }}"
                    role="tabpanel">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        @foreach ($category->services as $service)
                            <div
                                class="group bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 hover:-translate-y-1 border border-gray-100">
                                <div class="relative overflow-hidden aspect-video">
                                    <img src="{{ asset('storage/' . $service->thumbnail) }}" loading="lazy"
                                        alt="{{ $service->name }}"
                                        class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500">
                                    <div
                                        class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-6">
                                        <span class="text-white font-semibold">View Details</span>
                                    </div>
                                </div>
                                <div class="p-6">
                                    <a href="{{ route('service_detail', ['id' => $service['id']]) }}" class="block">
                                        <h5
                                            class="text-xl font-bold text-gray-800 mb-2 group-hover:text-primary transition-colors">
                                            {{ $service->name }}
                                        </h5>
                                    </a>
                                    <a href="{{ route('service_detail', ['id' => $service->id]) }}" class="block">
                                        <p class="text-gray-600 line-clamp-2 text-sm">
                                            ${{ number_format($service->price, 2) }}
                                        </p>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>

        <div class="text-center mt-16">
            <a href="{{ route('view_more_projects') }}"
                class="inline-flex items-center justify-center px-8 py-3 border border-primary text-primary font-semibold rounded-full hover:bg-primary hover:text-white transition-all duration-300 group">
                <span>View More</span>
                <i class="bi bi-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
            </a>
        </div>
    </div>
</section>

<script>
    function switchTab(targetId, btn) {
        // Hide all tabs
        document.querySelectorAll('.tab-pane').forEach(el => {
            el.classList.add('hidden', 'opacity-0', 'absolute');
            el.classList.remove('block', 'opacity-100');
        });

        // Show target tab
        const target = document.getElementById(targetId);
        target.classList.remove('hidden', 'absolute');
        // Small delay to allow display:block to apply before opacity transition
        setTimeout(() => {
            target.classList.remove('opacity-0');
            target.classList.add('opacity-100');
        }, 10);

        // Update buttons
        const container = btn.parentElement;
        container.querySelectorAll('button').forEach(b => {
            b.classList.remove('bg-primary', 'text-white', 'shadow-lg');
            b.classList.add('bg-white', 'text-gray-600', 'hover:bg-gray-100');
            b.setAttribute('aria-selected', 'false');
        });

        btn.classList.remove('bg-white', 'text-gray-600', 'hover:bg-gray-100');
        btn.classList.add('bg-primary', 'text-white', 'shadow-lg');
        btn.setAttribute('aria-selected', 'true');
    }
</script>