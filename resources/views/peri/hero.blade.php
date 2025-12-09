<section id="hero" class="relative min-h-screen flex items-center overflow-hidden py-20">
    <!-- Gradient Background -->
    <div class="absolute inset-0 z-0">
        <div class="absolute inset-0 bg-gradient-to-br from-slate-900 via-[#193a66] to-slate-800"></div>
        <!-- Mesh Gradient Overlay -->
        <div class="absolute inset-0 opacity-60"
            style="background: radial-gradient(ellipse at 20% 30%, rgba(25, 58, 102, 0.5) 0%, transparent 50%), radial-gradient(ellipse at 80% 70%, rgba(44, 82, 130, 0.4) 0%, transparent 50%), radial-gradient(ellipse at 50% 50%, rgba(59, 108, 181, 0.3) 0%, transparent 60%);">
        </div>
    </div>

    <!-- Animated Floating Elements -->
    <div class="absolute inset-0 z-0 overflow-hidden pointer-events-none">
        <!-- Large Glow Orbs -->
        <div class="absolute top-[10%] left-[5%] w-72 h-72 rounded-full mix-blend-screen filter blur-3xl opacity-20 animate-pulse"
            style="background-color: #193a66;">
        </div>
        <div class="absolute bottom-[10%] right-[10%] w-96 h-96 rounded-full mix-blend-screen filter blur-3xl opacity-15 animate-pulse"
            style="animation-delay: 1s; background-color: #244d85;">
        </div>
        <div class="absolute top-[50%] left-[50%] w-64 h-64 rounded-full mix-blend-screen filter blur-3xl opacity-10 animate-pulse"
            style="animation-delay: 2s; background-color: #3b6cb5;">
        </div>

        <!-- Floating Particles -->
        <div class="absolute top-[20%] left-[15%] w-2 h-2 rounded-full animate-float opacity-60"
            style="background-color: #244d85;"></div>
        <div class="absolute top-[40%] left-[25%] w-3 h-3 rounded-full animate-float opacity-40"
            style="animation-delay: 0.5s; background-color: #3b6cb5;"></div>
        <div class="absolute top-[60%] left-[10%] w-2 h-2 rounded-full animate-float opacity-50"
            style="animation-delay: 1s; background-color: #193a66;"></div>
        <div class="absolute top-[30%] right-[40%] w-2 h-2 bg-white rounded-full animate-float opacity-30"
            style="animation-delay: 1.5s;"></div>
        <div class="absolute top-[70%] right-[30%] w-3 h-3 rounded-full animate-float opacity-40"
            style="animation-delay: 2s; background-color: #60a5fa;"></div>

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
                    <span class="w-2 h-2 rounded-full animate-pulse" style="background-color: #3b6cb5;"></span>
                    <span>Intelligent HR Solutions</span>
                </div>

                <!-- Main Heading -->
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold leading-tight mb-4 text-white">
                    <span class="bg-clip-text text-transparent"
                        style="background-image: linear-gradient(to right, #3b6cb5, #60a5fa, #93c5fd);">
                        Smarter
                    </span>
                    <br>
                    <span class="text-white">Workforce & Payroll Management</span>
                </h1>

                <!-- Tagline - Keeping as optional or removing if not specified, but adding a generic one to match style -->
                <h2 class="text-xl md:text-2xl lg:text-3xl font-semibold mb-6 text-white/90">
                    Plan, Execute, Review, <span
                        class="text-transparent bg-gradient-to-r from-yellow-300 to-orange-400 bg-clip-text">Improve</span>
                </h2>

                <!-- Description -->
                <p class="text-lg md:text-xl text-white/70 mb-8 leading-relaxed max-w-xl mx-auto lg:mx-0">
                    Streamline your HR operations with our comprehensive suite for attendance, leave, payroll, and more.
                </p>

                <!-- CTA Buttons -->
                <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                    <a href="https://peri.airnet-technologies.com/client/register"
                        class="group relative px-8 py-4 text-white font-bold rounded-full overflow-hidden shadow-2xl transition-all duration-300 hover:scale-105 flex items-center justify-center gap-3"
                        style="background: linear-gradient(to right, #193a66, #244d85); box-shadow: 0 25px 50px -12px rgba(25, 58, 102, 0.3);">
                        <span class="relative z-10">Get Started</span>
                        <i class="bi bi-arrow-right relative z-10 group-hover:translate-x-1 transition-transform"></i>
                        <!-- Shine Effect -->
                        <div
                            class="absolute inset-0 bg-gradient-to-r from-transparent via-white/20 to-transparent translate-x-[-100%] group-hover:translate-x-[100%] transition-transform duration-700">
                        </div>
                    </a>
                    <a href="https://peri.airnet-technologies.com/client/login"
                        class="group px-8 py-4 bg-white/10 backdrop-blur-sm border-2 border-white/30 text-white font-bold rounded-full hover:bg-white/20 hover:border-white/50 transition-all duration-300 flex items-center justify-center gap-3">
                        <i class="bi bi-box-arrow-in-right text-lg"></i>
                        <span>Login</span>
                    </a>
                </div>

                <!-- Trust Indicators -->
                <div class="mt-10 flex flex-wrap gap-6 justify-center lg:justify-start items-center">
                    <div class="flex items-center gap-2 text-white/60">
                        <i class="bi bi-shield-check text-xl" style="color: #3b6cb5;"></i>
                        <span class="text-sm">Secure Data</span>
                    </div>
                    <div class="flex items-center gap-2 text-white/60">
                        <i class="bi bi-lightning-charge-fill text-yellow-400 text-xl"></i>
                        <span class="text-sm">Fast Processing</span>
                    </div>
                    <div class="flex items-center gap-2 text-white/60">
                        <i class="bi bi-graph-up-arrow text-xl" style="color: #60a5fa;"></i>
                        <span class="text-sm">Real-time Analytics</span>
                    </div>
                </div>
            </div>

            <!-- Right Content - Dashboard Preview -->
            <div class="lg:w-1/2 relative">
                <!-- Glow Effect Behind Image -->
                <div class="absolute inset-0 rounded-3xl blur-3xl transform scale-90 opacity-50"
                    style="background: linear-gradient(to right, rgba(25, 58, 102, 0.4), rgba(59, 108, 181, 0.3));">
                </div>

                <!-- Dashboard Image Container -->
                <div class="relative group">
                    <!-- Main Image - Clean without overlay cards since image is transparent -->
                    <div class="relative transform transition-all duration-500 group-hover:scale-[1.02]">
                        <img src="{{ asset('peri/hero.png') }}" alt="PERI Dashboard Preview"
                            class="w-full h-auto object-contain drop-shadow-2xl animate-float"
                            style="filter: drop-shadow(0 25px 50px rgba(25, 58, 102, 0.3));">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scroll Down Indicator -->
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 z-10 animate-bounce">
        <a href="#features" class="flex flex-col items-center text-white/50 hover:text-white/80 transition-colors">
            <span class="text-xs mb-2 tracking-wider uppercase">Features</span>
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