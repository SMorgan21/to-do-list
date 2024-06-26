<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MLP To-Do</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-xs-6">
            <a href="#">
                <img class="img-fluid logo_padding" src="{{asset('assets/logo.png')}}" alt="mlp_logo">
            </a>
        </div>
        @foreach (['success_message', 'error_message'] as $message)
            @if(session($message))
                <div class="col-xs-3 col-xs-offset-3 text-center flash_alert">
                    <div class="alert {{ $message == 'success_message' ? 'alert-success' : 'alert-danger' }} "> {{ session($message) }}</div>
                </div>
            @endif
        @endforeach

    </div>
    <div class="row">
        <div class="col-xs-4">
            <form action="{{route('task.store')}}" method="post">
                @csrf
                <input class="form-control task-input" name="name" placeholder="Insert Task Name" required>
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
                @if(count($tasks) > 0)
                    @foreach ($tasks as $task)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{!! $task->is_complete ? "<del>$task->name</del>" : $task->name !!}</td>
                            <td style="overflow: auto;">
                                <form action="{{route('task.delete', $task->id)}}" method="post" style="float: right; margin: 0.5rem;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </form>
                                <form action="{{route('task.update', $task->id)}}" method="post" style="float: right; margin: 0.5rem;">
                                    @csrf
                                    @method('PATCH')
                                    <button class="btn btn-success" type="submit">
                                        <i class="fas fa-check"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="2">No tasks</td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-xs-12 text-center copy_right">
        <p>Copyright &copy; {{ date('Y') }} All Rights Reserved.</p>
    </div>
</div>
</body>
</html>

<script>
    $(document).ready(function() {
        $(".flash_alert").delay(3000).fadeOut("slow");
    });
</script>
