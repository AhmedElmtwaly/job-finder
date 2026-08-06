<nav class="bg-white border-b border-gray-100 shadow-sm">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="flex justify-between h-20">


            <!-- Left Side -->

            <div class="flex items-center">


                <!-- Logo -->

                <div class="flex items-center">

                    <a href="{{ route('dashboard') }}"
                       class="flex items-center gap-3">

                        <div class="w-12 h-12 rounded-xl bg-indigo-100 flex items-center justify-center">

                            <x-application-logo
                                class="h-8 w-8 fill-current text-indigo-600"
                            />

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


                </div>


            </div>





            <!-- Right Side -->

            <div class="hidden sm:flex items-center gap-5">


                <!-- User Info -->

                <div class="text-right">


                    <p class="text-sm font-semibold text-gray-800">

                        {{ Auth::user()->name }}

                    </p>


                    <span class="inline-flex items-center mt-1 
                                 px-3 py-1 rounded-full 
                                 text-xs font-bold
                                 bg-indigo-100 text-indigo-700">

                        {{ ucfirst(Auth::user()->role) }}

                    </span>


                </div>




                <!-- Profile -->

                <a
                    href="{{ route('profile.edit') }}"
                    class="px-4 py-2 rounded-xl 
                           text-sm font-medium
                           text-gray-700
                           hover:bg-indigo-50
                           hover:text-indigo-700
                           transition">

                    Profile

                </a>





                <!-- Logout -->

                <form method="POST" action="{{ route('logout') }}">

                    @csrf


                    <button
                        type="submit"
                        class="px-4 py-2 rounded-xl
                               bg-red-50
                               text-red-600
                               text-sm
                               font-semibold
                               hover:bg-red-100
                               transition">


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
                        class="px-3 py-2 rounded-lg
                               bg-red-50
                               text-red-600
                               text-xs
                               font-bold">

                        Logout

                    </button>


                </form>


            </div>



        </div>

    </div>

</nav>