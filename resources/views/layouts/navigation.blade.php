<nav class="bg-white border-b border-gray-100 shadow-sm">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="flex justify-between h-20">

            <!-- Left Side -->
            <div class="flex items-center">

                <!-- Logo -->
                <div class="flex items-center">
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-3">

                        <div class="w-12 h-12 rounded-xl bg-indigo-100 flex items-center justify-center">
                            <x-application-logo
                                class="h-8 w-8 fill-current text-indigo-600" />
                        </div>

                        <div class="hidden sm:block">
                            <h1 class="text-xl font-bold text-gray-800">
                                Job Finder
                            </h1>

                            <p class="text-xs text-gray-500">
                                Career Platform
                            </p>
                        </div>

                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden sm:flex sm:items-center sm:ms-12 space-x-8">

                    <x-nav-link
                        :href="route('dashboard')"
                        :active="request()->routeIs('dashboard')">
                        Dashboard
                    </x-nav-link>

                    <x-nav-link
                        :href="route('about')"
                        :active="request()->routeIs('about')">
                        About
                    </x-nav-link>

                    <x-nav-link
                        :href="route('contact')"
                        :active="request()->routeIs('contact')">
                        Contact
                    </x-nav-link>

                </div>

            </div>

            <!-- Right Side -->
            <div class="hidden sm:flex items-center gap-6">

                <!-- User -->
                <div class="flex items-center gap-3 border-r border-gray-200 pr-6">

                    <!-- Avatar -->
                    <div class="w-10 h-10 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-700 font-bold">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>

                    <!-- Name & Role -->
                    <div class="leading-tight">
                        <p class="text-sm font-semibold text-gray-900">
                            {{ Auth::user()->name }}
                        </p>

                        <span class="inline-flex items-center mt-1 px-3 py-1 rounded-full text-xs font-bold bg-indigo-100 text-indigo-700">
                            {{ ucfirst(Auth::user()->role) }}
                        </span>
                    </div>

                </div>

                <!-- Profile -->
                <a href="{{ route('profile.edit') }}"
                    class="text-sm font-medium text-gray-700 hover:text-indigo-600 transition">
                    Profile
                </a>

                <!-- Logout -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button
                        type="submit"
                        class="px-4 py-2 rounded-xl bg-red-50 text-red-600 text-sm font-semibold hover:bg-red-100 transition">
                        Logout
                    </button>
                </form>

            </div>

            <!-- Mobile Logout -->
            <div class="flex items-center sm:hidden">

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button
                        type="submit"
                        class="px-3 py-2 rounded-lg bg-red-50 text-red-600 text-xs font-bold">
                        Logout
                    </button>

                </form>

            </div>

        </div>

    </div>

</nav>
