<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center gap-2">
            <span class="text-indigo-600">ℹ️</span>
            <h2 class="font-bold text-xl text-gray-800">
                About Us
            </h2>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Hero -->
            <div class="bg-white shadow-sm rounded-2xl border border-gray-100 overflow-hidden">

                <div class="h-1.5 w-full bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500"></div>

                <div class="p-8 sm:p-12 text-center">

                    <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-indigo-50 text-indigo-600 text-xs font-semibold tracking-wide mb-4">
                        <span>✨</span>
                        <span>CAREER PLATFORM</span>
                    </div>

                    <div class="w-16 h-16 mx-auto rounded-2xl bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center text-3xl shadow-lg shadow-indigo-200 mb-5">
                        🚀
                    </div>

                    <h1 class="text-3xl sm:text-4xl font-bold text-gray-800">
                        We're building a better way to find work
                    </h1>

                    <p class="mt-4 text-gray-500 max-w-2xl mx-auto leading-relaxed">
                        Job Finder connects motivated job seekers with employers who are hiring right now — without the noise, the guesswork, or the endless scrolling.
                    </p>

                </div>

            </div>

            <!-- Stats -->
            @php
                $stats = [
                    ['value' => '10K+', 'label' => 'Job Seekers'],
                    ['value' => '2K+', 'label' => 'Employers'],
                    ['value' => '15K+', 'label' => 'Jobs Posted'],
                    ['value' => '6K+', 'label' => 'Hires Made'],
                ];
            @endphp

            <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
                @foreach ($stats as $stat)
                    <div class="bg-white shadow-sm rounded-2xl border border-gray-100 p-6 text-center">
                        <p class="text-2xl font-bold text-indigo-600">{{ $stat['value'] }}</p>
                        <p class="mt-1 text-sm text-gray-500">{{ $stat['label'] }}</p>
                    </div>
                @endforeach
            </div>

            <!-- Mission -->
            <div class="bg-white shadow-sm rounded-2xl border border-gray-100 p-6 sm:p-8">

                <div class="flex items-start gap-4">

                    <div class="w-9 h-9 shrink-0 rounded-xl bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center text-white text-sm shadow-lg shadow-indigo-200">
                        🎯
                    </div>

                    <div>
                        <h3 class="text-base font-bold text-gray-800">
                            Our Mission
                        </h3>

                        <p class="mt-2 text-sm text-gray-600 leading-relaxed">
                            Finding the right job—or the right candidate—shouldn't take months of dead ends.
                            We built Job Finder to make the search faster and fairer through a simple,
                            reliable platform that connects employers with talented people.
                        </p>

                    </div>

                </div>

            </div>

            <!-- Services -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">

                <div class="bg-white shadow-sm rounded-2xl border border-gray-100 p-6 sm:p-8">

                    <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center text-white text-sm shadow-lg shadow-indigo-200 mb-4">
                        👤
                    </div>

                    <h3 class="text-base font-bold text-gray-800">
                        For Job Seekers
                    </h3>

                    <p class="mt-2 text-sm text-gray-600 leading-relaxed">
                        Search jobs, submit applications, upload your CV,
                        and track your applications in one place.
                    </p>

                </div>

                <div class="bg-white shadow-sm rounded-2xl border border-gray-100 p-6 sm:p-8">

                    <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center text-white text-sm shadow-lg shadow-indigo-200 mb-4">
                        🏢
                    </div>

                    <h3 class="text-base font-bold text-gray-800">
                        For Employers
                    </h3>

                    <p class="mt-2 text-sm text-gray-600 leading-relaxed">
                        Create job posts, review applicants,
                        and manage recruitment through one easy dashboard.
                    </p>

                </div>

            </div>

            <!-- Values -->
            @php
                $values = [
                    [
                        'icon' => '🔒',
                        'title' => 'Trust & Security',
                        'desc' => 'Your information is safe and protected.'
                    ],
                    [
                        'icon' => '⚡',
                        'title' => 'Fast Hiring',
                        'desc' => 'Quick applications and faster hiring process.'
                    ],
                    [
                        'icon' => '🤝',
                        'title' => 'Fair Opportunities',
                        'desc' => 'Equal opportunities for every candidate.'
                    ],
                ];
            @endphp

            <div class="bg-white shadow-sm rounded-2xl border border-gray-100 p-6 sm:p-8">

                <h3 class="text-base font-bold text-gray-800 mb-5">
                    What We Value
                </h3>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">

                    @foreach ($values as $value)

                        <div>
                            <span class="text-xl">{{ $value['icon'] }}</span>

                            <h4 class="mt-2 text-sm font-semibold text-gray-800">
                                {{ $value['title'] }}
                            </h4>

                            <p class="mt-1 text-sm text-gray-500">
                                {{ $value['desc'] }}
                            </p>
                        </div>

                    @endforeach

                </div>

            </div>

            <!-- CTA -->
            <div class="rounded-2xl bg-gradient-to-r from-indigo-500 to-purple-600 p-8 sm:p-10 text-center shadow-lg shadow-indigo-200">

                <h3 class="text-2xl font-bold text-white">
                    Ready to get started?
                </h3>

                <p class="mt-2 text-indigo-100">
                    Join thousands of job seekers and employers already using Job Finder.
                </p>

            </div>

        </div>
    </div>

</x-app-layout>
