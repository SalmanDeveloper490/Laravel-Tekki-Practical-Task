<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Applied Jobs') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Job Title</th>
                                <th>Description</th>
                                <th>Salary</th>
                                <th>Date Applied</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jobApplications as $application)
                            <tr>
                                <td>{{ $application->job->title }}</td>
                                <td>{{ $application->job->description }}</td>
                                <td>{{ $application->job->salary }}</td>
                                <td>{{ $application->created_at->format('d-m-Y') }}</td>
                                <td>{{ $application->status }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
