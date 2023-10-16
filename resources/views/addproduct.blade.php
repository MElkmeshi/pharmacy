<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Product Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body class="bg-dark p-4">

    <div class="container mt-5 form-container ">
        <form method="POST" action="#" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <input type="text" class="form-control" id="name" name="name" placeholder="enter product name">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" id="description" name="description" placeholder="enter a description">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" id="price" name="price" placeholder="enter price">
            </div>
            <div class="mb-3">
                <label for="image" class="form-label text-light">choose image:</label>
                <input type="file" class="form-control" id="image" name="image">
            </div>
            <button type="submit" class="btn btn-success">Add</button>
        </form>
    </div>

    <!-- Bootstrap JS and Popper.js (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>



