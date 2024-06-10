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
            <form action="{{route('store.task')}}" method="post">
                @csrf
                <input class="form-control task-input" name="name" placeholder="Insert Task Name">
                <br>
                <button class="btn btn-primary form-control" type="submit">Add</button>
            </form>
        </div>
        <div class="col-xs-8 table_style">
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Task</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($tasks as $task)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $task->name }}</td>
                        <td>{{ $task->is_complete ? 'Completed' : 'Not Completed' }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


</body>
</html>
