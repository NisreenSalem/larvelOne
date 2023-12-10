<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add Car</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

    <div class="container">
        <h2>Add Explore</h2>
        <form action="{{route('storeExplore')}}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" placeholder="Enter title" name="title" value="{{ old('title') }}">

            </div>
            <div class="form-group">
                <label for="description">content:</label>
                <textarea class="form-control" name="content" rows="5" id="content"></textarea>

            </div>
            <div class="form-group">
                <label for="description">Explore From</label>
                <input class="form-control" name="exp_from" id="exp_from"></input>
                <label for="description">Explore to</label>
                <input class="form-control" name="exp_to" id="exp_to"></input>

            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="image">Image:</label>
                <input type="file" class="form-control" id="image" name="image">

            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" class="form-control" id="price" placeholder="Enter Price" name="price">
            </div>
            <div class="form-group">
                <label for="description">Rate</label>
                <input class="form-control" name="rate" rows="5" id="rate"></input>

            </div>


            <button type="submit" class="btn btn-default">Add</button>
        </form>
    </div>
</body>

</html>