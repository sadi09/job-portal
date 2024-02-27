<div class="container">
    <h2>All Jobs</h2>

    @if(count($jobs) > 0)
        <ul class="list-group">
            @foreach($jobs as $job)
                <div class="cat-item rounded p-4">
                    <li class="list-group-item inline-flex space-between">
                        <div>
                            <h4>{{ $job->title }}</h4>
                            <p>Vacancy: {{ $job->vacancy }}</p>
                            <p>Type: {{ $job->type }}</p>
                            <p>Location: {{ $job->location }}</p>
                            {{-- Add more details as needed --}}
                            <div class="inline-flex">
                                <a href="{{ route('jobs.show', $job->id) }}" class="btn btn-primary">View Details</a>
                                <a href="{{ route('jobs.edit', $job->id) }}" class="btn btn-info text-white">Edit
                                    Info</a>
                                <a href="{{ route('jobs.destroy', $job->id) }}"
                                   onclick="return confirm('Are You Sure?')"
                                   class="btn btn-danger">Delete</a>
                            </div>
                        </div>
                        <div class="inline-flex float-right">
                            <a class="cat-item rounded p-4 btn-success text-white" href="">
                                <i class="fa fa-3x fa-user text-white mb-4"></i>
                                <h6 class="mb-3 text-white">Total Applications</h6>
                                <p class="mb-0">123</p>
                            </a>
                            <a class="cat-item rounded p-4 btn-outline-danger" style="border-color: red!important;"
                               href="">
                                <i class="fa fa-3x fa-clock text-red mb-4"></i>
                                <h6 class="mb-3">Time Remaining</h6>
                                <p class="mb-0">{{Carbon\Carbon::parse($job->deadline)->diffForHumans()}}</p>
                            </a>
                        </div>
                    </li>
                </div>
            @endforeach
        </ul>
    @else
        <p>No jobs found.</p>
    @endif
</div>
