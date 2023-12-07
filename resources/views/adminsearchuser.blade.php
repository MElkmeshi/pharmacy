<table>
    <thead>
        <tr>
            <td>Name</td>
            <td>Email</td>
            <td>Address</td>
            <td>Age</td>
            <td>Action</td>
        </tr>
    </thead>


    <tbody>
        @foreach ($data as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->address }}</td>
                <td>{{ $user->age }} </td>
                <td>
                    <a href="{{ route('adminupdateuserform', ['id' => $user->id]) }}"><button
                            class="edit">Edit</button></a>
                    <a href="#"><button class="delete">Delete</button>
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>