<x-guest-layout>

    <div class="max-w-md mx-auto">

        <div class="bg-white shadow-xl rounded-2xl border border-gray-100 p-8">

            <div class="text-center mb-8">

                <div class="w-20 h-20 mx-auto flex items-center justify-center rounded-full bg-indigo-100 text-4xl">
                    🔑
                </div>

                <h2 class="mt-5 text-2xl font-bold text-gray-800">
                    Forgot Password
                </h2>

                <p class="mt-3 text-sm text-gray-500 leading-relaxed">
                    Enter your email address below and we'll send you a password reset link.
                </p>

            </div>

            <!-- Session Status -->

            <x-auth-session-status
                class="mb-6"
                :status="session('status')"
            />

            <form method="POST" action="{{ route('password.email') }}">

                @csrf

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

                <div class="mt-8">

                    <x-primary-button
                        class="w-full justify-center py-3 rounded-xl text-base font-semibold">

                        Send Password Reset Link

                    </x-primary-button>

                </div>

            </form>

        </div>

    </div>

</x-guest-layout>