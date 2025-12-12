<section id="hero" class="relative min-h-screen flex items-center justify-center overflow-hidden">
    <!-- Background Image -->
    <div class="absolute inset-0 z-0">
        <img src="{{ asset('assets/images/hero.jpg') }}" class="w-full h-full object-cover" alt="Airnet Technologies">
        <!-- Dark Overlay for better text readability -->
        <div class="absolute inset-0 bg-gradient-to-br from-primary/80 via-primary/70 to-blue-900/80"></div>
    </div>

    <!-- Animated Background Elements -->
    <div class="absolute inset-0 z-0 overflow-hidden pointer-events-none">
        <div
            class="absolute top-[-10%] left-[-10%] w-96 h-96 bg-blue-400 rounded-full mix-blend-overlay filter blur-3xl opacity-20 animate-blob">
        </div>
        <div
            class="absolute top-[-10%] right-[-10%] w-96 h-96 bg-purple-400 rounded-full mix-blend-overlay filter blur-3xl opacity-20 animate-blob animation-delay-2000">
        </div>
        <div
            class="absolute bottom-[-20%] left-[20%] w-96 h-96 bg-cyan-400 rounded-full mix-blend-overlay filter blur-3xl opacity-20 animate-blob animation-delay-4000">
        </div>
    </div>

    <!-- Content -->
    <div class="container mx-auto px-6 relative z-10 text-center">
        <div class="max-w-4xl mx-auto">
            <h1 class="text-5xl md:text-6xl lg:text-7xl font-bold leading-tight mb-6 text-white drop-shadow-2xl">
                Airnet Technologies
            </h1>
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold mb-6 text-white/90 drop-shadow-xl">
                A Place of Innovating Solutions
            </h2>
            <p class="text-xl md:text-2xl text-white/80 mb-10 leading-relaxed drop-shadow-lg max-w-3xl mx-auto">
                We are a team of <span class="font-semibold text-white border-b-2 border-white/50">skilled
                    developers</span> creating technical solutions.
            </p>

            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                <a href="#about"
                    class="px-8 py-4 bg-white text-primary font-bold rounded-full hover:bg-gray-100 transition-all duration-300 shadow-2xl hover:shadow-white/50 hover:scale-105 flex items-center gap-2 group">
                    <span>About Us</span>
                    <i class="bi bi-arrow-right group-hover:translate-x-1 transition-transform"></i>
                </a>
                <a href="#contact"
                    class="px-8 py-4 bg-transparent border-2 border-white text-white font-bold rounded-full hover:bg-white hover:text-primary transition-all duration-300 shadow-2xl flex items-center gap-2">
                    <span>Contact Us</span>
                    <i class="bi bi-envelope"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- Scroll Down Indicator -->
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 z-10 animate-bounce">
        <a href="#about" class="text-white/70 hover:text-white transition-colors">
            <i class="bi bi-chevron-down text-4xl"></i>
        </a>
    </div>
</section>
<!-- End Hero -->