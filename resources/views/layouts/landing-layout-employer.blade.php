@include('components.site-ui.skeleton.head')
@include('components.site-ui.skeleton.loader')
@include('components.site-ui.skeleton.navbar')


<div class="flex">
    <div class="sidebar">
        <ul class="menu">

            <li><a href="{{route('post-job')}}">Post A Job</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Contact</a></li>
            <li><a href="{{route('employer-profile')}}">Profile</a></li>
        </ul>
    </div>

    <div class="content">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('front-end-components')
    </div>
</div>


@include('components.site-ui.skeleton.footer')
@include('components.site-ui.skeleton.scripts')




























