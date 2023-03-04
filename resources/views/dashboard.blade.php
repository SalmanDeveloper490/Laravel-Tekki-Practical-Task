<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <a href="{{route('applied.jobs')}}" class="btn btn-primary mb-4">See Applied Jobs</a>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 text-gray-900">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Qualification</th>
                                <th>No of Openings</th>
                                <th>Dept</th>
                                <th>Salary</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($jobs as $job)
                            <tr>
                                {{-- <td>{{ $job->id }}</td> --}}
                                <td>{{ $job->title }}</td>
                                <td>{{ $job->description }}</td>
                                <td>{{ $job->qualification }}</td>
                                <td>{{ $job->no_of_openings }}</td>
                                <td>{{ $job->dept }}</td>
                                <td>{{ $job->salary }}</td>
                                <td>
                                    <a href="{{route('apply.job',$job->id)}}" class="btn btn-primary">Apply Job</a>
                                    {{-- <form method="POST" action="#">
                                        @csrf
                                        <input type="hidden" name="job_id" value="{{ $job->id }}">
                                    <button type="submit" class="btn btn-primary">Apply Job</button>
                                    </form> --}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $jobs->links() }}
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
