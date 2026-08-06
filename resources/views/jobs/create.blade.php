<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-indigo-900 leading-tight flex items-center gap-2">
            <span>💼</span> {{ __('Post a New Job Opportunity') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white/90 backdrop-blur-md shadow-xl sm:rounded-2xl p-8 border border-indigo-50">
                
                <div class="mb-6 pb-4 border-b border-gray-100">
                    <h3 class="text-lg font-bold text-gray-900">Job Details Form</h3>
                    <p class="text-sm text-gray-500">Fill in the information below to publish your opening to the platform.</p>
                </div>

                <form method="POST" action="{{ route('company.jobs.store') }}" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    <!-- Job Title -->
                    <div>
                        <label for="title" class="block font-semibold text-sm text-gray-700 mb-2">Job Title</label>
                        <input type="text" name="title" id="title" value="{{ old('title') }}" class="w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm py-3 px-4" placeholder="e.g. Senior Backend Developer" required>
                        @error('title') <span class="text-rose-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <!-- Company Name & Location -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="company_name" class="block font-semibold text-sm text-gray-700 mb-2">Company Name</label>
                            <input type="text" name="company_name" id="company_name" value="{{ old('company_name') }}" class="w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm py-3 px-4" placeholder="e.g. Tech Solutions Inc" required>
                            @error('company_name') <span class="text-rose-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label for="location" class="block font-semibold text-sm text-gray-700 mb-2">Location</label>
                            <input type="text" name="location" id="location" value="{{ old('location') }}" class="w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm py-3 px-4" placeholder="e.g. Cairo, Egypt" required>
                            @error('location') <span class="text-rose-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <!-- Salary & Job Image -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="salary" class="block font-semibold text-sm text-gray-700 mb-2">Salary (Optional)</label>
                            <input type="text" name="salary" id="salary" value="{{ old('salary') }}" class="w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm py-3 px-4" placeholder="e.g. $2000 / month">
                            @error('salary') <span class="text-rose-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label for="image" class="block font-semibold text-sm text-gray-700 mb-2">Job Image / Company Logo (Optional)</label>
                            <input type="file" name="image" id="image" class="w-full text-sm text-gray-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100 cursor-pointer">
                            @error('image') <span class="text-rose-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <!-- Description -->
                    <div>
                        <label for="description" class="block font-semibold text-sm text-gray-700 mb-2">Job Description</label>
                        <textarea name="description" id="description" rows="5" class="w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm p-4" placeholder="Describe the role responsibilities, requirements, and tech stack..." required>{{ old('description') }}</textarea>
                        @error('description') <span class="text-rose-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <!-- Submit Button -->
                    <div class="flex items-center justify-end gap-4 pt-4 border-t border-gray-100">
                        <a href="{{ route('dashboard') }}" class="text-gray-600 hover:text-gray-900 font-semibold px-4 py-2">Cancel</a>
                        <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold px-6 py-3 rounded-xl shadow-md transition transform hover:-translate-y-0.5">
                            🚀 Publish Job Now
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>