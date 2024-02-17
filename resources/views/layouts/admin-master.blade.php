@include('components.admin.structure.head')
@include('components.admin.structure.navbar')
@include('components.admin.structure.main-sidebar')
@include('components.admin.structure.loader')

<div class="content-wrapper">
    <section class="content">
        <div class="card mt-3">
            {{--            <div class="card-header">--}}
            {{--                <h3 class="card-title">Title</h3>--}}
            {{--            </div>--}}
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
            <div class="card-body">
                @yield('dashboard-content')
            </div>
            <!-- /.card-body -->

            <!-- /.card-footer-->
        </div>
    </section>
</div>

@include('components.admin.structure.footer')
@include('components.admin.structure.bottom-scripts')
