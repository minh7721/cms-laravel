<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="{{ route('upload.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="file" name="image">
    <button class="btn" type="submit">Upload</button>
</form>

@foreach($users as $user)
    <img src="{{ $local . $user->thumb}}" alt="{{ $user->name }}">

    <p style="color: red;">{{ $local . $user->thumb}}</p>
@endforeach
</body>
</html>
