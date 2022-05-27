<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pagination</title>
</head>
<body>
<div>
     @foreach ($users as $user)
         <div class="article">
             <p>{{ $user->id }}: {{ $user->name }}</p>
         </div>
     @endforeach
</div>
</body>
</html>
