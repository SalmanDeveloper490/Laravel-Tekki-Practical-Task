<x-admin-layout>

    @section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Job Listings</div>

                    <div class="card-body">
                        <a href="{{ route('admin.jobs.create') }}" class="btn btn-primary mb-3">Create Job</a>

                        @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    {{-- <th>#</th> --}}
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
                                    <td>{{ $job->salary }}</td> --}}
                                    <td>
                                        <a href="{{ route('admin.jobs.edit', $job->id) }}" class="btn btn-primary btn-sm">Edit</a>

                                        <form action="{{ route('admin.jobs.destroy', $job->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this job?')">Delete</button>
                                        </form>
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
    </div>
    @endsection
</x-admin-layout>
