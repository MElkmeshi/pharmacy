<!-- resources/views/admin/roles_permissions/editRoleName.blade.php -->
@extends('aside_bar')
    @section($active="permission")
    @section('name')
        <title>Permission</title>
        <link rel="stylesheet" href="/css/permission.css">
    @endsection
    @section('card')
        <!-- ======================= Cards ================== -->
        <div class="cardBox">
            
            <div class="card">
              <div class="space">
                <a href="{{ route('admin.create.role') }}" class="link">Create OR Assign</a>
                <a href="{{ route('admin.Assign.role.user') }}"class="link">Assign role to user</a>
                <a href="{{ route('admin.edit.role') }}"class="link">edit role name</a>
                <a href="{{ route('admin.delete.role') }}"class="link">delete role</a>
                <br>
                </div>
                <div class="card">
                    <div class="action">Edit Role Name</div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('admin.roles.editName') }}">
                            @csrf

                            <div class="form-group">
                                <label for="name">Select Role</label>
                                <select name="name" class="form-control chosen-select">
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
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

@endsection