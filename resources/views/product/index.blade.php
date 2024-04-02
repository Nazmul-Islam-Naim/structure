<!DOCTYPE html>
<html>
<head>
<title>Title of the document</title>
</head>

<body>
The content of the document......
@foreach ($products['content'] as $item)
    <ul>
        <li>{{$item->title}}</li>
    </ul>
@endforeach

<form action="{{route('products.store')}}" method="POST">
@csrf
<label for="title">Title:</label>
<input type="text" name="title">
<button>Submit</button>
</form>
</body>

</html>
