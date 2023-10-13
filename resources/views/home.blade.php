<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
</head>

<body>
    <a href="{{ route('signupform') }}"><button>signup</button></a>
    <a href="{{ route('loginform') }}"><button>login</button></a>
    <a href="{{ route('updateuserform') }}"><button>update user's data</button></a>
    <a href="{{ route('deleteuserform') }}"><button>delete user</button></a>
    <a href="{{ route('addproductform') }}"><button>Add product</button></a>
</body>

</html>
