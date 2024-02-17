<div class="modal fade" id="modal-default" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add User</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form id="save-form" action="{{route('users.store')}}" method="post">
                @csrf
                @method('POST')
                <div class="modal-body">

                    <div class="form-group">
                        <label for="exampleInputEmail1">First Name</label>
                        <input type="text" class="form-control" id="first_name" name="firstName"
                               placeholder="First name">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Last Name</label>
                        <input type="text" class="form-control" id="last_name" name="lastName" placeholder="Last name">

                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Mobile</label>
                        <input type="number" class="form-control" id="mobile" name="mobile" placeholder="Mobile">
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
                                    <input type="checkbox" class="form-check-input" id="{{$role->name}}"
                                           name="assignedRoles[]" value="{{$role->name}}">
                                    <label class="form-check-label" for="{{$role->name}}">{{$role->name}}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

