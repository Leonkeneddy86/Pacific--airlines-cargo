
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Production-Ready Responsive Navigation</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .dropdown-transition {
            transition: opacity 0.2s ease-in-out, transform 0.2s ease-in-out;
        }
        .mobile-nav-transition {
            transition: transform 0.3s ease-in-out;
        }
    </style>
</head>
<body class="font-sans">
    <header id="main-header" class="bg-gray-800 text-white fixed w-full top-0 z-50 transition-all duration-300">
        <div class="container mx-auto px-4">
            <div class="flex items-center justify-between py-4">
                <div class="flex items-center">
                    <img src="https://via.placeholder.com/50" alt="Logo" class="w-10 h-10 mr-2 rounded">
                    <h1 class="text-xl font-bold">MyCompany</h1>
                </div>
                <button id="menu-toggle" class="md:hidden focus:outline-none z-50">
                    <svg id="menu-icon" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                    <svg id="close-icon" class="w-6 h-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
                <nav id="main-nav" class="fixed inset-y-0 right-0 transform translate-x-full md:relative md:translate-x-0 bg-gray-800 md:bg-transparent w-64 md:w-auto h-full md:h-auto overflow-y-auto md:overflow-visible transition-transform duration-300 ease-in-out md:transition-none">
                    <ul class="pt-16 md:pt-0 px-4 md:px-0 md:flex space-y-2 md:space-y-0 md:space-x-4">
                        <li><a href="#" class="block py-2 md:py-0 hover:text-gray-300 transition duration-200">Home</a></li>
                        <li class="relative group">
                            <a href="#" class="block py-2 md:py-0 hover:text-gray-300 transition duration-200 flex items-center justify-between">
                                Products
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </a>
                            <ul class="hidden mt-2 space-y-2 bg-gray-700 md:bg-white text-white md:text-gray-800 rounded shadow-lg md:absolute md:left-0 w-full md:w-48">
                                <li><a href="#" class="block px-4 py-2 hover:bg-gray-600 md:hover:bg-gray-100 transition duration-200">Electronics</a></li>
                                <li><a href="#" class="block px-4 py-2 hover:bg-gray-600 md:hover:bg-gray-100 transition duration-200">Clothing</a></li>
                                <li><a href="#" class="block px-4 py-2 hover:bg-gray-600 md:hover:bg-gray-100 transition duration-200">Home & Garden</a></li>
                                <li><a href="#" class="block px-4 py-2 hover:bg-gray-600 md:hover:bg-gray-100 transition duration-200">Sports & Outdoors</a></li>
                            </ul>
                        </li>
                        <li><a href="#" class="block py-2 md:py-0 hover:text-gray-300 transition duration-200">About</a></li>
                        <li><a href="#" class="block py-2 md:py-0 hover:text-gray-300 transition duration-200">Contact</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <main class="container mx-auto px-4 py-8 mt-20">
        <h2 class="text-2xl font-bold mb-4">Welcome to MyCompany</h2>
        <p class="mb-4">This is a sample content area. Scroll down to see the fixed header in action.</p>
        <!-- Add more content to enable scrolling -->
        <div class="space-y-4">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam in dui mauris.</p>
            <p>Vivamus hendrerit arcu sed erat molestie vehicula. Sed auctor neque eu tellus rhoncus ut eleifend nibh porttitor.</p>
            <p>Ut in nulla enim. Phasellus molestie magna non est bibendum non venenatis nisl tempor. Suspendisse dictum feugiat nisl ut dapibus.</p>
            <!-- Repeat these paragraphs multiple times to create more content -->
        </div>
    </main>

    <script>
        const menuToggle = document.getElementById('menu-toggle');
        const mainNav = document.getElementById('main-nav');
        const header = document.getElementById('main-header');
        const menuIcon = document.getElementById('menu-icon');
        const closeIcon = document.getElementById('close-icon');
        let lastScrollTop = 0;

        menuToggle.addEventListener('click', () => {
            mainNav.classList.toggle('translate-x-full');
            menuIcon.classList.toggle('hidden');
            closeIcon.classList.toggle('hidden');
        });

        // Dropdown click handler for mobile
        const dropdowns = document.querySelectorAll('.group');
        dropdowns.forEach(dropdown => {
            const link = dropdown.querySelector('a');
            const submenu = dropdown.querySelector('ul');
            link.addEventListener('click', (e) => {
                if (window.innerWidth < 768) {
                    e.preventDefault();
                    submenu.classList.toggle('hidden');
                }
            });
        });

        // Close menu when clicking outside
        document.addEventListener('click', (e) => {
            if (!mainNav.contains(e.target) && !menuToggle.contains(e.target)) {
                mainNav.classList.add('translate-x-full');
                menuIcon.classList.remove('hidden');
                closeIcon.classList.add('hidden');
            }
        });

        // Adjust menu visibility on window resize
        window.addEventListener('resize', () => {
            if (window.innerWidth >= 768) {
                mainNav.classList.remove('translate-x-full');
                menuIcon.classList.remove('hidden');
                closeIcon.classList.add('hidden');
            } else {
                mainNav.classList.add('translate-x-full');
            }
        });

        // Hide header on scroll down, show on scroll up
        window.addEventListener('scroll', () => {
            let scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            if (scrollTop > lastScrollTop) {
                header.style.transform = 'translateY(-100%)';
            } else {
                header.style.transform = 'translateY(0)';
            }
            lastScrollTop = scrollTop <= 0 ? 0 : scrollTop;
        }, false);
    </script>
</body>
</html>