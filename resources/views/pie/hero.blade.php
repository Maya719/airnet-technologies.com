<section id="hero" class="relative min-h-screen flex items-center overflow-hidden py-20">
    <!-- Gradient Background -->
    <div class="absolute inset-0 z-0">
        <div class="absolute inset-0 bg-gradient-to-br from-slate-900 via-[#006666] to-slate-800"></div>
        <!-- Mesh Gradient Overlay -->
        <div class="absolute inset-0 opacity-60"
            style="background: radial-gradient(ellipse at 20% 30%, rgba(0, 128, 128, 0.5) 0%, transparent 50%), radial-gradient(ellipse at 80% 70%, rgba(0, 100, 100, 0.4) 0%, transparent 50%), radial-gradient(ellipse at 50% 50%, rgba(32, 178, 170, 0.3) 0%, transparent 60%);">
        </div>
    </div>

    <!-- Animated Floating Elements -->
    <div class="absolute inset-0 z-0 overflow-hidden pointer-events-none">
        <!-- Large Glow Orbs -->
        <div class="absolute top-[10%] left-[5%] w-72 h-72 rounded-full mix-blend-screen filter blur-3xl opacity-20 animate-pulse"
            style="background-color: #008080;">
        </div>
        <div class="absolute bottom-[10%] right-[10%] w-96 h-96 rounded-full mix-blend-screen filter blur-3xl opacity-15 animate-pulse"
            style="animation-delay: 1s; background-color: #20b2aa;">
        </div>
        <div class="absolute top-[50%] left-[50%] w-64 h-64 rounded-full mix-blend-screen filter blur-3xl opacity-10 animate-pulse"
            style="animation-delay: 2s; background-color: #40e0d0;">
        </div>

        <!-- Floating Particles -->
        <div class="absolute top-[20%] left-[15%] w-2 h-2 rounded-full animate-float opacity-60"
            style="background-color: #20b2aa;"></div>
        <div class="absolute top-[40%] left-[25%] w-3 h-3 rounded-full animate-float opacity-40"
            style="animation-delay: 0.5s; background-color: #40e0d0;"></div>
        <div class="absolute top-[60%] left-[10%] w-2 h-2 rounded-full animate-float opacity-50"
            style="animation-delay: 1s; background-color: #008080;"></div>
        <div class="absolute top-[30%] right-[40%] w-2 h-2 bg-white rounded-full animate-float opacity-30"
            style="animation-delay: 1.5s;"></div>
        <div class="absolute top-[70%] right-[30%] w-3 h-3 rounded-full animate-float opacity-40"
            style="animation-delay: 2s; background-color: #5f9ea0;"></div>

        <!-- Grid Pattern -->
        <div class="absolute inset-0 opacity-[0.03]"
            style="background-image: linear-gradient(rgba(255,255,255,0.1) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,0.1) 1px, transparent 1px); background-size: 50px 50px;">
        </div>
    </div>

    <!-- Main Content -->
    <div class="container mx-auto px-6 relative z-10">
        <div class="flex flex-col lg:flex-row items-center gap-12 lg:gap-16">

            <!-- Left Content -->
            <div class="lg:w-1/2 text-center lg:text-left mt-20 md:mt-16 lg:mt-0">
                <!-- Badge -->
                <div
                    class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/10 backdrop-blur-sm border border-white/20 text-white/80 text-sm mb-6 animate-fade-in">
                    <span class="w-2 h-2 rounded-full animate-pulse" style="background-color: #20b2aa;"></span>
                    <span>Powered by AI & Analytics</span>
                </div>

                <!-- Main Heading -->
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold leading-tight mb-4 text-white">
                    <span class="bg-clip-text text-transparent"
                        style="background-image: linear-gradient(to right, #20b2aa, #40e0d0, #5f9ea0);">
                        Perception and
                    </span>
                    <br>
                    <span class="text-white">Insights Explorer</span>
                </h1>

                <!-- Tagline -->
                <h2 class="text-2xl md:text-3xl lg:text-4xl font-semibold mb-6 text-white/90">
                    Own Your <span
                        class="text-transparent bg-gradient-to-r from-yellow-300 to-orange-400 bg-clip-text">Google
                        Reputation</span>
                </h2>

                <!-- Description -->
                <p class="text-lg md:text-xl text-white/70 mb-8 leading-relaxed max-w-xl mx-auto lg:mx-0">
                    Take control of your online presence with powerful analytics, real-time monitoring, and actionable
                    insights to boost your digital reputation.
                </p>

                <!-- CTA Buttons -->
                <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                    <a href="https://www.perceptionie.co.uk/login?mode=register"
                        class="group relative px-8 py-4 text-white font-bold rounded-full overflow-hidden shadow-2xl transition-all duration-300 hover:scale-105 flex items-center justify-center gap-3"
                        style="background: linear-gradient(to right, #008080, #20b2aa); box-shadow: 0 25px 50px -12px rgba(0, 128, 128, 0.3);">
                        <span class="relative z-10">Get Started Free</span>
                        <i class="bi bi-arrow-right relative z-10 group-hover:translate-x-1 transition-transform"></i>
                        <!-- Shine Effect -->
                        <div
                            class="absolute inset-0 bg-gradient-to-r from-transparent via-white/20 to-transparent translate-x-[-100%] group-hover:translate-x-[100%] transition-transform duration-700">
                        </div>
                    </a>
                    <a href="https://www.perceptionie.co.uk/login"
                        class="group px-8 py-4 bg-white/10 backdrop-blur-sm border-2 border-white/30 text-white font-bold rounded-full hover:bg-white/20 hover:border-white/50 transition-all duration-300 flex items-center justify-center gap-3">
                        <i class="bi bi-box-arrow-in-right text-lg"></i>
                        <span>Login</span>
                    </a>
                </div>

                <!-- Trust Indicators -->
                <div class="mt-10 flex flex-wrap gap-6 justify-center lg:justify-start items-center">
                    <div class="flex items-center gap-2 text-white/60">
                        <i class="bi bi-shield-check text-xl" style="color: #20b2aa;"></i>
                        <span class="text-sm">Secure & Private</span>
                    </div>
                    <div class="flex items-center gap-2 text-white/60">
                        <i class="bi bi-lightning-charge-fill text-yellow-400 text-xl"></i>
                        <span class="text-sm">Real-time Updates</span>
                    </div>
                    <div class="flex items-center gap-2 text-white/60">
                        <i class="bi bi-graph-up-arrow text-xl" style="color: #40e0d0;"></i>
                        <span class="text-sm">Analytics Dashboard</span>
                    </div>
                </div>
            </div>

            <!-- Right Content - Dashboard Preview -->
            <div class="lg:w-1/2 relative">
                <!-- Glow Effect Behind Image -->
                <div class="absolute inset-0 rounded-3xl blur-3xl transform scale-90 opacity-50"
                    style="background: linear-gradient(to right, rgba(0, 128, 128, 0.4), rgba(32, 178, 170, 0.3));">
                </div>

                <!-- Dashboard Image Container -->
                <div class="relative group">
                    <!-- Main Image - Clean without overlay cards since image is transparent -->
                    <div class="relative transform transition-all duration-500 group-hover:scale-[1.02]">
                        <img src="{{ asset('pie/hero.png') }}" alt="PIE Dashboard Preview"
                            class="w-full h-auto object-contain drop-shadow-2xl animate-float"
                            style="filter: drop-shadow(0 25px 50px rgba(0, 128, 128, 0.3));">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scroll Down Indicator -->
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 z-10 animate-bounce">
        <a href="#features" class="flex flex-col items-center text-white/50 hover:text-white/80 transition-colors">
            <span class="text-xs mb-2 tracking-wider uppercase">Explore</span>
            <i class="bi bi-chevron-down text-2xl"></i>
        </a>
    </div>
</section>

<style>
    @keyframes float {

        0%,
        100% {
            transform: translateY(0px);
        }

        50% {
            transform: translateY(-15px);
        }
    }

    @keyframes fade-in {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-float {
        animation: float 4s ease-in-out infinite;
    }

    .animate-fade-in {
        animation: fade-in 0.8s ease-out forwards;
    }
</style>
<!-- End Hero -->