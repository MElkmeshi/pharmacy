@extends('aside_bar')


@section('name')
    <link rel="stylesheet" href="css/disproduct.css">
    <title>Display all user</title>
@endsection
@section('card')
    <div class="details">
        <div class="search">
            <label>
                <input type="text" name="adminsearchuser" id="adminsearchuser" placeholder="Search here">
                <ion-icon name="search-outline"></ion-icon>
            </label>
        </div>
        <div class="recentOrders">
            <div class="cardHeader">
                <h2>Customers</h2>

            </div >
            <div id="usersearchresult">
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
                    @foreach ($users as $user)
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
        </div>
        </div>
    @endsection
    @section("script")
    <script>
      $(document).ready(function(){
        $(document).on("input","#adminsearchuser",function(){
        var adminsearchuser=$(this).val();
        jQuery.ajax({
          url:"{{ route("ajaxadminsearchuser") }}",
          type:'post',
          datatype:'html',
          cache:false,
          data:{adminsearchuser:adminsearchuser,'_token':"{{ csrf_token() }}"},
          success:function(data){
            $("#usersearchresult").html(data);
          },
          error:function(){

          }
        });
      });
      });
    </script>
  @endsection