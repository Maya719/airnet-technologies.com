<!-- ======= Contact Section ======= -->
<section id="contact" class="py-20 bg-gray-50">
    <div class="container mx-auto px-6">
        <div class="text-center mb-16">
            <span class="text-secondary font-semibold uppercase tracking-wider text-sm">Contact</span>
            <h2 class="text-3xl md:text-4xl font-bold text-primary mt-2">Contact Us</h2>
        </div>

        <div class="max-w-5xl mx-auto bg-white rounded-3xl shadow-xl overflow-hidden">
            <div class="grid grid-cols-1 lg:grid-cols-5">
                <!-- Info Side -->
                <div
                    class="lg:col-span-2 bg-primary p-10 text-white flex flex-col justify-between relative overflow-hidden">
                    <!-- Background Blobs -->
                    <div
                        class="absolute top-0 right-0 w-32 h-32 bg-white/10 rounded-full -translate-y-1/2 translate-x-1/2 blur-2xl">
                    </div>
                    <div
                        class="absolute bottom-0 left-0 w-32 h-32 bg-secondary/20 rounded-full translate-y-1/2 -translate-x-1/2 blur-2xl">
                    </div>

                    <div class="relative z-10">
                        <h3 class="text-2xl font-bold mb-6 text-white">Contact Information</h3>
                        <p class="text-blue-100 mb-8">Fill up the form and our Team will get back to you within 24
                            hours.</p>

                        <div class="space-y-6 mb-12">
                            <div class="flex items-start gap-4">
                                <div
                                    class="mt-2 w-10 h-10 rounded-full bg-white/10 flex items-center justify-center flex-shrink-0">
                                    <i class="bi bi-envelope text-xl"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-lg text-white">Email:</h4>
                                    <a href="mailto:ag.rana@airnet-technologies.com"
                                        class="text-blue-200 hover:text-white transition-colors">ag.rana@airnet-technologies.com</a>
                                </div>
                            </div>

                            <div class="flex items-start gap-4">
                                <div
                                    class="mt-2 w-10 h-10 rounded-full bg-white/10 flex items-center justify-center flex-shrink-0">
                                    <i class="bi bi-phone text-xl"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-lg text-white">Call:</h4>
                                    <a href="tel:+971561283088"
                                        class="text-blue-200 hover:text-white transition-colors">+971 561 283088</a>
                                </div>
                            </div>
                        </div>

                        <div class="flex gap-4">
                            <a href="#"
                                class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center hover:bg-white hover:text-primary transition-all duration-300"><i
                                    class="bi bi-twitter"></i></a>
                            <a href="#"
                                class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center hover:bg-white hover:text-primary transition-all duration-300"><i
                                    class="bi bi-facebook"></i></a>
                            <a href="#"
                                class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center hover:bg-white hover:text-primary transition-all duration-300"><i
                                    class="bi bi-instagram"></i></a>
                            <a href="#"
                                class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center hover:bg-white hover:text-primary transition-all duration-300"><i
                                    class="bi bi-linkedin"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Form Side -->
                <div class="lg:col-span-3 p-10">
                    <livewire:contact />
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Contact Section -->