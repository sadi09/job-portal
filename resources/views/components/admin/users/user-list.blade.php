<div class="row col-lg-12">
    <div class="col-lg-12 col-sm-6 wow fadeInUp flex " data-wow-delay="0.1s"
         style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">


        <button class="btn btn-info btn-sm ml-1 float-right mb-3" data-toggle="modal" data-target="#modal-default">
            <i class="fa fa-plus-circle"></i>
            Add User
        </button>

        <span class="cat-item rounded p-4 w-75 m-auto">
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Assigned Permissions</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->firstName}}</td>
                <td>{{$user->lastName}}</td>
                <td>{{$user->email}}</td>
                <td>
                    @if(!empty($user->getRoleNames()))
                        @foreach($user->getRoleNames() as $v)
                            <label class="badge badge-primary text-white">{{ $v }}</label>
                        @endforeach
                    @endif
                </td>
                <td>
                    <a class="btn btn-info btn-xs" href="{{route('users.edit', $user->id)}}">Add/Edit Permissions</a>
                    <button data-id='{{$user->id}}' class='deleteBtn btn btn-outline-danger btn-xs '>Delete</button>
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

        let deleteUrl = "{{ route('users.destroy', 'id_placeholder') }}"; // Set the default URL here
        deleteUrl = deleteUrl.replace('id_placeholder', id); // Replace placeholder with the actual ID
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
