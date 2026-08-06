<x-guest-layout>

    <div class="max-w-md mx-auto">

        <div class="bg-white shadow-xl rounded-2xl p-8 border border-gray-100">

            <div class="text-center mb-8">

                <div class="w-20 h-20 mx-auto flex items-center justify-center rounded-full bg-indigo-100 text-4xl">
                    🔒
                </div>

                <h2 class="mt-5 text-2xl font-bold text-gray-800">
                    Confirm Your Password
                </h2>

                <p class="mt-2 text-sm text-gray-500 leading-relaxed">
                    This is a secure area of the application.
                    Please confirm your password before continuing.
                </p>

            </div>

            <form method="POST" action="{{ route('password.confirm') }}">

                @csrf

                <!-- Password -->

                <div>

                    <x-input-label
                        for="password"
                        :value="__('Password')"
                    />

                    <x-text-input
                        id="password"
                        class="block mt-2 w-full rounded-xl"
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

                <div class="mt-8">

                    <x-primary-button
                        class="w-full justify-center py-3 rounded-xl text-base font-semibold">

                        {{ __('Confirm Password') }}

                    </x-primary-button>

                </div>

            </form>

        </div>

    </div>

</x-guest-layout>