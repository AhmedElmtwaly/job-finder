<x-guest-layout>

    <div class="max-w-sm w-full mx-auto">

        <!-- Gradient Top Bar -->
        <div class="h-1.5 w-full bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 rounded-t-full -mt-4 mb-6"></div>

        <!-- Header -->
        <div class="text-center mb-6">

            <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-indigo-50 text-indigo-600 text-xs font-semibold tracking-wide mb-3">
                <span>✨</span>
                <span>CAREER PLATFORM</span>
            </div>

            <div class="w-14 h-14 mx-auto rounded-2xl bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center text-2xl shadow-lg shadow-indigo-200">
                🔑
            </div>

            <h1 class="mt-3 text-2xl font-bold text-gray-800">
                Forgot Password
            </h1>

            <p class="mt-1 text-sm text-gray-500">
                Enter your email address below and we'll send you a password reset link.
            </p>

        </div>

        <!-- Session Status -->
        <x-auth-session-status
            class="mb-4"
            :status="session('status')"
        />

        <form method="POST" action="{{ route('password.email') }}">
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
                    placeholder="Enter your email address"
                />

                <x-input-error
                    :messages="$errors->get('email')"
                    class="mt-2"
                />
            </div>

            <!-- Submit Button -->
            <div class="mt-6">
                <button
                    type="submit"
                    class="w-full py-3 rounded-xl text-base font-semibold text-white bg-gradient-to-r from-indigo-500 to-purple-600 shadow-lg shadow-indigo-200 hover:shadow-xl hover:shadow-indigo-300 hover:from-indigo-600 hover:to-purple-700 transition-all duration-200"
                >
                    Send Password Reset Link
                </button>
            </div>

            <!-- Back to Login -->
            <div class="text-center mt-6">
                <span class="text-gray-500">
                    Remembered your password?
                </span>

                <a
                    href="{{ route('login') }}"
                    class="ml-1 font-semibold text-indigo-600 hover:text-indigo-800"
                >
                    Back to Sign In
                </a>
            </div>

        </form>

        <p class="text-center text-xs text-gray-400 mt-6">
            🟢 Secured Sign In
        </p>

    </div>

</x-guest-layout>
