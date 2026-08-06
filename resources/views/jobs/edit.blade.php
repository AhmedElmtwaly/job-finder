<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-indigo-900 leading-tight flex items-center gap-2">
            <span>✨</span> {{ __('Edit Job Opportunity') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white/95 backdrop-blur-md shadow-2xl sm:rounded-3xl p-8 border border-indigo-100 relative overflow-hidden">
                
                <!-- Background Creative Glow -->
                <div class="absolute -top-24 -right-24 w-96 h-96 bg-indigo-100 rounded-full blur-3xl pointer-events-none opacity-50"></div>

                <div class="mb-8 pb-4 border-b border-gray-100 flex justify-between items-center relative z-10">
                    <div>
                        <h3 class="text-xl font-extrabold text-gray-900">Update Job Information</h3>
                        <p class="text-sm text-gray-500 mt-1">Modify the details of your listing to keep candidates well-informed.</p>
                    </div>

                    <!-- Creative Delete Button (Top Right) -->
                    <form action="{{ route('company.jobs.destroy', $job->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this job?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="group flex items-center gap-2 px-4 py-2 bg-rose-50 hover:bg-rose-600 text-rose-600 hover:text-white text-sm font-semibold rounded-xl transition-all duration-300 shadow-sm hover:shadow-md border border-rose-100 hover:border-rose-600">
                            <svg class="w-4 h-4 transition-transform group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                            <span>Delete Job</span>
                        </button>
                    </form>
                </div>

                <form method="POST" action="{{ route('company.jobs.update', $job->id) }}" enctype="multipart/form-data" class="space-y-6 relative z-10">
                    @csrf
                    @method('PUT')

                    <!-- Job Title -->
                    <div>
                        <label for="title" class="block font-semibold text-sm text-gray-700 mb-2">Job Title</label>
                        <input type="text" name="title" id="title" value="{{ old('title', $job->title) }}" class="w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm py-3 px-4 transition" required>
                        @error('title') <span class="text-rose-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <!-- Company Name & Location -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="company_name" class="block font-semibold text-sm text-gray-700 mb-2">Company Name</label>
                            <input type="text" name="company_name" id="company_name" value="{{ old('company_name', $job->company_name) }}" class="w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm py-3 px-4 transition" required>
                            @error('company_name') <span class="text-rose-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label for="location" class="block font-semibold text-sm text-gray-700 mb-2">Location</label>
                            <input type="text" name="location" id="location" value="{{ old('location', $job->location) }}" class="w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm py-3 px-4 transition" required>
                            @error('location') <span class="text-rose-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <!-- Salary & Image Upload Section -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-start">
                        <div>
                            <label for="salary" class="block font-semibold text-sm text-gray-700 mb-2">Salary (Optional)</label>
                            <input type="text" name="salary" id="salary" value="{{ old('salary', $job->salary) }}" class="w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm py-3 px-4 transition" placeholder="e.g. $2000 / month">
                            @error('salary') <span class="text-rose-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                        </div>

                        <!-- Image Field + Live Preview -->
                        <div>
                            <label for="image" class="block font-semibold text-sm text-gray-700 mb-2">Job Image / Logo (Optional)</label>
                            <input type="file" name="image" id="imageInput" accept="image/*" class="w-full text-sm text-gray-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100 cursor-pointer">
                            @error('image') <span class="text-rose-500 text-xs mt-1 block">{{ $message }}</span> @enderror

                            <!-- Preview Area -->
                            <div class="mt-4 flex items-center gap-4">
                                @if($job->image)
                                    <div class="text-center">
                                        <span class="block text-xs text-gray-400 mb-1">Current</span>
                                        <img src="{{ asset('storage/' . $job->image) }}" alt="Current Image" class="w-16 h-16 object-cover rounded-xl border-2 border-indigo-100 shadow-sm">
                                    </div>
                                @endif
                                
                                <div id="newImagePreviewContainer" class="hidden text-center">
                                    <span class="block text-xs text-indigo-600 font-semibold mb-1">New Preview</span>
                                    <img id="imagePreview" src="#" alt="Preview" class="w-16 h-16 object-cover rounded-xl border-2 border-indigo-500 shadow-md">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Description -->
                    <div>
                        <label for="description" class="block font-semibold text-sm text-gray-700 mb-2">Job Description</label>
                        <textarea name="description" id="description" rows="5" class="w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm p-4 transition" required>{{ old('description', $job->description) }}</textarea>
                        @error('description') <span class="text-rose-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <!-- Creative Action Buttons (Update & Cancel) -->
                    <div class="flex items-center justify-end gap-4 pt-6 border-t border-gray-100">
                        <a href="{{ route('company.jobs.index') }}" class="px-6 py-3 rounded-xl text-gray-600 hover:text-gray-900 font-semibold transition hover:bg-gray-100">
                            Cancel
                        </a>
                        <button type="submit" class="relative group overflow-hidden rounded-xl bg-indigo-600 px-8 py-3.5 text-white font-bold shadow-lg shadow-indigo-200 transition-all duration-300 hover:bg-indigo-700 hover:shadow-indigo-300 hover:-translate-y-0.5 active:translate-y-0">
                            <span class="relative z-10 flex items-center gap-2">
                                <svg class="w-5 h-5 transition-transform group-hover:rotate-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path></svg>
                                Save Changes
                            </span>
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- JavaScript for Live Image Preview -->
    <script>
        document.getElementById('imageInput').addEventListener('change', function(event) {
            const [file] = event.target.files;
            if (file) {
                const previewContainer = document.getElementById('newImagePreviewContainer');
                const previewImage = document.getElementById('imagePreview');
                
                previewImage.src = URL.createObjectURL(file);
                previewContainer.classList.remove('hidden');
            }
        });
    </script>
</x-app-layout>