@extends('aside_bar')
@section($active = 'permission')
@section('name')
    <title>Permission</title>
    <link rel="stylesheet" href="/css/permission.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
    <link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet" />

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
                <div class="action">Create Or Assign</div>


                <form method="POST" action="{{ route('admin.roles') }}">
                    @csrf

                    <div class="form-group">
                        <label for="role">Select Role</label>
                        <input list="namelist" name="name" id="name">
                        <datalist id="namelist">
                            @foreach ($roles as $role)
                                <option value="{{ $role->name }}">
                            @endforeach
                        </datalist>
                    </div>

                    <div class="form-group">
                        <label for="permissions">Assign Permissions</label>
                        <select name="permissions[]" class="form-control chosen-select" multiple>
                            @foreach ($permissions as $permission)
                                <option value="{{ $permission->name }}">{{ $permission->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Create OR Assign</button>
                </form>
                <script>
                    $(".chosen-select").chosen({
                        no_results_text: "Oops, nothing found!"
                    })
                </script>

            </div>
        </div>
    </div>


@endsection
{{-- </body>
</html> --}}
