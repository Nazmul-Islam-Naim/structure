<!DOCTYPE html>
<html>
<head>
<title>Category</title>
</head>

<body>

<form action="{{route('categories.store')}}" method="POST">
@csrf
<label for="title">Title:</label>
<input type="text" name="title">
<button>Submit</button>
</form>
</body>

</html>
