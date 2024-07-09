<header class="max-w-7xl mx-auto absolute top-0 left-0 ">
    <nav
        class="flex flex-wrap items-center justify-between w-full py-4 md:py-0 px-4 text-lg text-gray-700 bg-white ease-in-out duration-500 fixed z-[100] shadow-sm">
        <div>
            <a href="{{ route('home') }}">
                <img class="h-8" src="{{ asset('storage/img/icon.png') }}" alt="Logo" height="32px" loading="lazy">
            </a>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" id="menu-button" class="h-6 w-6 cursor-pointer md:hidden block"
            fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
        <div class="hidden w-full md:flex md:items-center md:w-auto" id="menu">
            <ul class=" pt-4 text-base text-gray-700 md:flex md:justify-between  md:pt-0">
                <li>
                    <a class="md:p-4 py-2 block hover:text-purple-400 {{ Route::currentRouteName() == 'home' ? 'text-purple-400' : '' }}"
                        href="{{ route('home') }}">Home</a>
                </li>
                <li>
                    <a class="md:p-4 py-2 block hover:text-purple-400 {{ Route::currentRouteName() == 'products.client' ? 'text-purple-400' : '' }}"
                        href="{{ route('products.client') }}">Produk</a>
                </li>
                <li>
                    <a class="md:p-4 py-2 block hover:text-purple-400"
                        href="https://www.kikukafandi.my.id/">Portofolio</a>
                </li>
                <li>
                    <a class="md:p-4 py-2 block hover:text-purple-400 {{ Route::currentRouteName() == 'tutorial' ? 'text-purple-400' : '' }}"
                        href="{{ route('tutorial') }}">Tutorial</a>
                </li>
                <li>
                    <a class="md:p-4 py-2 block hover:text-purple-400 {{ Route::currentRouteName() == 'client.posts' ? 'text-purple-400' : '' }}"
                        href="{{ route('client.posts') }}">Artikel</a>
                </li>
            </ul>
        </div>
    </nav>
</header>
