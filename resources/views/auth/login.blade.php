<x-guest-layout>
    <div class="min-h-screen flex flex-col items-center justify-center relative overflow-hidden py-12 px-4 sm:px-6 lg:px-8 font-sans"
         style="background-image: url('{{ asset('images/am1.webp') }}'); background-size: cover; background-position: center; background-repeat: no-repeat; background-attachment: fixed;">
        
        <!-- طبقة التعتيم (Overlay) لضمان وضوح الفورم وقراءة النصوص بسهولة -->
        <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.45); z-index: 1;"></div>

        <!-- شعار لارافيل في الأعلى بنفس طريقة الصورة -->
        <div class="mb-6 z-10 flex justify-center">
            <div class="w-16 h-16 rounded-full bg-white/80 backdrop-blur-md shadow-md shadow-indigo-500/20 flex items-center justify-center border border-white/20">
                <svg class="w-8 h-8 text-indigo-600" viewBox="0 0 621 621" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M472.2 165.2L310.5 71.8L148.8 165.2V352L310.5 445.4L472.2 352V165.2Z" stroke="currentColor" stroke-width="20" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M310.5 71.8V445.4" stroke="currentColor" stroke-width="20" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M472.2 165.2L310.5 258.6L148.8 165.2" stroke="currentColor" stroke-width="20" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
        </div>

        <div class="max-w-md w-full relative z-10">
            
            <!-- الكارت الرئيسي بنمط زجاجي خفيف ليناسب الخلفية -->
            <div class="bg-white/95 backdrop-blur-xl rounded-[2rem] shadow-[0_20px_50px_rgba(0,0,0,0.3)] border border-white/20 overflow-hidden">
                
                <!-- الخط الملون المتدرج في أعلى الكارت -->
                <div class="h-1.5 w-full bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500"></div>

                <div class="p-8 sm:p-10">
                    
                    <!-- Badge الفئة -->
                    <div class="flex justify-center mb-5">
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[11px] font-bold bg-indigo-50 text-indigo-600 tracking-wider uppercase shadow-2xs">
                            ✨ CAREER PLATFORM
                        </span>
                    </div>

                    <!-- أيقونة القفل بنفس ألوان الصورة -->
                    <div class="flex justify-center mb-4">
                        <div class="w-12 h-12 rounded-2xl bg-gradient-to-tr from-indigo-600 to-purple-500 flex items-center justify-center text-xl shadow-md shadow-indigo-500/30 text-white">
                            🔒
                        </div>
                    </div>

                    <!-- Header -->
                    <div class="text-center mb-8">
                        <h1 class="text-2xl font-black tracking-tight text-slate-800">
                            Welcome Back
                        </h1>
                        <p class="mt-1.5 text-slate-500 text-xs sm:text-sm font-medium">
                            Sign in to continue your career journey.
                        </p>
                    </div>

                    <!-- Session Status -->
                    <x-auth-session-status class="mb-6" :status="session('status')" />

                    <form method="POST" action="{{ route('login') }}" class="space-y-4">
                        @csrf

                        <!-- Email -->
                        <div class="space-y-1.5">
                            <x-input-label for="email" :value="__('Email Address')" class="text-xs font-bold text-slate-600" />
                            <x-text-input
                                id="email"
                                class="block w-full px-4 py-3 rounded-xl bg-slate-50/80 border-slate-200 text-slate-800 focus:bg-white focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-600 text-sm transition-all placeholder:text-slate-400 font-medium"
                                type="email"
                                name="email"
                                :value="old('email')"
                                required
                                autofocus
                                autocomplete="username"
                                placeholder="Enter your email"
                            />
                            <x-input-error :messages="$errors->get('email')" class="mt-1" />
                        </div>

                        <!-- Password -->
                        <div class="space-y-1.5">
                            <x-input-label for="password" :value="__('Password')" class="text-xs font-bold text-slate-600" />
                            <x-text-input
                                id="password"
                                class="block w-full px-4 py-3 rounded-xl bg-slate-50/80 border-slate-200 text-slate-800 focus:bg-white focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-600 text-sm transition-all placeholder:text-slate-400 font-medium"
                                type="password"
                                name="password"
                                required
                                autocomplete="current-password"
                                placeholder="Enter your password"
                            />
                            <x-input-error :messages="$errors->get('password')" class="mt-1" />
                        </div>

                        <!-- Remember Me & Forgot Password -->
                        <div class="flex items-center justify-between text-xs pt-1">
                            <label for="remember_me" class="inline-flex items-center cursor-pointer text-slate-600 font-medium">
                                <input
                                    id="remember_me"
                                    type="checkbox"
                                    name="remember"
                                    class="rounded border-slate-300 text-indigo-600 shadow-xs focus:ring-indigo-500 w-4 h-4"
                                >
                                <span class="ml-2">Remember Me</span>
                            </label>

                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="text-indigo-600 hover:text-indigo-800 font-bold transition-colors">
                                    Forgot Password?
                                </a>
                            @endif
                        </div>

                        <!-- Login Button بنفس تدرج الصورة -->
                        <div class="pt-3">
                            <button type="submit" class="w-full py-3.5 px-4 bg-gradient-to-r from-indigo-600 via-purple-600 to-violet-600 hover:from-indigo-700 hover:to-violet-700 active:scale-[0.99] rounded-xl text-sm font-bold tracking-wide text-white shadow-lg shadow-indigo-500/30 transition-all duration-200">
                                Sign In
                            </button>
                        </div>

                        <!-- Register Link -->
                        @if (Route::has('register'))
                            <div class="text-center pt-3 mt-4">
                                <span class="text-slate-500 text-xs font-medium">
                                    New to Job Finder?
                                </span>
                                <a href="{{ route('register') }}" class="ml-1 font-bold text-indigo-600 hover:text-indigo-800 text-xs transition-colors">
                                    Create Account
                                </a>
                            </div>
                        @endif

                        <!-- Secured Indicator -->
                        <div class="mt-6 pt-2 text-center flex items-center justify-center gap-1.5 text-[11px] text-slate-500 font-semibold">
                            <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                            Secured sign in
                        </div>
                    </form>
                </div>
            </div>

            <!-- Footer info -->
            <div class="text-center mt-6 text-xs text-white/90 font-medium drop-shadow">
                &copy; 2026 Job Finder. All rights reserved.
            </div>

        </div>
    </div>
</x-guest-layout>