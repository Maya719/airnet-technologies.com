{{-- Rating Section --}}
<section id="rating" class="relative py-20 overflow-hidden bg-slate-50">

    {{-- Top border accent --}}
    <div class="absolute top-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-[#008080]/30 to-transparent"></div>
    <div class="absolute bottom-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-[#008080]/30 to-transparent"></div>

    {{-- Subtle background blobs --}}
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] rounded-full blur-3xl opacity-[0.04]"
            style="background: radial-gradient(circle, #008080, #20b2aa);"></div>
    </div>

    <div class="container mx-auto px-6 relative z-10">
        <div class="flex flex-col items-center text-center">

            {{-- Label --}}
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-[#008080]/10 border border-[#008080]/20 text-[#006666] text-sm mb-8">
                <i class="bi bi-google" style="color: #008080;"></i>
                <span>Google Rating</span>
            </div>

            {{-- Big score --}}
            <div class="flex items-end justify-center gap-4 mb-5">
                <span class="text-8xl md:text-9xl font-black text-gray-900 leading-none tracking-tight"
                    style="-webkit-text-stroke: 2px transparent; background: linear-gradient(135deg, #006666, #20b2aa); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">
                    4.7
                </span>
                <div class="flex flex-col items-start pb-3">
                    <span class="text-xl font-semibold text-gray-400">/ 5</span>
                    <span class="text-xs text-gray-400 mt-1">Overall Rating</span>
                </div>
            </div>

            {{-- Stars row --}}
            <div class="flex items-center justify-center gap-1 mb-4">
                {{-- 4 full stars --}}
                <i class="bi bi-star-fill text-4xl text-yellow-400"></i>
                <i class="bi bi-star-fill text-4xl text-yellow-400"></i>
                <i class="bi bi-star-fill text-4xl text-yellow-400"></i>
                <i class="bi bi-star-fill text-4xl text-yellow-400"></i>
                {{-- 0.7 — half star --}}
                <i class="bi bi-star-half text-4xl text-yellow-400"></i>
            </div>

            {{-- Review count --}}
            <p class="text-gray-500 text-sm mb-12">
                Based on verified customer reviews on
                <span class="font-semibold text-gray-700">Google</span>
            </p>

            {{-- Rating breakdown bars --}}
            <div class="w-full max-w-sm space-y-2.5 mb-12">

                @php
                    $bars = [
                        ['label' => '5 ★', 'pct' => 68, 'count' => '68%'],
                        ['label' => '4 ★', 'pct' => 22, 'count' => '22%'],
                        ['label' => '3 ★', 'pct' => 7,  'count' => '7%'],
                        ['label' => '2 ★', 'pct' => 2,  'count' => '2%'],
                        ['label' => '1 ★', 'pct' => 1,  'count' => '1%'],
                    ];
                @endphp

                @foreach($bars as $bar)
                <div class="flex items-center gap-3">
                    <span class="text-xs text-gray-500 w-8 shrink-0 text-right">{{ $bar['label'] }}</span>
                    <div class="flex-1 h-2 rounded-full bg-gray-200 overflow-hidden">
                        <div class="h-full rounded-full transition-all duration-700"
                            style="width: {{ $bar['pct'] }}%; background: linear-gradient(to right, #008080, #20b2aa);"></div>
                    </div>
                    <span class="text-xs text-gray-400 w-8 shrink-0">{{ $bar['count'] }}</span>
                </div>
                @endforeach

            </div>

            {{-- Trust badges row --}}
            <div class="flex flex-wrap items-center justify-center gap-6">
                <div class="flex items-center gap-2 px-5 py-3 rounded-full bg-white border border-gray-100 shadow-sm">
                    <i class="bi bi-patch-check-fill text-[#008080] text-lg"></i>
                    <span class="text-sm font-medium text-gray-700">Verified Reviews</span>
                </div>
                <div class="flex items-center gap-2 px-5 py-3 rounded-full bg-white border border-gray-100 shadow-sm">
                    <i class="bi bi-people-fill text-[#008080] text-lg"></i>
                    <span class="text-sm font-medium text-gray-700">Trusted by 500+ Businesses</span>
                </div>
                <div class="flex items-center gap-2 px-5 py-3 rounded-full bg-white border border-gray-100 shadow-sm">
                    <i class="bi bi-shield-fill-check text-[#008080] text-lg"></i>
                    <span class="text-sm font-medium text-gray-700">99% Satisfaction Rate</span>
                </div>
            </div>

        </div>
    </div>

</section>
{{-- End Rating Section --}}
