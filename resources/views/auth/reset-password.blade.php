<x-guest-layout>

    <div class="max-w-md mx-auto">

        <div class="bg-white rounded-3xl shadow-2xl border border-gray-100 p-8">

            <!-- Header -->

            <div class="text-center mb-8">

                <div class="w-24 h-24 mx-auto rounded-full bg-indigo-100 flex items-center justify-center text-5xl shadow">
                    🔐
                </div>

                <h1 class="mt-5 text-3xl font-bold text-gray-800">
                    Reset Password
                </h1>

                <p class="mt-2 text-sm text-gray-500 leading-relaxed">
                    Create a new secure password for your account.
                </p>

            </div>


            <form method="POST" action="{{ route('password.store') }}">

                @csrf


                <!-- Password Reset Token -->

                <input
                    type="hidden"
                    name="token"
                    value="{{ $request->route('token') }}">


                <!-- Email -->

                <div>

                    <x-input-label
                        for="email"
                        :value="__('Email Address')"
                    />

                    <x-text-input
                        id="email"
                        class="block mt-2 w-full rounded-xl"
                        type="email"
                        name="email"
                        :value="old('email', $request->email)"
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


                <!-- New Password -->

                <div class="mt-5">

                    <x-input-label
                        for="password"
                        :value="__('New Password')"
                    />

                    <x-text-input
                        id="password"
                        class="block mt-2 w-full rounded-xl"
                        type="password"
                        name="password"
                        required
                        autocomplete="new-password"
                        placeholder="Enter new password"
                    />

                    <x-input-error
                        :messages="$errors->get('password')"
                        class="mt-2"
                    />

                </div>


                <!-- Confirm Password -->

                <div class="mt-5">

                    <x-input-label
                        for="password_confirmation"
                        :value="__('Confirm New Password')"
                    />

                    <x-text-input
                        id="password_confirmation"
                        class="block mt-2 w-full rounded-xl"
                        type="password"
                        name="password_confirmation"
                        required
                        autocomplete="new-password"
                        placeholder="Confirm new password"
                    />

                    <x-input-error
                        :messages="$errors->get('password_confirmation')"
                        class="mt-2"
                    />

                </div>


                <!-- Button -->

                <div class="mt-8">

                    <x-primary-button
                        class="w-full justify-center py-3 rounded-xl text-base font-semibold">

                        Reset Password

                    </x-primary-button>

                </div>


                <div class="text-center mt-6">

                    <a
                        href="{{ route('login') }}"
                        class="text-sm font-semibold text-indigo-600 hover:text-indigo-800">

                        Back to Login

                    </a>

                </div>


            </form>

        </div>

    </div>

</x-guest-layout>