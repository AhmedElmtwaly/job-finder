<x-guest-layout>
    <div class="max-w-md mx-auto py-12 px-4 sm:px-6">
        <div class="bg-white/90 backdrop-blur-md rounded-2xl shadow-xl border border-gray-100 p-8 sm:p-10">
            
            <!-- Header -->
            <div class="text-center mb-8">
                <h1 class="text-2xl font-bold text-gray-800 tracking-tight">
                    إنشاء حساب جديد
                </h1>
                <p class="mt-2 text-sm text-gray-500">
                    انضم إلى منصة Job Finder وابدأ رحلتك المهنية
                </p>
            </div>

            <form method="POST" action="{{ route('register') }}" class="space-y-5">
                @csrf

                <!-- Full Name -->
                <div>
                    <x-input-label for="name" :value="__('الاسم الكامل')" class="text-gray-600 font-medium text-xs mb-1.5" />
                    <x-text-input
                        id="name"
                        class="block w-full px-4 py-3 rounded-xl border-gray-200 bg-gray-50/50 focus:bg-white focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 text-sm"
                        type="text"
                        name="name"
                        :value="old('name')"
                        required
                        autofocus
                        autocomplete="name"
                        placeholder="محمد أحمد"
                    />
                    <x-input-error :messages="$errors->get('name')" class="mt-1" />
                </div>

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('البريد الإلكتروني')" class="text-gray-600 font-medium text-xs mb-1.5" />
                    <x-text-input
                        id="email"
                        class="block w-full px-4 py-3 rounded-xl border-gray-200 bg-gray-50/50 focus:bg-white focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 text-sm"
                        type="email"
                        name="email"
                        :value="old('email')"
                        required
                        autocomplete="username"
                        placeholder="name@example.com"
                    />
                    <x-input-error :messages="$errors->get('email')" class="mt-1" />
                </div>

                <!-- Password -->
                <div>
                    <x-input-label for="password" :value="__('كلمة المرور')" class="text-gray-600 font-medium text-xs mb-1.5" />
                    <x-text-input
                        id="password"
                        class="block w-full px-4 py-3 rounded-xl border-gray-200 bg-gray-50/50 focus:bg-white focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 text-sm"
                        type="password"
                        name="password"
                        required
                        autocomplete="new-password"
                        placeholder="••••••••"
                    />
                    <x-input-error :messages="$errors->get('password')" class="mt-1" />
                </div>

                <!-- Confirm Password -->
                <div>
                    <x-input-label for="password_confirmation" :value="__('تأكيد كلمة المرور')" class="text-gray-600 font-medium text-xs mb-1.5" />
                    <x-text-input
                        id="password_confirmation"
                        class="block w-full px-4 py-3 rounded-xl border-gray-200 bg-gray-50/50 focus:bg-white focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 text-sm"
                        type="password"
                        name="password_confirmation"
                        required
                        autocomplete="new-password"
                        placeholder="••••••••"
                    />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1" />
                </div>

                <!-- Account Type -->
                <div>
                    <x-input-label for="role" :value="__('نوع الحساب')" class="text-gray-600 font-medium text-xs mb-1.5" />
                    <select
                        id="role"
                        name="role"
                        class="block w-full px-4 py-3 rounded-xl border-gray-200 bg-gray-50/50 focus:bg-white focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 text-sm text-gray-700">
                        <option value="seeker">باحث عن عمل</option>
                        <option value="company">شركة</option>
                    </select>
                    <x-input-error :messages="$errors->get('role')" class="mt-1" />
                </div>

                <!-- Register Button -->
                <div class="pt-2">
                    <button type="submit" class="w-full py-3 px-4 bg-indigo-600 hover:bg-indigo-700 text-white font-medium rounded-xl shadow-md transition-colors duration-200 text-sm">
                        إنشاء الحساب
                    </button>
                </div>

                <!-- Login Link -->
                <div class="text-center pt-4 border-t border-gray-100">
                    <span class="text-xs text-gray-500">
                        لديك حساب بالفعل؟
                    </span>
                    <a href="{{ route('login') }}" class="text-xs font-semibold text-indigo-600 hover:text-indigo-800 ml-1">
                        تسجيل الدخول
                    </a>
                </div>

            </form>
        </div>
    </div>
</x-guest-layout>