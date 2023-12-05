<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Documenttt</title>
</head>
<body>
    
    
    {{-- <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create Role</div>

                    <div class="card-body">

                        <form method="POST" action="{{ route('admin.createRole') }}">
                            @csrf

                            <div class="form-group">
                                <label for="name">Role Name</label>
                                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" required>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Create Role</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}



 
    {{-- <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Assign Roles to User</div>

                    <div class="card-body">

                        <form method="post" action="{{ route('admin.assignRoleToUser', ['role' => 1]) }}">
                            @csrf

                            <div class="form-group">
                                <label for="roles">Select Roles:</label>
                                <input type="text" name="roles" id="roles" class="form-control @error('name') is-invalid @enderror" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Assign Roles</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}



    {{-- <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create Role</div>

                    <div class="card-body">

                        <form method="POST" action="{{ route('admin.createperm') }}">
                            @csrf

                            <div class="form-group">
                                <label for="name">perm Name</label>
                                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" required>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Create Role</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

{{-- 
     <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Assign perm to role</div>

                    <div class="card-body">

                        <form method="post" action="{{ route('admin.roles_permissions.assign_permissions', ['role' => 1]) }}">
                            @csrf

                            <div class="form-group">
                                <label for="roles">Select perm:</label>
                                <input type="text" name="permissions" id="roles" class="form-control @error('name') is-invalid @enderror" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Assign Roles</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    
     {{-- <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Assign perm to role</div>

                    <div class="card-body">

                        <form method="post" action="{{ route('redirect.to.admin', ['userId' => 1]) }}">
                            @csrf

                           

                            <button type="submit" class="btn btn-primary">map</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}



  


    <form method="POST" action="{{ route('admin.roles') }}">
        @csrf
    
        <div class="form-group">
            <label for="name">Role Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
    
        <div class="form-group">
            <label for="permissions">Assign Permissions</label>
            <select name="permissions[]" class="form-control" multiple>
                @foreach($permissions as $permission)
                    <option value="{{ $permission->name }}">{{ $permission->name }}</option>
                @endforeach
            </select>
        </div>
    
        <button type="submit" class="btn btn-primary">Create   OR  Assign</button>
    </form>
    





</body>
</html>





