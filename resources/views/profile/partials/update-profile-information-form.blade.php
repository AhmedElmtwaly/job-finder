<section>
    <header class="mb-6 border-b border-stone-100 pb-4 flex items-center justify-between">
        <div>
            <h2 class="text-base font-bold text-stone-900 tracking-tight">
                {{ __('Profile Information') }}
            </h2>
            <p class="mt-0.5 text-xs text-stone-500 font-medium">
                {{ __("Update your account's profile information and email address.") }}
            </p>
        </div>
        <div class="w-9 h-9 rounded-xl bg-stone-100 flex items-center justify-center text-stone-600 text-sm shadow-sm">
            👤
        </div>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="space-y-5">
        @csrf
        @method('patch')

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
            <!-- Name Field -->
            <div class="space-y-1.5">
                <x-input-label for="name" :value="__('Full Name')" class="text-xs font-semibold uppercase tracking-wider text-stone-500" />
                <div class="relative flex items-center">
                    <span class="absolute left-4 text-stone-400 text-sm">✏️</span>
                    <x-text-input 
                        id="name" 
                        name="name" 
                        type="text" 
                        class="block w-full pl-11 pr-4 py-3.5 rounded-xl bg-stone-50/70 border-stone-200 text-stone-900 focus:bg-white focus:ring-2 focus:ring-stone-400/20 focus:border-stone-900 text-sm transition-all shadow-sm" 
                        :value="old('name', $user->name)" 
                        required 
                        autofocus 
                        autocomplete="name" 
                    />
                </div>
                <x-input-error class="mt-1" :messages="$errors->get('name')" />
            </div>

            <!-- Email Field -->
            <div class="space-y-1.5">
                <x-input-label for="email" :value="__('Email Address')" class="text-xs font-semibold uppercase tracking-wider text-stone-500" />
                <div class="relative flex items-center">
                    <span class="absolute left-4 text-stone-400 text-sm">✉️</span>
                    <x-text-input 
                        id="email" 
                        name="email" 
                        type="email" 
                        class="block w-full pl-11 pr-4 py-3.5 rounded-xl bg-stone-50/70 border-stone-200 text-stone-900 focus:bg-white focus:ring-2 focus:ring-stone-400/20 focus:border-stone-900 text-sm transition-all shadow-sm" 
                        :value="old('email', $user->email)" 
                        required 
                        autocomplete="username" 
                    />
                </div>
                <x-input-error class="mt-1" :messages="$errors->get('email')" />
            </div>
        </div>

        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
            <div class="p-4 rounded-xl bg-amber-50 border border-amber-200 text-amber-800 text-xs">
                <p class="font-medium">
                    {{ __('Your email address is unverified.') }}
                    <button form="send-verification" class="underline font-bold hover:text-amber-900 ml-1">
                        {{ __('Click here to re-send verification email.') }}
                    </button>
                </p>

                @if (session('status') === 'verification-link-sent')
                    <p class="mt-1 font-semibold text-emerald-600">
                        {{ __('A new verification link has been sent to your email address.') }}
                    </p>
                @endif
            </div>
        @endif

        <!-- Save Button & Status -->
        <div class="flex items-center justify-between pt-3 border-t border-stone-100 mt-6">
            <div class="flex items-center gap-3">
                <x-primary-button class="py-3 px-6 bg-stone-900 hover:bg-stone-800 active:scale-[0.99] rounded-xl text-xs sm:text-sm font-semibold tracking-wide text-white shadow-md shadow-stone-900/10 transition-all">
                    {{ __('Save Changes') }}
                </x-primary-button>

                @if (session('status') === 'profile-updated')
                    <span
                        x-data="{ show: true }"
                        x-show="show"
                        x-transition
                        x-init="setTimeout(() => show = false, 2000)"
                        class="inline-flex items-center gap-1.5 text-xs font-semibold text-emerald-600 bg-emerald-50 px-3 py-1.5 rounded-lg border border-emerald-100"
                    >
                        ✓ {{ __('Saved successfully.') }}
                    </span>
                @endif
            </div>

            <span class="text-[11px] text-stone-400 font-medium hidden sm:inline-block">
                Secure SSL Encrypted
            </span>
        </div>
    </form>
</section>