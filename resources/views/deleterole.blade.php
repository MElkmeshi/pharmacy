<!-- resources/views/admin/roles_permissions/deleteRole.blade.php -->

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Delete Role</div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('admin.roles.delete') }}">
                            @csrf
                            @method('DELETE')
                            <div class="form-group">
                                <label for="name">Role Name</label>
                                <input type="text" name="name" class="form-control"  required>
                            </div>

                            <button type="submit" class="btn btn-danger">Delete Role</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

