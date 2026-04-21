<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div class="namemain">
        <h2 class="heading">
            
            @foreach ($users as $user)
                {{ $user->name_first }}
            @endforeach
        </h2>
    </div>
</body>

</html>
