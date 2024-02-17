<div class="col-lg-12 col-sm-6 wow fadeInUp flex " data-wow-delay="0.1s"
     style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">

    <h3>Edit User - {{$user->firstName}} [{{$user->email}}]
    </h3>


    <form id="save-form" action="{{route('users.update', $user->id)}}" method="post">
        @csrf
        @method('PATCH')
        <div class="modal-body">

            <div class="form-group">
                <label for="exampleInputEmail1">First Name</label>
                <input type="text" class="form-control" id="first_name" name="firstName" value="{{$user->firstName}}"
                       placeholder="First name">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Last Name</label>
                <input type="text" class="form-control" id="last_name" value="{{$user->lastName}}" name="lastName"
                       placeholder="Last name">

            </div>

            {{--            <div class="form-group">--}}
            {{--                <label for="exampleInputEmail1">Email</label>--}}
            {{--                <input type="email" class="form-control" id="email" value="{{$user->email}}" name="email"--}}
            {{--                       placeholder="Email">--}}
            {{--            </div>--}} <!-- can not change primary key -->

            <div class="form-group">
                <label for="exampleInputEmail1">Mobile</label>
                <input type="number" class="form-control" id="mobile" value="{{$user->mobile}}" name="mobile"
                       placeholder="Mobile">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Password</label>
                <input type="password" class="form-control" id="password" name="password"
                       placeholder="Password">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Retype Password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                       placeholder="Retype password">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Roles</label>
                <div class="form-group">
                    @foreach($roles as $role)
                        <div class="form-check">

                            <input type="checkbox" class="form-check-input" id="{{$role}}"
                                   @if(in_array($role, $assignedRoles)) checked @endif
                                   name="assignedRoles[]" value="{{$role}}">
                            <label class="form-check-label" for="{{$role}}">{{$role}}</label>
                        </div>
                    @endforeach
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </div>

    </form>
</div>


