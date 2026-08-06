<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center gap-2">
            <span class="text-indigo-600">📩</span>
            <h2 class="font-bold text-xl text-gray-800">
                Contact Us
            </h2>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Hero -->
            <div class="bg-white shadow-sm rounded-2xl border border-gray-100 overflow-hidden">

                <div class="h-1.5 w-full bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500"></div>

                <div class="p-8 sm:p-12 text-center">

                    <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-indigo-50 text-indigo-600 text-xs font-semibold tracking-wide mb-4">
                        <span>📧</span>
                        <span>CONTACT US</span>
                    </div>

                    <div class="w-16 h-16 mx-auto rounded-2xl bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center text-3xl shadow-lg shadow-indigo-200 mb-5">
                        ✉️
                    </div>

                    <h1 class="text-3xl sm:text-4xl font-bold text-gray-800">
                        We'd Love to Hear From You
                    </h1>

                    <p class="mt-4 text-gray-500 max-w-2xl mx-auto leading-relaxed">
                        Have a question, suggestion, or need assistance? Feel free to contact us anytime.
                    </p>

                </div>

            </div>

            <!-- Contact Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 text-center">
                    <div class="text-3xl mb-3">📧</div>
                    <h3 class="font-bold text-gray-800">Email</h3>
                    <p class="mt-2 text-gray-500 text-sm break-all">
                        ahmedelmtwaly123@gmail.com
                    </p>
                </div>

                <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 text-center">
                    <div class="text-3xl mb-3">📞</div>
                    <h3 class="font-bold text-gray-800">Phone</h3>
                    <p class="mt-2 text-gray-500 text-sm">
                        01024195648
                    </p>
                </div>

                <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 text-center">
                    <div class="text-3xl mb-3">📍</div>
                    <h3 class="font-bold text-gray-800">Address</h3>
                    <p class="mt-2 text-gray-500 text-sm">
                        Mansoura, Egypt
                    </p>
                </div>

            </div>

            <!-- Contact Form -->
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-8">

                <h3 class="text-2xl font-bold text-gray-800 mb-6">
                    Send Us a Message
                </h3>

                <form>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Full Name
                            </label>

                            <input
                                type="text"
                                placeholder="Enter your name"
                                class="w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Email
                            </label>

                            <input
                                type="email"
                                placeholder="Enter your email"
                                class="w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
                        </div>

                    </div>

                    <div class="mt-6">

                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Subject
                        </label>

                        <input
                            type="text"
                            placeholder="Subject"
                            class="w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">

                    </div>

                    <div class="mt-6">

                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Message
                        </label>

                        <textarea
                            rows="6"
                            placeholder="Write your message..."
                            class="w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"></textarea>

                    </div>

                    <div class="mt-8">

                        <button
                            type="submit"
                            class="w-full bg-gradient-to-r from-indigo-500 to-purple-600 hover:from-indigo-600 hover:to-purple-700 text-white font-bold py-3 rounded-xl transition duration-300 shadow-lg">
                            📨 Send Message
                        </button>

                    </div>

                </form>

            </div>

        </div>
    </div>

</x-app-layout>
