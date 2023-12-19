<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Documenttt</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
    <link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet" />

</head>

<body>

    <form method="POST" action="{{ route('admin.roles') }}">
        @csrf

        <div class="form-group">

            <label for="role">Select Role</label>
            {{-- <select name="name" class="form-control chosen-select">
                @foreach ($roles as $role)
                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                @endforeach
            </select> --}}

<input list="namelist" name="name" id="name">
  <datalist id="namelist">
    @foreach ($roles as $role)
    <option value="{{ $role->name }}">
        @endforeach
  </datalist>

  
            <input type="submit">

        </div>

        <div class="form-group">
            <label for="permissions">Assign Permissions</label>
            <select name="permissions[]" class="form-control chosen-select" multiple>
                @foreach ($permissions as $permission)
                    <option value="{{ $permission->name }}">{{ $permission->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Create OR Assign</button>
    </form>




    <script>
        $(".chosen-select").chosen({
            no_results_text: "Oops, nothing found!"
        })
    </script>

</body>

</html>
