<div class="col-lg-12 col-sm-6 wow fadeInUp flex " data-wow-delay="0.1s"
     style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">

    <h3>Edit Role - {{$role->name}}
    </h3>

    <form id="save-form" action="{{route('roles.update', $role->id)}}" method="post">
        @csrf
        @method('PATCH')
        <div class="modal-body">

            <div class="form-group">
                <label for="exampleInputEmail1">Role name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{$role->name}}"
                       placeholder="Role name">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Permissions</label>
                <div class="form-group">
                    @foreach($permissions as $permission)
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="{{$permission->name}}"
                                   @if(in_array($permission->id, $assignedPermissions)) checked @endif
                                   name="assignedPermissions[]" value="{{$permission->name}}">
                            <label class="form-check-label" for="{{$permission->name}}">{{$permission->name}}</label>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
        <div class="modal-footer justify-content-between">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
</div>
