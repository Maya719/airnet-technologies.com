<footer id="footer" class="bg-gray-50 pt-16 pb-8 border-t border-gray-200 mt-auto">
    <div class="container mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center md:text-left mb-12">
            <!-- Brand -->
            <div class="flex flex-col items-center md:items-start">
                <h3 class="text-2xl font-bold text-primary mb-4">Airnet Technologies</h3>
                <p class="text-gray-600 max-w-xs">
                    As a worldwide organization, our mission is to provide digital solutions to every problem.
                </p>
            </div>

            <!-- Copyright -->
            <div class="flex flex-col items-center justify-center">
                <div class="text-gray-500 text-sm">
                    &copy; Copyright <strong><span class="text-primary">Airnet Technologies</span></strong>.
                </div>
                <div class="mt-2 text-sm text-gray-400">
                    Designed by <a href="/" class="text-secondary hover:underline">Airnet Technologies</a>
                </div>
            </div>

            <!-- Links -->
            <div class="flex flex-col items-center md:items-end justify-center space-y-2">
                <a class="text-gray-600 hover:text-primary transition-colors text-sm"
                    href="{{ route('privacy_policy_view') }}">Privacy Policy</a>
                <a class="text-gray-600 hover:text-primary transition-colors text-sm"
                    href="{{ route('refund_policy_view') }}">Refund Policy</a>
                <a class="text-gray-600 hover:text-primary transition-colors text-sm"
                    href="{{ route('terms_conditions_view') }}">Terms & Conditions</a>
            </div>
        </div>
    </div>
</footer>