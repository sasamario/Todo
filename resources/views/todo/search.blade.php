<html lang="ja">
<head>
    <title>Search Todo</title>
    <meta charset = "UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
    <div class="navbar bg-light mb-5">
        <p>Todo List</p>
    </div>

    <div class="container">
        <div class="card mx-auto mb-5">
            <div class="card-header">
                Search Tasks
            </div>
            <div class="card-body">
                <table class="table task-table table-striped mb-0">
                    <thead>
                    <tr>
                        <th scope="col">Task</th>
                        <th scope="col">Detail</th>
                        <th scope="col">Limit</th>
                        <th scope="col">Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($searchTasks as $item)
                        <tr>
                            <td class="table-text">{{$item->name}}</td>
                            <td class="table-text">{{$item->detail}}</td>
                            <td class="table-text">{{$item->limit}}</td>
                            @if ($item->status == \App\Task::STATUS_NOT_END)
                                <td class="table-text bg-warning">未完了</td>
                            @else
                                <td class="table-text">完了</td>
                            @endif
                            <td>
                                <form action="{{route('delete', ['task_id' => $item->task_id])}}" method="get" class="mb-0">
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                            <td>
                                <form action="{{route('edit', ['task_id' => $item->task_id])}}" method="get" class="mb-0">
                                    <button type="submit" class="btn btn-info">Edit</button>
                                </form>
                            </td>
                            <td>
                                <form action="{{route('updateStatus', ['task_id' => $item->task_id])}}" method="get" class="mb-0">
                                    <button type="submit" class="btn btn-success">Complete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <button type="button" class="btn btn-secondary mt-3" onclick="history.back()">back</button>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
