<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Apply Job') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
            @endif
            <h1 class="fs-2 text-uppercase mb-4">JOB TITLE: {{$job->title}}</h1>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{route("job.apply",$job->id)}}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Upload Resume</label>
                            <input type="file" class="form-control" name="resume" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Apply Job</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
