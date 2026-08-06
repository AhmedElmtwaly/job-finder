<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="text-3xl font-bold text-gray-800">
                    Manage Jobs
                </h2>
                <p class="text-xs text-gray-500 mt-0.5">عرض وإدارة جميع الوظائف المتاحة في المنصة بشكل احترافي</p>
            </div>
            <a href="{{ route('company.jobs.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2.5 rounded-xl text-sm font-semibold transition shadow-md shadow-indigo-100 flex items-center gap-2">
                <span>➕</span> Add New Job
            </a>
        </div>
    </x-slot>

    <div class="py-10 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @if(session('success'))
                <div class="mb-6 bg-green-50 border border-green-200 text-green-700 px-5 py-4 rounded-xl shadow-sm">
                    {{ session('success') }}
                </div>
            @endif

            <!-- شبكة الكروت (Grid) -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                
                @forelse($jobs as $job)
                    <div class="bg-white rounded-2xl border border-gray-100 p-6 shadow-xl flex flex-col justify-between hover:border-indigo-200 transition-all duration-300">
                        
                        <!-- القسم العلوي: العنوان، الشركة، والوصف -->
                        <div>
                            <!-- اسم الوظيفة والشركة -->
                            <div class="mb-3">
                                <div class="flex items-start justify-between gap-2">
                                    <h3 class="text-lg font-bold text-gray-900 tracking-tight line-clamp-1">{{ $job->title }}</h3>
                                    @if($job->salary)
                                        <span class="text-[11px] text-emerald-600 font-bold bg-emerald-50 px-2.5 py-0.5 rounded-full shrink-0 border border-emerald-100">{{ $job->salary }}</span>
                                    @endif
                                </div>
                                <p class="text-xs text-gray-500 font-semibold mt-0.5">{{ $job->company_name ?? 'N/A' }}</p>
                                <div class="w-10 h-0.5 bg-amber-400 rounded-full mt-2"></div>
                            </div>

                            <!-- وصف الوظيفة -->
                            <p class="text-xs text-gray-600 line-clamp-3 mb-5 leading-relaxed">
                                "{{ $job->description }}"
                            </p>
                        </div>

                        <!-- القسم السفلي: الصورة في المربع -->
                        <div class="mb-5">
                            <div class="w-full h-44 rounded-xl bg-gray-100 border border-gray-200 overflow-hidden shadow-inner flex items-center justify-center relative">
                                @if($job->image)
                                    <img src="{{ asset('storage/' . $job->image) }}" alt="Job Image" class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full bg-indigo-50 text-indigo-500 flex items-center justify-center text-3xl">
                                        💼
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- الأزرار بالأسفل (Apply, Edit, Delete) -->
                        <div class="pt-4 border-t border-gray-100 flex items-center justify-between gap-2">
                            <!-- زر Apply -->
                            <a href="{{ route('jobs.apply', $job->id) }}" class="flex-1 py-2 px-3 bg-indigo-50 hover:bg-indigo-600 text-indigo-600 hover:text-white rounded-xl text-xs font-bold text-center border border-indigo-200 transition-all shadow-sm">
                                🚀 Apply
                            </a>

                            <!-- أزرار التعديل والحذف -->
                            <div class="flex items-center gap-1.5">
                                <a href="{{ route('company.jobs.edit', $job->id) }}" class="p-2 bg-amber-50 hover:bg-amber-500 text-amber-600 hover:text-white rounded-xl text-xs border border-amber-200 transition-all shadow-sm" title="Edit">
                                    ✏️
                                </a>
                                <form action="{{ route('company.jobs.destroy', $job->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this job?');" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-2 bg-rose-50 hover:bg-rose-600 text-rose-600 hover:text-white rounded-xl text-xs border border-rose-200 transition-all shadow-sm cursor-pointer" title="Delete">
                                        🗑️
                                    </button>
                                </form>
                            </div>
                        </div>

                    </div>
                @empty
                    <!-- في حالة عدم وجود وظائف -->
                    <div class="col-span-3 bg-white rounded-2xl p-12 text-center border border-gray-100 shadow-sm">
                        <div class="flex flex-col items-center justify-center gap-2">
                            <span class="text-3xl">📭</span>
                            <p class="text-base font-semibold text-gray-600">No jobs found.</p>
                            <a href="{{ route('company.jobs.create') }}" class="text-indigo-600 hover:underline text-sm font-bold mt-1">Click "Add New Job" to create one.</a>
                        </div>
                    </div>
                @endforelse

            </div>

            <!-- روابط الـ Pagination -->
            <div class="mt-8">
                {{ $jobs->links() }}
            </div>

        </div>
    </div>
</x-app-layout>