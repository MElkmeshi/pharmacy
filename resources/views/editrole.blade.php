<!-- resources/views/admin/roles_permissions/editRoleName.blade.php -->

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Role Name</div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('admin.roles.editName') }}">
                            @csrf

                            <div class="form-group">
                                <label for="name">Role Name</label>
                                <input type="text" name="name" class="form-control"  required>
                            </div>

                            <div class="form-group">
                                <label for="new_name">New Role Name</label>
                                <input type="text" name="new_name" class="form-control" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Update Role Name</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

