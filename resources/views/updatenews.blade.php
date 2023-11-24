<!DOCTYPE html>
<html lang="en">

<head>
    <title> Edit News</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

    <div class="container">
        <h2>Edit News</h2>
        <form action="{{route('updateNews',$new->id)}}" method="post">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" value="{{$new->title}}" id="title" placeholder="Enter title" name="title">
            </div>

            <div class="form-group">
                <label for="content">content:</label>
                <textarea class="form-control" name="content" rows="5" id="content">
                {{$new->content}}
                </textarea>
            </div>
            <div class="form-group">
                <label for="author">author:</label>
                <input type="text" class="form-control" id="author" placeholder="Enter author" value="{{$new->author}}" name="author">
            </div>
            <div class="checkbox">
                <label><input type="checkbox" name="published" @checked($new->published)> Published</label>
            </div>
            <button type="submit" class="btn btn-default">edit</button>
        </form>
    </div>

</body>

</html>