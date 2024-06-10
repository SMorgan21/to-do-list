<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MLP To-Do</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col">
            <a href="#">
                <img class="img-fluid logo_padding" src="{{asset('assets/logo.png')}}" alt="mlp_logo">
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-4">
            <input class="form-control task-input" placeholder="Insert Task Name">
            <br>
            <button class="btn btn-primary form-control">Add</button>
        </div>
        <div class="col-xs-8">
            <textarea class="form-control mt-2" rows="10"></textarea>
        </div>
    </div>
</div>


</body>
</html>
