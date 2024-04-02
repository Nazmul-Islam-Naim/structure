<!DOCTYPE html>
<html>
<head>
<title>Title of the document</title>
</head>

<body>
The content of the document......{{$product->title}}

<form action="{{route('products.update', $product->id)}}" method="POST">
@csrf
@method('put')
<label for="title">Title:</label>
<input type="text" name="title" vlaue={{$product->title}}>
<button>Submit</button>
</form>
</body>

</html>
