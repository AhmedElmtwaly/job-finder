<x-guest-layout>

    <div class="max-w-md mx-auto">

        <div class="bg-white rounded-3xl shadow-2xl border border-gray-100 p-8">


            <!-- Header -->

            <div class="text-center mb-8">

                <div class="w-24 h-24 mx-auto rounded-full bg-indigo-100 flex items-center justify-center text-5xl shadow">
                    ✉️
                </div>


                <h1 class="mt-5 text-3xl font-bold text-gray-800">
                    Verify Your Email
                </h1>


                <p class="mt-3 text-sm text-gray-500 leading-relaxed">
                    Thanks for signing up! Please verify your email address by clicking the verification link we sent to you.
                </p>

            </div>



            <!-- Success Message -->

            @if (session('status') == 'verification-link-sent')

                <div class="mb-6 rounded-xl bg-green-50 border border-green-200 px-5 py-4">

                    <p class="text-sm font-medium text-green-700">
                        A new verification link has been sent to your email address.
                    </p>

                </div>

            @endif



            <!-- Resend Email -->

            <form method="POST" action="{{ route('verification.send') }}">

                @csrf


                <x-primary-button
                    class="w-full justify-center py-3 rounded-xl text-base font-semibold">

                    Resend Verification Email

                </x-primary-button>


            </form>



            <!-- Logout -->

            <form
                method="POST"
                action="{{ route('logout') }}"
                class="mt-6 text-center">

                @csrf


                <button
                    type="submit"
                    class="text-sm font-semibold text-gray-500 hover:text-indigo-600 transition">

                    Log Out

                </button>


            </form>


        </div>

    </div>

</x-guest-layout>