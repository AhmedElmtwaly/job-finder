<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-bold text-2xl text-gray-900 leading-tight">
                {{ __('✏️ Edit Job Application') }}
            </h2>
            <a href="{{ route('applications.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-200 border border-transparent rounded-xl font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-300 transition ease-in-out duration-150">
                &larr; Back to Applications
            </a>
        </div>
    </x-slot>

    <!-- خلفية الصفحة متدرجة وأنيقة -->
    <div class="py-12 bg-gradient-to-br from-indigo-50 via-purple-50 to-pink-50 min-h-screen">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white/80 backdrop-blur-md overflow-hidden shadow-xl sm:rounded-2xl border border-white/20 p-8 sm:p-10 transition-all duration-300 hover:shadow-2xl">
                
                <form action="{{ route('applications.update', $application->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <!-- Name -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Full Name</label>
                        <div class="relative">
                            <input type="text" name="name" value="{{ old('name', $application->name) }}" required 
                                class="block w-full rounded-xl border-gray-300 bg-gray-50/50 focus:bg-white shadow-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 text-gray-800 transition-all py-3 px-4">
                        </div>
                    </div>

                    <!-- Email -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Email Address</label>
                        <div class="relative">
                            <input type="email" name="email" value="{{ old('email', $application->email) }}" required 
                                class="block w-full rounded-xl border-gray-300 bg-gray-50/50 focus:bg-white shadow-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 text-gray-800 transition-all py-3 px-4">
                        </div>
                    </div>

                    <!-- Phone -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Phone Number</label>
                        <div class="relative">
                            <input type="text" name="phone" value="{{ old('phone', $application->phone) }}" required 
                                class="block w-full rounded-xl border-gray-300 bg-gray-50/50 focus:bg-white shadow-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 text-gray-800 transition-all py-3 px-4">
                        </div>
                    </div>

                    <!-- CV File -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Update CV (PDF) - Leave blank if you don't want to change it</label>
                        <div class="flex items-center justify-center w-full">
                            <label class="flex flex-col items-center justify-center w-full h-32 border-2 border-indigo-300 border-dashed rounded-xl cursor-pointer bg-indigo-50/30 hover:bg-indigo-50/60 transition-all">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <svg class="w-8 h-8 mb-3 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                                    <p class="mb-2 text-sm text-gray-600"><span class="font-semibold text-indigo-600">Click to upload</span> or drag and drop</p>
                                    <p class="text-xs text-gray-500">PDF (MAX. 2MB)</p>
                                </div>
                                <input type="file" name="cv" accept=".pdf" class="hidden" />
                            </label>
                        </div>

                        @if($application->cv_path)
                            <div class="mt-3 flex items-center justify-between bg-indigo-50/50 p-3 rounded-xl border border-indigo-100">
                                <span class="text-xs text-gray-600 font-medium">📄 Current CV uploaded</span>
                                <a href="{{ asset('storage/' . $application->cv_path) }}" target="_blank" class="text-xs font-bold text-indigo-600 hover:text-indigo-800 underline">
                                    View Current CV
                                </a>
                            </div>
                        @endif
                    </div>

                    <!-- Submit Button -->
                    <div class="flex items-center justify-end pt-4 border-t border-gray-100">
                        <button type="submit" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-indigo-600 to-purple-600 border border-transparent rounded-xl font-semibold text-xs text-white uppercase tracking-widest hover:from-indigo-700 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-all shadow-lg shadow-indigo-500/30">
                            ✨ Update Application
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>