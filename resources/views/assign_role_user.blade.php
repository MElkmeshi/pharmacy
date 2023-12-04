<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Assign Role to User</div>
    
                    <div class="card-body">
                        {{-- @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif --}}
    
                        <form method="POST" action="{{ route('admin.assignRoleToUser') }}">
                            @csrf
    
                            <div class="form-group">
                                <label for="role">Role Name</label>
                                <input type="text" name="role" class="form-control" required>
                            </div>
    
                            <div class="form-group">
                                <label for="email">User Email</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>
    
                            <button type="submit" class="btn btn-primary">Assign Role</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
</body>
</html>