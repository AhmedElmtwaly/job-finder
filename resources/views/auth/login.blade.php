<x-guest-layout>
 
    <div class="max-w-sm w-full mx-auto">
 
        <!-- Gradient top accent bar, echoing the dashboard's colored card headers -->
        <div class="h-1.5 w-full bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 rounded-t-full -mt-4 mb-6"></div>
 
        <div>
 
            <!-- Header -->
            <div class="text-center mb-6">
 
                <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-indigo-50 text-indigo-600 text-xs font-semibold tracking-wide mb-3">
                    <span>✨</span>
                    <span>CAREER PLATFORM</span>
                </div>
 
                <div class="w-14 h-14 mx-auto rounded-2xl bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center text-2xl shadow-lg shadow-indigo-200">
                    🔒
                </div>
 
                <h1 class="mt-3 text-2xl font-bold text-gray-800">
                    Welcome Back
                </h1>
 
                <p class="mt-1 text-sm text-gray-500">
                    Sign in to continue your career journey.
                </p>
 
            </div>
 
            <!-- Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />
 
            <form method="POST" action="{{ route('login') }}">
 
                @csrf
 
                <!-- Email -->
 
                <div>
 
                    <x-input-label
                        for="email"
                        :value="__('Email Address')"
                        class="text-sm font-semibold text-gray-700"
                    />
 
                    <x-text-input
                        id="email"
                        class="block mt-2 w-full rounded-xl border-gray-200 px-4 py-3 text-base focus:border-indigo-500 focus:ring-indigo-500 focus:ring-2 transition"
                        type="email"
                        name="email"
                        :value="old('email')"
                        required
                        autofocus
                        autocomplete="username"
                        placeholder="Enter your email"
                    />
 
                    <x-input-error
                        :messages="$errors->get('email')"
                        class="mt-2"
                    />
 
                </div>
 
                <!-- Password -->
 
                <div class="mt-4">
 
                    <x-input-label
                        for="password"
                        :value="__('Password')"
                        class="text-sm font-semibold text-gray-700"
                    />
 
                    <x-text-input
                        id="password"
                        class="block mt-2 w-full rounded-xl border-gray-200 px-4 py-3 text-base focus:border-indigo-500 focus:ring-indigo-500 focus:ring-2 transition"
                        type="password"
                        name="password"
                        required
                        autocomplete="current-password"
                        placeholder="Enter your password"
                    />
 
                    <x-input-error
                        :messages="$errors->get('password')"
                        class="mt-2"
                    />
 
                </div>
 
                <!-- Remember / Forgot -->
 
                <div class="flex items-center justify-between mt-4">
 
                    <label class="inline-flex items-center">
 
                        <input
                            id="remember_me"
                            type="checkbox"
                            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                            name="remember">
 
                        <span class="ml-2 text-sm text-gray-600">
                            Remember Me
                        </span>
 
                    </label>
 
                    @if (Route::has('password.request'))
 
                        <a href="{{ route('password.request') }}"
                           class="text-sm font-semibold text-indigo-600 hover:text-indigo-800 transition">
 
                            Forgot Password?
 
                        </a>
 
                    @endif
 
                </div>
 
                <!-- Sign In Button -->
 
                <div class="mt-6">
 
                    <button type="submit"
                        class="w-full py-3 rounded-xl text-base font-semibold text-white bg-gradient-to-r from-indigo-500 to-purple-600 shadow-lg shadow-indigo-200 hover:shadow-xl hover:shadow-indigo-300 hover:from-indigo-600 hover:to-purple-700 transition-all duration-200">
                        Sign In
                    </button>
 
                </div>
 
                <!-- Register -->
 
                @if (Route::has('register'))
 
                    <div class="text-center mt-6">
 
                        <span class="text-gray-500">
                            New to Job Finder?
                        </span>
 
                        <a
                            href="{{ route('register') }}"
                            class="ml-1 font-semibold text-indigo-600 hover:text-indigo-800">
 
                            Create Account
 
                        </a>
 
                    </div>
 
                @endif
 
            </form>
 
        </div>
 
        <p class="text-center text-xs text-gray-400 mt-6">
            🟢Secured sign in
        </p>
 
    </div>
 
</x-guest-layout>
