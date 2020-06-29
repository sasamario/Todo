<html lang="ja">
<head>
    <title>Todo</title>
    <meta charset = "UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
    <div class="navbar bg-light mb-5">
        <p>Todo List</p>
    </div>

    <div class="container">
        @if (session('message'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{ session('message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="閉じる">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <p>入力に問題があります。再入力してください。</p>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card mx-auto mb-5">
            <div class="card-header">
                New Task
            </div>
            <div class="card-body">
                <form action="{{route('add')}}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="task-name">task</label>
                        <input type="text" name="name" class="form-control" id="task-name" value="{{old('name')}}" placeholder="Enter task name">
                    </div>
                    <div class="form-group">
                        <label for="task-detail">detail</label>
                        <textarea name="detail" class="form-control" id="task-detail" rows="3" placeholder="Enter task details">{{old('detail')}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="task-detail">limit</label>
                        <input type="datetime-local" name="limit" class="form-control" id="task-limit" value="{{old('limit')}}">
                    </div>
                    <button type="submit" class="btn btn-secondary">Add task</button>
                </form>
            </div>
        </div>

        <div class="card mx-auto mb-5">
            <div class="card-header">
                Search Task
            </div>
            <div class="card-body">
                <form action="{{route('search')}}" method="get">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="task-name">search task </label>
                        <input type="text" name="name" class="form-control" placeholder="Enter task name">
                    </div>
                    <button type="submit" class="btn btn-secondary">Search task</button>
                </form>
            </div>
        </div>

        <div class="card mx-auto mb-5">
            <div class="card-header">
                Current Tasks
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
                        @foreach($tasks as $item)
                            <tr>
                                <td class="table-text">{{$item->name}}</td>
                                <td class="table-text">{{$item->detail}}</td>
                                <td class="table-text">{{$item->limit}}</td>
                                @if ($item->status == \App\Task::STATUS_NOT_END)
                                    <td class="table-text">未完了</td>
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
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
