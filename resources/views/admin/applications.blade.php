<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row justify-between items-center gap-4">
            <div>
                <h2 class="text-3xl font-bold text-gray-800">
                    Applicants Management
                </h2>
                <p class="text-sm text-gray-500 mt-1">
                    Manage job applications and review candidate submissions.
                </p>
            </div>

            <span class="bg-indigo-600 text-white text-sm font-semibold px-4 py-2 rounded-full shadow">
                Total Applications : {{ $applications->count() }}
            </span>
        </div>
    </x-slot>

    <div class="py-10 bg-gradient-to-br from-indigo-50 via-white to-blue-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="mb-6 rounded-xl bg-green-50 border border-green-200 px-5 py-4 flex items-center justify-between shadow-sm">
                    <div>
                        <h3 class="font-semibold text-green-700">
                            Success
                        </h3>

                        <p class="text-green-600 text-sm mt-1">
                            {{ session('success') }}
                        </p>
                    </div>

                    <span class="text-3xl">
                        ✓
                    </span>
                </div>
            @endif

            <!-- Statistics -->

            <div class="grid grid-cols-1 md:grid-cols-4 gap-5 mb-8">

                <div class="bg-white rounded-2xl shadow-md p-6 border-l-4 border-indigo-600">
                    <p class="text-sm text-gray-500">
                        Total
                    </p>

                    <h2 class="text-3xl font-bold text-indigo-700 mt-2">
                        {{ $applications->count() }}
                    </h2>
                </div>

                <div class="bg-white rounded-2xl shadow-md p-6 border-l-4 border-green-500">
                    <p class="text-sm text-gray-500">
                        Accepted
                    </p>

                    <h2 class="text-3xl font-bold text-green-600 mt-2">
                        {{ $applications->where('status','accepted')->count() }}
                    </h2>
                </div>

                <div class="bg-white rounded-2xl shadow-md p-6 border-l-4 border-yellow-500">
                    <p class="text-sm text-gray-500">
                        Pending
                    </p>

                    <h2 class="text-3xl font-bold text-yellow-500 mt-2">
                        {{ $applications->where('status','pending')->count() }}
                    </h2>
                </div>

                <div class="bg-white rounded-2xl shadow-md p-6 border-l-4 border-red-500">
                    <p class="text-sm text-gray-500">
                        Rejected
                    </p>

                    <h2 class="text-3xl font-bold text-red-600 mt-2">
                        {{ $applications->where('status','rejected')->count() }}
                    </h2>
                </div>

            </div>

            <div class="bg-white rounded-3xl shadow-xl overflow-hidden">

                <div class="px-8 py-6 border-b bg-gray-50">

                    <h3 class="text-2xl font-bold text-gray-800">
                        Received Applications
                    </h3>

                    <p class="text-sm text-gray-500 mt-1">
                        Review applicants and update their application status.
                    </p>

                </div>

                <div class="overflow-x-auto">

                    <table class="w-full">

                        <thead class="bg-indigo-600 text-white">

                            <tr>

                                <th class="px-6 py-4 text-left">
                                    #
                                </th>

                                <th class="px-6 py-4 text-left">
                                    Applicant
                                </th>

                                <th class="px-6 py-4 text-left">
                                    Job Title
                                </th>

                                <th class="px-6 py-4 text-left">
                                    Contact
                                </th>

                                <th class="px-6 py-4 text-left">
                                    Resume
                                </th>

                                <th class="px-6 py-4 text-left">
                                    Status
                                </th>

                                <th class="px-6 py-4 text-left">
                                    Action
                                </th>

                                <th class="px-6 py-4 text-left">
                                    Applied
                                </th>

                            </tr>

                        </thead>

                        <tbody class="divide-y divide-gray-100">
                            @forelse($applications as $app)

<tr class="hover:bg-indigo-50 transition-all duration-300">

    <td class="px-6 py-5 font-semibold text-gray-500">
        {{ $loop->iteration }}
    </td>

    <td class="px-6 py-5">
        <div>
            <h4 class="font-bold text-gray-800">
                {{ $app->name }}
            </h4>

            <p class="text-sm text-gray-500">
                Applicant
            </p>
        </div>
    </td>

    <td class="px-6 py-5">
        <span class="font-semibold text-indigo-700">
            {{ $app->job->title ?? 'N/A' }}
        </span>
    </td>

    <td class="px-6 py-5">

        <div class="space-y-1">

            <p class="text-sm text-gray-700">
                {{ $app->email }}
            </p>

            <p class="text-sm text-gray-500">
                {{ $app->phone }}
            </p>

        </div>

    </td>

    <td class="px-6 py-5">

        <a
            href="{{ asset('storage/' . $app->cv_path) }}"
            target="_blank"
            class="inline-flex items-center bg-red-600 hover:bg-red-700 text-white text-sm font-semibold px-4 py-2 rounded-lg transition">

            Download CV

        </a>

    </td>

    <td class="px-6 py-5">

        @if($app->status == 'accepted')

            <span class="px-3 py-1 rounded-full text-xs font-bold bg-green-100 text-green-700">
                Accepted
            </span>

        @elseif($app->status == 'rejected')

            <span class="px-3 py-1 rounded-full text-xs font-bold bg-red-100 text-red-700">
                Rejected
            </span>

        @else

            <span class="px-3 py-1 rounded-full text-xs font-bold bg-yellow-100 text-yellow-700">
                Pending
            </span>

        @endif

    </td>

    <td class="px-6 py-5">

        <form
            action="{{ route('company.applications.status', $app->id) }}"
            method="POST">

            @csrf
            @method('PATCH')

            <select
                name="status"
                onchange="this.form.submit()"
                class="border rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-indigo-400">

                <option value="pending"
                    {{ $app->status == 'pending' ? 'selected' : '' }}>
                    Pending
                </option>

                <option value="accepted"
                    {{ $app->status == 'accepted' ? 'selected' : '' }}>
                    Accepted
                </option>

                <option value="rejected"
                    {{ $app->status == 'rejected' ? 'selected' : '' }}>
                    Rejected
                </option>

            </select>

        </form>

    </td>

    <td class="px-6 py-5 text-sm text-gray-500">
        {{ $app->created_at->format('d M Y') }}
        <br>
        <span class="text-xs text-gray-400">
            {{ $app->created_at->diffForHumans() }}
        </span>
    </td>

</tr>

@empty

<tr>

    <td colspan="8" class="py-20 text-center">

        <div class="flex flex-col items-center">

            <div class="text-6xl mb-4">
                📭
            </div>

            <h3 class="text-xl font-bold text-gray-700">
                No Applications Found
            </h3>

            <p class="text-gray-500 mt-2">
                Applications will appear here once candidates apply.
            </p>

        </div>

    </td>

</tr>

@endforelse
                        </tbody>
                    </table>
                </div>

                {{-- Pagination --}}
                @if(method_exists($applications, 'links'))
                    <div class="px-6 py-5 border-t bg-gray-50">
                        {{ $applications->links() }}
                    </div>
                @endif

            </div>
        </div>
    </div>
</x-app-layout>