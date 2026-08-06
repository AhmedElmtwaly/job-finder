<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-3 rtl:space-x-reverse">
                <div class="w-3 h-3 bg-gradient-to-r from-indigo-500 to-purple-500 rounded-full animate-ping"></div>
                <h2 class="font-black text-2xl text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 dark:from-indigo-400 dark:via-purple-400 dark:to-pink-400 leading-tight">
                    ⚡ {{ __('Command Center') }}
                </h2>
            </div>
            <div class="hidden sm:flex items-center space-x-2 rtl:space-x-reverse">
                <span class="inline-flex items-center text-xs font-black px-4 py-2 bg-white/80 dark:bg-gray-900/80 text-indigo-600 dark:text-indigo-400 rounded-2xl border border-indigo-100 dark:border-indigo-900 shadow-sm backdrop-blur-md">
                    <span class="w-2 h-2 rounded-full bg-emerald-500 mr-2 rtl:ml-2"></span>
                    System Online
                </span>
            </div>
        </div>
    </x-slot>

    <div class="py-12 bg-slate-50/50 dark:bg-gray-950 min-h-screen transition-colors duration-500 relative overflow-hidden">
        
        <!-- خلفيات إضاءة خلفية متحركة (Ambient Glows) -->
        <div class="absolute top-0 left-1/4 w-[500px] h-[500px] bg-indigo-500/10 dark:bg-indigo-600/10 rounded-full blur-[120px] pointer-events-none"></div>
        <div class="absolute bottom-10 right-1/4 w-[500px] h-[500px] bg-purple-500/10 dark:bg-purple-600/10 rounded-full blur-[120px] pointer-events-none"></div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8 relative z-10">
            
            <!-- Hero Welcome Card الفخم -->
            <div class="glass-card overflow-hidden shadow-2xl sm:rounded-3xl p-8 sm:p-10 relative transition-all duration-500 hover:shadow-indigo-500/15 group border border-white/60 dark:border-gray-800/80">
                <div class="absolute -right-12 -top-12 w-72 h-72 bg-gradient-to-br from-indigo-500/20 via-purple-500/20 to-pink-500/20 rounded-full blur-3xl group-hover:scale-125 transition-transform duration-700 pointer-events-none"></div>
                
                <div class="relative z-10 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">
                    <div class="space-y-3">
                        <div class="inline-flex items-center space-x-2 rtl:space-x-reverse px-3 py-1 rounded-xl bg-indigo-50 dark:bg-indigo-950/60 text-indigo-600 dark:text-indigo-400 text-xs font-black uppercase tracking-wider border border-indigo-100 dark:border-indigo-800/40">
                            <span>✨ Career Dashboard Hub</span>
                        </div>
                        <h3 class="text-3xl sm:text-4xl font-black text-gray-900 dark:text-white tracking-tight">
                            Welcome back, <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-purple-600 dark:from-indigo-400 dark:to-purple-400">{{ auth()->user()->name }}</span> 🚀
                        </h3>
                        <p class="text-sm sm:text-base text-gray-600 dark:text-gray-400 max-w-2xl leading-relaxed">
                            Monitor your professional metrics, track active career milestones, and manage platform interactions seamlessly from one unified hub.
                        </p>
                    </div>
                    
                    <div class="flex items-center space-x-3 rtl:space-x-reverse self-start lg:self-center">
                        <div class="px-5 py-3 rounded-2xl bg-white/80 dark:bg-gray-900/80 border border-gray-100 dark:border-gray-800 shadow-xl backdrop-blur-md flex items-center space-x-3 rtl:space-x-reverse">
                            <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-indigo-600 to-purple-600 flex items-center justify-center text-white font-black text-lg shadow-md">
                                {{ substr(auth()->user()->name, 0, 1) }}
                            </div>
                            <div>
                                <p class="text-[10px] uppercase font-bold text-gray-400 tracking-wider">Current Role</p>
                                <p class="text-xs font-black text-gray-900 dark:text-white uppercase tracking-wider">{{ auth()->user()->role }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- لوحة تحكم الباحث عن عمل (Seeker Dashboard) -->
            @if(auth()->user()->role === 'seeker')
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    
                    <!-- Available Jobs Card -->
                    <div class="glass-card p-6 sm:p-8 rounded-3xl shadow-xl transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl flex flex-col justify-between group border border-white/60 dark:border-gray-800/80 relative overflow-hidden">
                        <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-indigo-500 to-indigo-600"></div>
                        <div>
                            <div class="flex items-center justify-between mb-6">
                                <div>
                                    <p class="text-xs font-black text-indigo-600 dark:text-indigo-400 uppercase tracking-widest">Opportunities</p>
                                    <h4 class="text-xl font-black text-gray-900 dark:text-white mt-1">Available Jobs</h4>
                                </div>
                                <span class="bg-indigo-50 dark:bg-indigo-950/80 text-indigo-600 dark:text-indigo-400 text-base font-black px-3.5 py-1.5 rounded-2xl shadow-inner border border-indigo-100 dark:border-indigo-900/50">
                                    {{ $jobsCount ?? 0 }}
                                </span>
                            </div>
                            <p class="text-xs text-gray-500 dark:text-gray-400 leading-relaxed">Explore active listings posted by top companies and find your next role.</p>
                        </div>
                        <div class="pt-6 border-t border-gray-100 dark:border-gray-800/80 mt-6 flex items-center justify-between">
                            <a href="{{ route('company.jobs.index') }}" class="inline-flex items-center text-xs font-black text-indigo-600 dark:text-indigo-400 hover:text-indigo-700 transition-all group-hover:translate-x-1">
                                Search Jobs 
                                <svg class="w-4 h-4 ml-1.5 rtl:mr-1.5 rtl:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path></svg>
                            </a>
                            <div class="w-10 h-10 rounded-2xl bg-indigo-50 dark:bg-indigo-950/60 flex items-center justify-center text-indigo-600 dark:text-indigo-400 shadow-sm transition-transform group-hover:scale-110">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            </div>
                        </div>
                    </div>

                    <!-- My Applications Card -->
                    <div class="glass-card p-6 sm:p-8 rounded-3xl shadow-xl transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl flex flex-col justify-between group border border-white/60 dark:border-gray-800/80 relative overflow-hidden">
                        <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-emerald-500 to-teal-600"></div>
                        <div>
                            <div class="flex items-center justify-between mb-6">
                                <div>
                                    <p class="text-xs font-black text-emerald-600 dark:text-emerald-400 uppercase tracking-widest">Activity</p>
                                    <h4 class="text-xl font-black text-gray-900 dark:text-white mt-1">My Applications</h4>
                                </div>
                                <span class="bg-emerald-50 dark:bg-emerald-950/80 text-emerald-600 dark:text-emerald-400 text-base font-black px-3.5 py-1.5 rounded-2xl shadow-inner border border-emerald-100 dark:border-emerald-900/50">
                                    {{ $applicationsCount ?? 0 }}
                                </span>
                            </div>
                            <p class="text-xs text-gray-500 dark:text-gray-400 leading-relaxed">Track the status of your submitted proposals and review history.</p>
                        </div>
                        <div class="pt-6 border-t border-gray-100 dark:border-gray-800/80 mt-6 flex items-center justify-between">
                            <a href="{{ route('applications.index') }}" class="inline-flex items-center text-xs font-black text-emerald-600 dark:text-emerald-400 hover:text-emerald-700 transition-all group-hover:translate-x-1">
                                Track Applications 
                                <svg class="w-4 h-4 ml-1.5 rtl:mr-1.5 rtl:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path></svg>
                            </a>
                            <div class="w-10 h-10 rounded-2xl bg-emerald-50 dark:bg-emerald-950/60 flex items-center justify-center text-emerald-600 dark:text-emerald-400 shadow-sm transition-transform group-hover:scale-110">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                            </div>
                        </div>
                    </div>

                    <!-- Profile Management Card -->
                    <div class="glass-card p-6 sm:p-8 rounded-3xl shadow-xl transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl flex flex-col justify-between group border border-white/60 dark:border-gray-800/80 relative overflow-hidden">
                        <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-blue-500 to-indigo-600"></div>
                        <div>
                            <div class="flex items-center justify-between mb-6">
                                <div>
                                    <p class="text-xs font-black text-blue-600 dark:text-blue-400 uppercase tracking-widest">Settings</p>
                                    <h4 class="text-xl font-black text-gray-900 dark:text-white mt-1">Profile Hub</h4>
                                </div>
                            </div>
                            <p class="text-xs text-gray-500 dark:text-gray-400 leading-relaxed">Update your credentials, portfolio links, and personal information.</p>
                        </div>
                        <div class="pt-6 border-t border-gray-100 dark:border-gray-800/80 mt-6 flex items-center justify-between">
                            <a href="{{ route('profile.edit') }}" class="inline-flex items-center text-xs font-black text-blue-600 dark:text-blue-400 hover:text-blue-700 transition-all group-hover:translate-x-1">
                                Complete Profile 
                                <svg class="w-4 h-4 ml-1.5 rtl:mr-1.5 rtl:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path></svg>
                            </a>
                            <div class="w-10 h-10 rounded-2xl bg-blue-50 dark:bg-blue-950/60 flex items-center justify-center text-blue-600 dark:text-blue-400 shadow-sm transition-transform group-hover:scale-110">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            </div>
                        </div>
                    </div>

                </div>
            @endif

            <!-- لوحة تحكم صاحب العمل (Company Dashboard) -->
            @if(auth()->user()->role === 'company')
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    
                    <!-- My Jobs -->
                    <div class="glass-card p-6 rounded-3xl shadow-xl transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl flex flex-col justify-between group border border-white/60 dark:border-gray-800/80 relative overflow-hidden">
                        <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-indigo-500 to-purple-600"></div>
                        <div>
                            <div class="flex items-center justify-between mb-4">
                                <div>
                                    <p class="text-xs font-black text-indigo-600 dark:text-indigo-400 uppercase tracking-widest">Listings</p>
                                    <h4 class="text-xl font-black text-gray-900 dark:text-white mt-1">My Jobs</h4>
                                </div>
                                <span class="bg-indigo-50 dark:bg-indigo-950/80 text-indigo-600 dark:text-indigo-400 text-sm font-black px-3.5 py-1.5 rounded-2xl shadow-inner border border-indigo-100 dark:border-indigo-900/50">
                                    {{ $jobsCount ?? 0 }}
                                </span>
                            </div>
                        </div>
                        <div class="pt-4 border-t border-gray-100 dark:border-gray-800/80 mt-4 flex items-center justify-between">
                            <a href="{{ route('company.jobs.index') }}" class="inline-flex items-center text-xs font-black text-indigo-600 dark:text-indigo-400 hover:text-indigo-700 transition-all group-hover:translate-x-1">
                                Manage Jobs 
                                <svg class="w-4 h-4 ml-1.5 rtl:mr-1.5 rtl:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path></svg>
                            </a>
                            <div class="w-9 h-9 rounded-xl bg-indigo-50 dark:bg-indigo-950/60 flex items-center justify-center text-indigo-600 dark:text-indigo-400 shadow-sm">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            </div>
                        </div>
                    </div>

                    <!-- Total Applications -->
                    <div class="glass-card p-6 rounded-3xl shadow-xl transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl flex flex-col justify-between group border border-white/60 dark:border-gray-800/80 relative overflow-hidden">
                        <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-blue-500 to-indigo-600"></div>
                        <div>
                            <div class="flex items-center justify-between mb-4">
                                <div>
                                    <p class="text-xs font-black text-blue-600 dark:text-blue-400 uppercase tracking-widest">Candidates</p>
                                    <h4 class="text-xl font-black text-gray-900 dark:text-white mt-1">Applications</h4>
                                </div>
                                <span class="bg-blue-50 dark:bg-blue-950/80 text-blue-600 dark:text-blue-400 text-sm font-black px-3.5 py-1.5 rounded-2xl shadow-inner border border-blue-100 dark:border-blue-900/50">
                                    {{ $applicationsCount ?? 0 }}
                                </span>
                            </div>
                        </div>
                        <div class="pt-4 border-t border-gray-100 dark:border-gray-800/80 mt-4 flex items-center justify-between">
                            <a href="{{ route('company.applicants.index') }}" class="inline-flex items-center text-xs font-black text-blue-600 dark:text-blue-400 hover:text-blue-700 transition-all group-hover:translate-x-1">
                                View Submissions 
                                <svg class="w-4 h-4 ml-1.5 rtl:mr-1.5 rtl:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path></svg>
                            </a>
                            <div class="w-9 h-9 rounded-xl bg-blue-50 dark:bg-blue-950/60 flex items-center justify-center text-blue-600 dark:text-blue-400 shadow-sm">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                            </div>
                        </div>
                    </div>

                    <!-- Pending -->
                    <div class="glass-card p-6 rounded-3xl shadow-xl transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl flex flex-col justify-between group border border-white/60 dark:border-gray-800/80 relative overflow-hidden">
                        <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-amber-500 to-orange-500"></div>
                        <div>
                            <div class="flex items-center justify-between mb-4">
                                <div>
                                    <p class="text-xs font-black text-amber-600 dark:text-amber-400 uppercase tracking-widest">Queue</p>
                                    <h4 class="text-xl font-black text-gray-900 dark:text-white mt-1">Pending Review</h4>
                                </div>
                                <span class="bg-amber-50 dark:bg-amber-950/80 text-amber-600 dark:text-amber-400 text-sm font-black px-3.5 py-1.5 rounded-2xl shadow-inner border border-amber-100 dark:border-amber-900/50">
                                    {{ $pendingCount ?? 0 }}
                                </span>
                            </div>
                        </div>
                        <div class="pt-4 border-t border-gray-100 dark:border-gray-800/80 mt-4 flex items-center justify-between">
                            <span class="text-xs font-bold text-gray-500 dark:text-gray-400">Awaiting action</span>
                            <div class="w-9 h-9 rounded-xl bg-amber-50 dark:bg-amber-950/60 flex items-center justify-center text-amber-600 dark:text-amber-400 shadow-sm">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                        </div>
                    </div>

                    <!-- Accepted -->
                    <div class="glass-card p-6 rounded-3xl shadow-xl transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl flex flex-col justify-between group border border-white/60 dark:border-gray-800/80 relative overflow-hidden">
                        <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-emerald-500 to-teal-500"></div>
                        <div>
                            <div class="flex items-center justify-between mb-4">
                                <div>
                                    <p class="text-xs font-black text-emerald-600 dark:text-emerald-400 uppercase tracking-widest">Hires</p>
                                    <h4 class="text-xl font-black text-gray-900 dark:text-white mt-1">Accepted</h4>
                                </div>
                                <span class="bg-emerald-50 dark:bg-emerald-950/80 text-emerald-600 dark:text-emerald-400 text-sm font-black px-3.5 py-1.5 rounded-2xl shadow-inner border border-emerald-100 dark:border-emerald-900/50">
                                    {{ $acceptedCount ?? 0 }}
                                </span>
                            </div>
                        </div>
                        <div class="pt-4 border-t border-gray-100 dark:border-gray-800/80 mt-4 flex items-center justify-between">
                            <span class="text-xs font-bold text-gray-500 dark:text-gray-400">Approved candidates</span>
                            <div class="w-9 h-9 rounded-xl bg-emerald-50 dark:bg-emerald-950/60 flex items-center justify-center text-emerald-600 dark:text-emerald-400 shadow-sm">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            </div>
                        </div>
                    </div>

                </div>
            @endif

        </div>
    </div>
</x-app-layout>