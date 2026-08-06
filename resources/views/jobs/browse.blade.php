<x-app-layout>
    <x-slot name="header">
        <h2 class="text-3xl font-bold text-gray-800 flex items-center gap-2">
            <span>💼</span> Available Jobs
        </h2>
    </x-slot>

    <div class="py-10 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @if(session('success'))
                <div class="mb-6 bg-green-50 border border-green-200 text-green-700 px-5 py-4 rounded-xl shadow-sm">
                    {{ session('success') }}
                </div>
            @endif

            <!-- شبكة عرض الوظائف على هيئة كروت -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($jobs as $job)
                    <div class="bg-white rounded-2xl p-6 shadow-md hover:shadow-xl border border-gray-100 transition duration-200 flex flex-col justify-between">
                        
                        <div>
                            <!-- Header: صورة الوظيفة واسمها -->
                            <div class="flex items-center gap-4 mb-4">
                                @if($job->image)
                                    <img src="{{ asset('storage/' . $job->image) }}" alt="Job Logo" class="w-14 h-14 rounded-xl object-cover border border-indigo-100 shadow-sm flex-shrink-0">
                                @else
                                    <div class="w-14 h-14 rounded-xl bg-indigo-50 text-indigo-600 font-bold flex items-center justify-center text-xl shadow-inner border border-indigo-100 flex-shrink-0">
                                        💼
                                    </div>
                                @endif

                                <div>
                                    <h3 class="font-bold text-lg text-gray-900 leading-snug">{{ $job->title }}</h3>
                                    <p class="text-xs text-gray-500 font-medium mt-0.5">🏢 {{ $job->company_name ?? 'Company' }}</p>
                                </div>
                            </div>

                            <!-- التفاصيل: المرتب والمدينة -->
                            <div class="flex flex-wrap items-center gap-2 mb-4 text-xs">
                                @if($job->salary)
                                    <span class="bg-emerald-50 text-emerald-600 font-semibold px-2.5 py-1 rounded-lg border border-emerald-100">
                                        💰 {{ $job->salary }}
                                    </span>
                                @endif
                                @if($job->location)
                                    <span class="bg-gray-100 text-gray-600 font-semibold px-2.5 py-1 rounded-lg">
                                        📍 {{ $job->location }}
                                    </span>
                                @endif
                            </div>

                            <!-- الوصف -->
                            <p class="text-gray-600 text-sm line-clamp-3 mb-6 leading-relaxed">
                                {{ $job->description }}
                            </p>
                        </div>

                        <!-- 🚀 زرار التقديم المباشر (Apply Button) -->
                        <div class="pt-4 border-t border-gray-100">
                            <a href="{{ route('jobs.apply', $job->id) }}" class="w-full inline-flex items-center justify-center gap-2 px-5 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-bold rounded-xl text-sm shadow-md shadow-indigo-100 transition-all duration-200 hover:-translate-y-0.5">
                                <span>🚀</span> Apply Now
                            </a>
                        </div>

                    </div>
                @empty
                    <div class="col-span-full bg-white rounded-2xl p-12 text-center border border-gray-100 shadow-sm">
                        <span class="text-4xl block mb-2">📭</span>
                        <h4 class="text-lg font-bold text-gray-700">No jobs available right now.</h4>
                        <p class="text-sm text-gray-400 mt-1">Please check back later!</p>
                    </div>
                @endforelse
            </div>

        </div>
    </div>
</x-app-layout>