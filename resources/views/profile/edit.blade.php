<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-bold text-2xl text-stone-900 leading-tight">
                👤 {{ __('Profile Settings') }}
            </h2>
            <span class="text-xs font-semibold px-3.5 py-1.5 bg-stone-100 text-stone-700 rounded-full shadow-sm">
                Manage Account
            </span>
        </div>
    </x-slot>

    <!-- خلفية دافئة وراقية للصفحة بالكامل -->
    <div class="py-12 bg-[#FAFAF9] min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-8">

            <!-- كارد تعديل المعلومات الشخصية -->
            <div class="bg-white rounded-[2.5rem] shadow-[0_20px_40px_rgba(28,25,23,0.04)] border border-stone-200/70 p-8 sm:p-10 transition-all duration-300">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <!-- كارد تحديث كلمة المرور -->
            <div class="bg-white rounded-[2.5rem] shadow-[0_20px_40px_rgba(28,25,23,0.04)] border border-stone-200/70 p-8 sm:p-10 transition-all duration-300">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <!-- كارد حذف الحساب -->
            <div class="bg-white rounded-[2.5rem] shadow-[0_20px_40px_rgba(28,25,23,0.04)] border border-stone-200/70 p-8 sm:p-10 transition-all duration-300">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>

        </div>
    </div>
</x-app-layout>