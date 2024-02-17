<div class="row col-lg-12">
    <div class="col-lg-8 col-sm-6 wow fadeInUp flex " data-wow-delay="0.1s"
         style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">


        <button class="btn btn-info btn-sm ml-1 float-right mb-3" data-toggle="modal" data-target="#modal-default">
            <i class="fa fa-plus-circle"></i>
            Add Role
        </button>

        <span class="cat-item rounded p-4 w-75 m-auto">
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Role Name</th>
            <th>Assigned Permissions</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($roles as $role)
            <tr>
                <td>{{$role->id}}</td>
                <td>{{$role->name}}</td>
                <td>
                    @foreach($role->permissions as $permission)
                        <span class="btn btn-xs btn-outline-success">{{$permission->name}}</span>
                    @endforeach
                </td>
                <td>
                    <a class="btn btn-info btn-xs" href="{{route('roles.edit', $role->id)}}">Add/Edit Permissions</a>
                    <button data-id='{{$role->id}}' class='deleteBtn btn btn-outline-danger btn-xs '>Delete</button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</span>
    </div>

    <div class="col-lg-4 col-sm-6 wow fadeInUp flex " data-wow-delay="0.1s"
         style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">


        <button class="btn btn-info btn-sm ml-1 float-right mb-3" data-toggle="modal" data-target="#modal-default">
            <i class="fa fa-plus-circle"></i>
            Add Permission
        </button>

        <span class="cat-item rounded p-4 w-75 m-auto">
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Permission Name</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($permissions as $permission)
            <tr>

                <td>{{$permission->name}}</td>
                <td>
                    <a class="btn btn-info btn-xs" href="{{route('roles.edit', $role->id)}}">Add/Edit Permissions</a>
                    <button data-id='{{$permission->id}}' class='deleteBtn btn btn-outline-danger btn-xs '>Delete</button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</span>
    </div>
</div>


<script>
    $(".deleteBtn").on('click', async function () {
        let id = $(this).data('id');

        let deleteUrl = "{{ route('roles.destroy', ['role' => 'role_id_placeholder']) }}"; // Set the default URL here
        deleteUrl = deleteUrl.replace('role_id_placeholder', id); // Replace placeholder with the actual ID
        console.log(deleteUrl)
        $('#delete-modal').modal('show');
        $("#deleteID").val(id);
        $("#deleteForm").attr('action', deleteUrl);
    })

    function ClearDeleteID() {
        $("#deleteID").val('');
        $('#delete-modal').modal('hide');
    }
</script>
