<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Structures</title>
</head>
<body>
<ul style="list-style: none">
    @foreach($structures as $structure)
        <li>{{$structure->active}} =>  {{$structure->title}}</li>
    @endforeach
    {{$structures->appends(request()->input())->links()}}
</ul>
</body>
</html>
