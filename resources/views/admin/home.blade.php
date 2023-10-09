<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @if (Auth::check())
@if (Auth::user()->ND_ten)
    <span class="icon-dropdown cursor-pointer px-2">
        <h1>Text {{ Auth::user()->ND_ten }}</h1>
    </span>
@else
    <span class="icon-dropdown cursor-pointer px-2">
        Tên không tồn tại
    </span>
    
@endif
@endif
<h1>TExt</h1>
</body>
</html>