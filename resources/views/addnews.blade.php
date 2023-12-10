<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <div class="container">
        <h2>Add News</h2>
        <form action="{{route('storeNews')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" placeholder="Enter title" name="title" value="{{ old('title') }}">
                @error('title')
                <div class="alert alert-warning">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="content">content:</label>
                <textarea class="form-control" name="content" rows="5" id="content">{{old('content')}}</textarea>
                @error('content')
                {{ $message }}
                @enderror
            </div>
            <div class="form-group">
                <label for="author">author:</label>
                <input type="text" class="form-control" id="author" placeholder="Enter author" name="author">
            </div>
            <div class="checkbox">
                <label><input type="checkbox" name="published"> Published</label>
            </div>
            <button type="submit" class="btn btn-default">Add</button>
        </form>
    </div>
</body>

</html>
