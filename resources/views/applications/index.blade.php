<x-app-layout>
    <x-slot name="header">
        <h2 class="text-3xl font-bold text-gray-800">
            My Job Applications
        </h2>
    </x-slot>

    <div class="py-10 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @if(session('success'))
                <div class="mb-6 bg-green-50 border border-green-200 text-green-700 px-5 py-4 rounded-xl shadow-sm">
                    {{ session('success') }}
                </div>
            @endif

            <!-- شبكة الكروت (Grid Cards) -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                
                @forelse($applications as $application)
                    <div class="bg-white rounded-2xl border border-gray-100 p-6 shadow-xl flex flex-col justify-between hover:border-indigo-200 transition-all duration-300">
                        
                        <!-- معلومات الطلب الأساسية -->
                        <div>
                            <!-- عنوان الوظيفة والحالة (Status) -->
                            <div class="flex items-start justify-between gap-2 mb-3">
                                <div>
                                    <h3 class="text-lg font-bold text-gray-900 tracking-tight line-clamp-1">{{ $application->job->title ?? 'N/A' }}</h3>
                                    <p class="text-xs text-gray-500 font-semibold mt-0.5">🏢 {{ $application->job->company_name ?? 'N/A' }}</p>
                                </div>
                                <!-- بادج الحالة -->
                                <span class="px-3 py-1 bg-indigo-50 text-indigo-600 rounded-full text-xs font-bold border border-indigo-100 shrink-0">
                                    {{ ucfirst($application->status ?? 'Submitted') }}
                                </span>
                            </div>

                            <div class="w-10 h-0.5 bg-indigo-500 rounded-full mb-4"></div>

                            <!-- تفاصيل المتقدم -->
                            <div class="space-y-2 mb-5 text-xs text-gray-600 bg-gray-50 p-3.5 rounded-xl border border-gray-100">
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-400 font-medium">Applicant:</span>
                                    <span class="font-bold text-gray-800">{{ $application->full_name ?? $application->name ?? 'N/A' }}</span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-400 font-medium">Phone:</span>
                                    <span class="font-bold text-gray-800" dir="ltr">{{ $application->phone ?? 'N/A' }}</span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-400 font-medium">Applied At:</span>
                                    <span class="font-bold text-gray-800">{{ $application->created_at->format('Y-m-d') }}</span>
                                </div>
                            </div>
                        </div>

                        <!-- القسم السفلي: زر الـ CV والأزرار (Edit, Delete) -->
                        <div class="pt-4 border-t border-gray-100 flex items-center justify-between gap-2">
                            <!-- زر عرض الـ CV -->
                            @if($application->cv_path)
                                <a href="{{ asset('storage/' . $application->cv_path) }}" target="_blank" class="flex-1 py-2 px-3 bg-indigo-50 hover:bg-indigo-600 text-indigo-600 hover:text-white rounded-xl text-xs font-bold text-center border border-indigo-200 transition-all shadow-sm flex items-center justify-center gap-1.5">
                                    <span>📄</span> View CV
                                </a>
                            @else
                                <span class="flex-1 py-2 px-3 bg-gray-100 text-gray-400 rounded-xl text-xs font-bold text-center border border-gray-200 cursor-not-allowed">
                                    📄 No CV
                                </span>
                            @endif

                            <!-- أزرار التعديل والحذف -->
                            <div class="flex items-center gap-1.5">
                                <a href="{{ route('applications.edit', $application->id) }}" class="p-2 bg-amber-50 hover:bg-amber-500 text-amber-600 hover:text-white rounded-xl text-xs border border-amber-200 transition-all shadow-sm" title="Edit">
                                    ✏️
                                </a>
                                <form action="{{ route('applications.destroy', $application->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this application?');" class="inline-block">
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
                    <!-- في حالة عدم وجود طلبات -->
                    <div class="col-span-3 bg-white rounded-2xl p-12 text-center border border-gray-100 shadow-sm">
                        <div class="flex flex-col items-center justify-center gap-2">
                            <span class="text-3xl">📭</span>
                            <p class="text-base font-semibold text-gray-600">You haven't applied to any jobs yet.</p>
                        </div>
                    </div>
                @endforelse

            </div>

        </div>
    </div>
</x-app-layout>