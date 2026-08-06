<x-guest-layout>

    <div class="max-w-sm w-full mx-auto">

        <!-- Gradient top accent bar -->
        <div class="h-1.5 w-full bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 rounded-t-full -mt-4 mb-6"></div>

        <div>

            <!-- Header -->
            <div class="text-center mb-6">

                <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-indigo-50 text-indigo-600 text-xs font-semibold tracking-wide mb-3">
                    <span>✨</span>
                    <span>CAREER PLATFORM</span>
                </div>

                <div class="w-14 h-14 mx-auto rounded-2xl bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center text-2xl shadow-lg shadow-indigo-200">
                    📝
                </div>

                <h1 class="mt-3 text-2xl font-bold text-gray-800">
                    Create a New Account
                </h1>

                <p class="mt-1 text-sm text-gray-500">
                    Join Job Finder and start your career journey.
                </p>

            </div>

            <form method="POST" action="{{ route('register') }}">

                @csrf

                <!-- Full Name -->
                <div>

                    <x-input-label
                        for="name"
                        :value="__('Full Name')"
                        class="text-sm font-semibold text-gray-700"
                    />

                    <x-text-input
                        id="name"
                        class="block mt-2 w-full rounded-xl border-gray-200 px-4 py-3 text-base focus:border-indigo-500 focus:ring-indigo-500 focus:ring-2 transition"
                        type="text"
                        name="name"
                        :value="old('name')"
                        required
                        autofocus
                        autocomplete="name"
                        placeholder="John Doe"
                    />

                    <x-input-error
                        :messages="$errors->get('name')"
                        class="mt-2"
                    />

                </div>

                <!-- Email -->
                <div class="mt-4">

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
                        autocomplete="username"
                        placeholder="name@example.com"
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
                        autocomplete="new-password"
                        placeholder="••••••••"
                    />

                    <x-input-error
                        :messages="$errors->get('password')"
                        class="mt-2"
                    />

                </div>

                <!-- Confirm Password -->
                <div class="mt-4">

                    <x-input-label
                        for="password_confirmation"
                        :value="__('Confirm Password')"
                        class="text-sm font-semibold text-gray-700"
                    />

                    <x-text-input
                        id="password_confirmation"
                        class="block mt-2 w-full rounded-xl border-gray-200 px-4 py-3 text-base focus:border-indigo-500 focus:ring-indigo-500 focus:ring-2 transition"
                        type="password"
                        name="password_confirmation"
                        required
                        autocomplete="new-password"
                        placeholder="••••••••"
                    />

                    <x-input-error
                        :messages="$errors->get('password_confirmation')"
                        class="mt-2"
                    />

                </div>

                <!-- Account Type -->
                <div class="mt-4">

                    <x-input-label
                        for="role"
                        :value="__('Account Type')"
                        class="text-sm font-semibold text-gray-700"
                    />

                    <select
                        id="role"
                        name="role"
                        required
                        class="block mt-2 w-full rounded-xl border-gray-200 px-4 py-3 text-base focus:border-indigo-500 focus:ring-indigo-500 focus:ring-2 transition">

                        <option value="seeker" {{ old('role') == 'seeker' ? 'selected' : '' }}>
                            👤 Job Seeker
                        </option>

                        <option value="company" {{ old('role') == 'company' ? 'selected' : '' }}>
                            🏢 Company
                        </option>

                    </select>

                    <x-input-error
                        :messages="$errors->get('role')"
                        class="mt-2"
                    />

                </div>
                                <!-- Create Account Button -->

                <div class="mt-6">

                    <button
                        type="submit"
                        class="w-full py-3 rounded-xl text-base font-semibold text-white bg-gradient-to-r from-indigo-500 to-purple-600 shadow-lg shadow-indigo-200 hover:shadow-xl hover:shadow-indigo-300 hover:from-indigo-600 hover:to-purple-700 transition-all duration-200">

                        Create Account

                    </button>

                </div>

                <!-- Sign In -->

                <div class="text-center mt-6">

                    <span class="text-gray-500">
                        Already have an account?
                    </span>

                    <a
                        href="{{ route('login') }}"
                        class="ml-1 font-semibold text-indigo-600 hover:text-indigo-800">

                        Sign In

                    </a>

                </div>

            </form>

        </div>

        <p class="text-center text-xs text-gray-400 mt-6">
            🟢 Secured sign up
        </p>

    </div>

</x-guest-layout>
