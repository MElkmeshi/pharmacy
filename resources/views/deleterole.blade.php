<!-- resources/views/admin/roles_permissions/deleteRole.blade.php -->
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
                </div>
                <div class="card">
                    <div class="action">Delete Role</div>

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
     @endsection
