<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-indigo-900 leading-tight">
            📝 Apply for: {{ $job->title ?? 'Job Opportunity' }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white/90 backdrop-blur-md shadow-xl sm:rounded-2xl p-8 border border-indigo-50">
                
                <!-- Job Summary Section -->
                <div class="mb-6 pb-4 border-b border-gray-100">
                    <h3 class="text-xl font-bold text-gray-900">{{ $job->company_name ?? 'Company' }}</h3>
                    <p class="text-sm text-gray-500 mt-1">📍 {{ $job->location ?? 'N/A' }} | 💰 {{ $job->salary ?? 'Not Specified' }}</p>
                </div>

                <!-- Application Form -->
                <form action="{{ route('jobs.store.application', $job->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    <!-- Full Name -->
                    <div>
                        <label class="block font-semibold text-sm text-gray-700 mb-2">Full Name</label>
                        <input type="text" name="name" value="{{ old('name', auth()->user()->name ?? '') }}" required placeholder="e.g. Ahmed El-Metwally" class="w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm py-3 px-4">
                        @error('name') <span class="text-rose-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <!-- Email & Phone Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block font-semibold text-sm text-gray-700 mb-2">Email Address</label>
                            <input type="email" name="email" value="{{ old('email', auth()->user()->email ?? '') }}" required placeholder="name@example.com" class="w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm py-3 px-4">
                            @error('email') <span class="text-rose-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label class="block font-semibold text-sm text-gray-700 mb-2">Phone Number</label>
                            <input type="text" name="phone" value="{{ old('phone') }}" required placeholder="010xxxxxxxx" class="w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm py-3 px-4">
                            @error('phone') <span class="text-rose-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <!-- Upload CV (PDF Only) -->
                    <div>
                        <label class="block font-semibold text-sm text-gray-700 mb-2">Upload CV (PDF Only)</label>
                        <input type="file" name="cv" accept=".pdf" required class="w-full text-sm text-gray-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100 cursor-pointer">
                        @error('cv') <span class="text-rose-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <!-- Buttons -->
                    <div class="flex items-center justify-end gap-4 pt-4 border-t border-gray-100">
                        <a href="{{ route('dashboard') }}" class="text-gray-600 hover:text-gray-900 font-semibold px-4 py-2">Cancel</a>
                        <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold px-6 py-3 rounded-xl shadow-md transition transform hover:-translate-y-0.5">
                            🚀 Submit Application
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>