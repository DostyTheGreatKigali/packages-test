<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pagination</title>
    <style>
        .pagination a.selected {
            font-weight: bolder;
            font-size: 20px;
        }
    </style>
</head>
<body>
<div>
     @foreach ($users as $user)
         <div class="article">
             <p>{{ $user->id }}: {{ $user->name }}</p>
         </div>
     @endforeach
     <div class="pagination">
         @for ($x = 1; $x <= $pages; $x++)
             <a href="?page={{ $x }}&per-page={{ $per_page }}" @if ($page === $x)
                 class="selected"
             @endif> {{ $x }}</a>
         @endfor
     </div>
</div>
</body>
</html>
