<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
    <a href="index.html" class="navbar-brand d-flex align-items-center text-center py-0 px-4 px-lg-5">
        <h1 class="m-0 text-primary">JobEntry</h1>
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            <a href="{{route('home')}}" class="nav-item nav-link active">Home</a>
            <a href="{{route('about')}}" class="nav-item nav-link">About</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Jobs</a>
                <div class="dropdown-menu rounded-0 m-0">
                    <a href="{{route('job-category')}}" class="dropdown-item">Job Category</a>
                    <a href="{{route('job-list')}}" class="dropdown-item">Job List</a>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                <div class="dropdown-menu rounded-0 m-0">

                    <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                    <a href="404.html" class="dropdown-item">404</a>
                </div>
            </div>
            <a href="{{route('contact')}}" class="nav-item nav-link">Contact</a>

            @if (!empty($authUser))
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">{{$authUser->userEmail}}</a>
                    <div class="dropdown-menu rounded-0 m-0">
                        <a href="" class="dropdown-item">Profile</a>
                        <a href="{{route('logout')}}" class="dropdown-item">Logout</a>
                    </div>
                </div>

            @else
                <a href="#" class="nav-item nav-link" data-toggle="modal" data-target="#loginModal">Login/Register</a>
            @endif


        </div>
        <a href="" class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block">Post A Job<i
                class="fa fa-arrow-right ms-3"></i></a>


{{--        @if($currentUser && is_object($currentUser))--}}
{{--            --}}{{-- User is authenticated --}}
{{--            <p>Welcome, {{ $currentUser->userEmail }}!</p>--}}
{{--        @else--}}
{{--            --}}{{-- User is not authenticated --}}
{{--            <p>Welcome, guest! Please log in.</p>--}}
{{--        @endif--}}


    </div>
</nav>
<!-- Navbar End -->


<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Select Your Role</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body login-type-modal">
                <!-- Job Seeker logo and selection -->
                <div class="text-center">
                    <a href="{{route('applicant.login')}}">
                        <i class="fa fa-3x fa-user text-primary m-2"></i>
                        <p>Applicant</p>
                        <button class="btn btn-primary">Select as Applicant</button>
                    </a>
                </div>

                <!-- Employer logo and selection -->
                <div class="text-center">
                    <a href="{{route('employer.login')}}">
                        <i class="fa fa-3x fa-user-tie text-primary m-2"></i>
                        <p>Employer</p>
                        <button class="btn btn-primary">Select as Employer</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
