<header id="header" class="fixed top-0 w-full z-50 bg-white shadow-md">
  <div class="container mx-auto px-4 sm:px-6">
    <div class="flex items-center justify-between py-3 sm:py-4">
      <!-- Logo -->
      <a href="/" class="flex items-center gap-2">
        <img src="{{ asset('assets/images/logos/1701175007_1701156435_final-logo.png') }}" alt="Airnet Technologies"
          class="h-12 sm:h-14 md:h-16 w-auto">
      </a>

      <!-- Desktop Navigation -->
      <nav class="hidden lg:block">
        <ul class="flex items-center space-x-6 xl:space-x-8">
          <li><a class="text-gray-700 hover:text-primary font-medium transition-colors duration-200"
              href="{{ url('/#hero') }}">Home</a></li>
          <li><a class="text-gray-700 hover:text-primary font-medium transition-colors duration-200"
              href="{{ url('/#about') }}">About</a></li>
          <li><a class="text-gray-700 hover:text-primary font-medium transition-colors duration-200"
              href="{{ url('/#portfolio') }}">Services</a></li>
          <li><a class="text-gray-700 hover:text-primary font-medium transition-colors duration-200"
              href="{{ url('/#technologies') }}">Technologies</a></li>

          <!-- Products Dropdown -->
          <li class="relative products-dropdown">
            <button
              class="text-gray-700 hover:text-primary font-medium transition-colors duration-200 flex items-center gap-1 cursor-pointer">
              <span>Products</span>
              <i class="bi bi-chevron-down text-xs transition-transform duration-200 dropdown-icon"></i>
            </button>
            <!-- Dropdown Menu -->
            <div
              class="dropdown-menu absolute top-full left-0 pt-2 w-72 opacity-0 invisible transition-all duration-200 pointer-events-none">
              <div class="bg-white rounded-xl shadow-2xl border border-gray-100 overflow-hidden">
                <!-- PIE First -->
                <a href="{{ url('perception/insights/explorer') }}"
                  class="flex items-center gap-3 px-4 py-3 hover:bg-[#008080]/5 transition-colors group/item">
                  <div
                    class="w-10 h-10 bg-gradient-to-br from-[#008080] to-[#20b2aa] rounded-lg flex items-center justify-center flex-shrink-0">
                    <i class="bi bi-pie-chart-fill text-white text-lg"></i>
                  </div>
                  <div class="flex-1">
                    <div class="font-semibold text-gray-800 group-hover/item:text-[#008080] transition-colors">PIE
                    </div>
                    <div class="text-xs text-gray-500 whitespace-nowrap">Perception Insight Explorer</div>
                  </div>
                  <i
                    class="bi bi-arrow-up-right text-gray-400 group-hover/item:text-[#008080] opacity-0 group-hover/item:opacity-100 transition-all"></i>
                </a>
                <div class="h-px bg-gray-100"></div>
                <!-- PERI Second -->
                <a href="https://peri.airnet-technologies.com/"
                  class="flex items-center gap-3 px-4 py-3 hover:bg-primary/5 transition-colors group/item">
                  <div
                    class="w-10 h-10 bg-gradient-to-br from-primary to-blue-800 rounded-lg flex items-center justify-center flex-shrink-0">
                    <i class="bi bi-people-fill text-white text-lg"></i>
                  </div>
                  <div class="flex-1">
                    <div class="font-semibold text-gray-800 group-hover/item:text-primary transition-colors">PERI</div>
                    <div class="text-xs text-gray-500 whitespace-nowrap">Plan Execute Review & Improve</div>
                  </div>
                  <i
                    class="bi bi-arrow-up-right text-gray-400 group-hover/item:text-primary opacity-0 group-hover/item:opacity-100 transition-all"></i>
                </a>
              </div>
            </div>
          </li>

          <li>
            <a class="px-5 py-2 bg-primary text-white rounded-full hover:bg-blue-800 transition-all duration-200 shadow-md hover:shadow-lg"
              href="#contact">Contact</a>
          </li>
        </ul>
      </nav>

      <!-- Mobile Menu Button -->
      <button id="mobile-menu-btn"
        class="lg:hidden text-3xl text-primary focus:outline-none p-2 hover:bg-gray-100 rounded-lg transition-colors"
        aria-label="Toggle mobile menu">
        <i class="bi bi-list" id="menu-icon-open"></i>
        <i class="bi bi-x hidden" id="menu-icon-close"></i>
      </button>
    </div>

    <!-- Mobile Menu Dropdown -->
    <nav id="mobile-menu" class="lg:hidden overflow-hidden max-h-0 transition-all duration-300 ease-in-out">
      <ul class="flex flex-col space-y-1 pb-4">
        <li><a
            class="block py-3 px-4 text-gray-700 hover:bg-primary/10 hover:text-primary font-medium transition-colors mobile-menu-link"
            href="{{ url('/#hero') }}">Home</a></li>
        <li><a
            class="block py-3 px-4 text-gray-700 hover:bg-primary/10 hover:text-primary font-medium transition-colors mobile-menu-link"
            href="{{ url('/#about') }}">About</a></li>
        <li><a
            class="block py-3 px-4 text-gray-700 hover:bg-primary/10 hover:text-primary font-medium transition-colors mobile-menu-link"
            href="{{ url('/#portfolio') }}">Services</a></li>
        <li><a
            class="block py-3 px-4 text-gray-700 hover:bg-primary/10 hover:text-primary font-medium transition-colors mobile-menu-link"
            href="{{ url('/#technologies') }}">Technologies</a></li>

        <!-- Products Submenu in Mobile -->
        <li class="border-t border-gray-200 mt-2 pt-2">
          <div class="px-4 py-2 text-xs font-semibold text-gray-500 uppercase tracking-wider">Products</div>
          <!-- PIE First -->
          <a href="{{  url('perception/insights/explorer') }}"
            class="flex items-center gap-3 py-3 px-4 text-gray-700 hover:bg-[#008080]/10 transition-colors">
            <div
              class="w-8 h-8 bg-gradient-to-br from-[#008080] to-[#20b2aa] rounded-lg flex items-center justify-center flex-shrink-0">
              <i class="bi bi-pie-chart-fill text-white text-sm"></i>
            </div>
            <div>
              <div class="font-semibold text-gray-800">PIE</div>
              <div class="text-xs text-gray-500">Perception Insight Explorer</div>
            </div>
            <i class="bi bi-arrow-up-right text-gray-400 ml-auto"></i>
          </a>
          <!-- PERI Second -->
          <a href="https://peri.airnet-technologies.com/"
            class="flex items-center gap-3 py-3 px-4 text-gray-700 hover:bg-primary/10 transition-colors">
            <div
              class="w-8 h-8 bg-gradient-to-br from-primary to-blue-800 rounded-lg flex items-center justify-center flex-shrink-0">
              <i class="bi bi-people-fill text-white text-sm"></i>
            </div>
            <div>
              <div class="font-semibold text-gray-800">PERI</div>
              <div class="text-xs text-gray-500">Plan Execute Review & Improve</div>
            </div>
            <i class="bi bi-arrow-up-right text-gray-400 ml-auto"></i>
          </a>
        </li>

        <li><a
            class="block py-3 px-4 text-gray-700 hover:bg-primary/10 hover:text-primary font-medium transition-colors mobile-menu-link"
            href="#contact">Contact</a></li>
      </ul>
    </nav>
  </div>
</header>

<script>
  document.addEventListener('DOMContentLoaded', () => {
    const mobileBtn = document.getElementById('mobile-menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    const menuLinks = document.querySelectorAll('.mobile-menu-link');
    const iconOpen = document.getElementById('menu-icon-open');
    const iconClose = document.getElementById('menu-icon-close');
    let isMenuOpen = false;

    function toggleMenu() {
      isMenuOpen = !isMenuOpen;

      if (isMenuOpen) {
        // Open menu - expand downward
        mobileMenu.style.maxHeight = mobileMenu.scrollHeight + 'px';
        iconOpen.classList.add('hidden');
        iconClose.classList.remove('hidden');
      } else {
        // Close menu - collapse upward
        mobileMenu.style.maxHeight = '0';
        iconOpen.classList.remove('hidden');
        iconClose.classList.add('hidden');
      }
    }

    // Toggle on button click
    mobileBtn.addEventListener('click', (e) => {
      e.stopPropagation();
      toggleMenu();
    });

    // Close menu when clicking a link
    menuLinks.forEach(link => {
      link.addEventListener('click', () => {
        if (isMenuOpen) {
          toggleMenu();
        }
      });
    });

    // Handle window resize
    window.addEventListener('resize', () => {
      if (window.innerWidth >= 1024 && isMenuOpen) {
        toggleMenu();
      }
    });

    // Smooth scroll for all anchor links (including those with full URLs)
    document.querySelectorAll('a[href*="#"]').forEach(anchor => {
      anchor.addEventListener('click', function (e) {
        const href = this.getAttribute('href');

        // Skip external links
        if (href.startsWith('http') && !href.includes(window.location.hostname)) {
          return;
        }

        // Extract hash from various formats: "#about", "/#about", "http://site.com/#about"
        let hash = '';
        if (href.includes('#')) {
          hash = href.split('#')[1];
        }

        // Skip if no hash or just "#"
        if (!hash || hash === '') return;

        const targetElement = document.getElementById(hash);

        if (targetElement) {
          e.preventDefault();
          targetElement.scrollIntoView({
            behavior: 'smooth',
            block: 'start'
          });

          // Update URL without jumping
          if (window.location.pathname === '/') {
            history.pushState(null, '', '#' + hash);
          }
        }
      });
    });
  });
</script>