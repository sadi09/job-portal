<div class="modal fade" id="modal-default" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Role</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form id="save-form" action="{{route('roles.store')}}" method="post">
                <div class="modal-body">

                    <div class="form-group">
                        <label for="exampleInputEmail1">Role name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Role name" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Permissions</label>
                        <div class="form-group">
                            @foreach($permissions as $permission)
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="{{$permission->name}}"
                                           name="assignedPermissions[]" value="{{$permission->name}}">
                                    <label class="form-check-label" for="{{$permission->name}}">{{$permission->name}}</label>
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

