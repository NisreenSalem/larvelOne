<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <h1>Car details</h1>
    <br>
    <h2>Car Title : {{$car->carTitle}}</h2>

    <br>
    <h2>Car price : {{$car->price}}</h2>
    <br>
    <h2>Car description : {{$car->description}}</h2>
    <br>
    <h2>Car published : {{$car->published}}</h2>
    <br>
    <h2>Car categoryName : {{$car->category->categoryName}}</h2>

</body>

</html>