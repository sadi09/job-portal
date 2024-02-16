<div class="col-lg-12 mt-5 col-sm-6 wow fadeInUp flex " data-wow-delay="0.1s"
     style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
<span class="cat-item rounded p-4 w-75 m-auto">
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Role Name</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($roles as $role)

            <tr>
                <td>{{$role->id}}</td>
                <td>{{$role->name}}</td>
                <td>
                    <a class="btn btn-info btn-sm" href="roles/{{$role->id}}/details">Permissions</a>
                    <a class="btn btn-danger btn-sm" href="roles/{{$role->id}}/delete">Delete</a>
                </td>
            </tr>

        @endforeach
        </tbody>
    </table>
</span>
</div>


</script>
