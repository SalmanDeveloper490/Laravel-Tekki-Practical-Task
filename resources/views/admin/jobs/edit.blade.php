<x-admin-layout>

    @section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">


            <div class="col-md-10">
                <a href="{{ route('admin.dashboard') }}" class="btn btn-primary mb-3" class="d-block my-2" style="width:fit-content;">Back</a>
                <div class="card">

                    <div class="card-header">Update Job</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.jobs.update',$job->id) }}">
                            @method('PUT')
                            @csrf

                            <div class="form-group mt-2">
                                <label for="title">Title</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ $job->title }}" required autofocus>

                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group mt-2">
                                <label for="description">Description</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3" required>{{ $job->description }}</textarea>

                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group mt-2">
                                <label for="qualification">Qualification</label>
                                <textarea class="form-control @error('qualification') is-invalid @enderror" id="qualification" name="qualification" rows="3" required>{{ $job->qualification }}</textarea>

                                @error('qualification')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group mt-2">
                                <label for="no_of_openings">No of Openings</label>
                                <input type="number" class="form-control @error('no_of_openings') is-invalid @enderror" id="no_of_openings" name="no_of_openings" value="{{ $job->no_of_openings }}" required>

                                @error('no_of_openings')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group mt-2">
                                <label for="dept">Dept</label>
                                <input type="text" class="form-control @error('dept') is-invalid @enderror" id="dept" name="dept" value="{{ $job->dept }}" required>

                                @error('dept')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group mt-2">
                                <label for="salary">Salary</label>
                                <input type="number" class="form-control @error('salary') is-invalid @enderror" id="salary" name="salary" value="{{ $job->salary }}" required>

                                @error('salary')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary mt-2">Update Job</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
</x-admin-layout>
