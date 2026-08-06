<x-guest-layout>

    <div class="max-w-md mx-auto py-10 px-4">

        <div class="bg-white/90 backdrop-blur-xl rounded-3xl shadow-2xl border border-gray-100 overflow-hidden">

            <!-- Top Gradient -->
            <div class="h-2 bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500"></div>

            <div class="p-8">

                <!-- Header -->
                <div class="text-center mb-8">

                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-indigo-100 text-indigo-700 text-xs font-semibold mb-4">
                        ✨ JOB FINDER
                    </div>

                    <div class="w-20 h-20 mx-auto rounded-full bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center text-4xl shadow-lg">
                        👤
                    </div>

                    <h1 class="mt-5 text-3xl font-extrabold text-gray-800">
                        Create Account
                    </h1>

                    <p class="mt-2 text-sm text-gray-500">
                        Join Job Finder and start your career journey today.
                    </p>

                </div>

                <form method="POST" action="{{ route('register') }}" class="space-y-5">

                    @csrf

                    <!-- Full Name -->
                    <div>
                        <x-input-label
                            for="name"
                            :value="__('Full Name')"
                            class="text-gray-700 font-semibold"
                        />

                        <div class="relative mt-2">
                            <span class="absolute left-4 top-3.5 text-gray-400">👤</span>

                            <x-text-input
                                id="name"
                                class="block w-full pl-11 pr-4 py-3 rounded-xl border-gray-200 focus:border-indigo-500 focus:ring-indigo-500"
                                type="text"
                                name="name"
                                :value="old('name')"
                                required
                                autofocus
                                placeholder="John Doe"
                            />
                        </div>

                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Email -->
                    <div>

                        <x-input-label
                            for="email"
                            :value="__('Email Address')"
                            class="text-gray-700 font-semibold"
                        />

                        <div class="relative mt-2">
                            <span class="absolute left-4 top-3.5 text-gray-400">📧</span>

                            <x-text-input
                                id="email"
                                class="block w-full pl-11 pr-4 py-3 rounded-xl border-gray-200 focus:border-indigo-500 focus:ring-indigo-500"
                                type="email"
                                name="email"
                                :value="old('email')"
                                required
                                placeholder="name@example.com"
                            />
                        </div>

                        <x-input-error :messages="$errors->get('email')" class="mt-2" />

                    </div>

                    <!-- Password -->
                    <div>

                        <x-input-label
                            for="password"
                            :value="__('Password')"
                            class="text-gray-700 font-semibold"
                        />

                        <div class="relative mt-2">

                            <span class="absolute left-4 top-3.5 text-gray-400">🔒</span>

                            <x-text-input
                                id="password"
                                class="block w-full pl-11 pr-4 py-3 rounded-xl border-gray-200 focus:border-indigo-500 focus:ring-indigo-500"
                                type="password"
                                name="password"
                                required
                                placeholder="••••••••"
                            />

                        </div>

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />

                    </div>

                    <!-- Confirm Password -->
                    <div>

                        <x-input-label
                            for="password_confirmation"
                            :value="__('Confirm Password')"
                            class="text-gray-700 font-semibold"
                        />

                        <div class="relative mt-2">

                            <span class="absolute left-4 top-3.5 text-gray-400">🔑</span>

                            <x-text-input
                                id="password_confirmation"
                                class="block w-full pl-11 pr-4 py-3 rounded-xl border-gray-200 focus:border-indigo-500 focus:ring-indigo-500"
                                type="password"
                                name="password_confirmation"
                                required
                                placeholder="••••••••"
                            />

                        </div>

                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />

                    </div>

                    <!-- Role -->
                    <div>

                        <x-input-label
                            for="role"
                            :value="__('Account Type')"
                            class="text-gray-700 font-semibold"
                        />

                        <select
                            id="role"
                            name="role"
                            class="mt-2 block w-full rounded-xl border-gray-200 py-3 px-4 focus:border-indigo-500 focus:ring-indigo-500">

                            <option value="seeker">👨‍💼 Job Seeker</option>
                            <option value="company">🏢 Company</option>

                        </select>

                        <x-input-error :messages="$errors->get('role')" class="mt-2" />

                    </div>

                    <!-- Button -->
                    <button
                        type="submit"
                        class="w-full py-3 rounded-xl text-white font-bold bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 hover:scale-105 hover:shadow-xl transition duration-300">

                        🚀 Create Account

                    </button>

                    <!-- Login -->
                    <div class="text-center pt-6 border-t">

                        <span class="text-gray-500">
                            Already have an account?
                        </span>

                        <a
                            href="{{ route('login') }}"
                            class="font-semibold text-indigo-600 hover:text-purple-600">

                            Sign In

                        </a>

                    </div>

                </form>

            </div>

        </div>

    </div>

</x-guest-layout>
