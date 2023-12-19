{{-- <!DOCTYPE html>
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
            <div class="col-md-8"> --}}
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
                    <div class="action">Assign Role to User</div>
    
                    <div >
                        {{-- @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif --}}
    
                        <form method="POST" action="{{ route('admin.assignRoleToUser') }}">
                            @csrf
    
                            <div class="form-group">
                                <label for="role">Select Role</label>
                                <select name="role" class="form-control chosen-select">
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                    
    
                            <div >
                                <label for="email">User Email</label>
                                <input type="email" name="email"  required>
                            </div>
    
                            <button type="submit" >Assign Role</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    
    @endsection
{{-- </body>
</html> --}}