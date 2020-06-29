<html lang="ja">
<head>
    <title>Edit Todo</title>
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
                Edit Task
            </div>
            <div class="card-body">
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
                <form action="{{route('updateTask', ['task_id' => $editTask->task_id])}}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="task-name">task</label>
                        <input type="text" name="name" class="form-control" id="task-name" value="{{old('name', $editTask->name)}}" placeholder="Edit task name">
                    </div>
                    <div class="form-group">
                        <label for="task-detail">detail</label>
                        <textarea name="detail" class="form-control" id="task-detail" rows="3" placeholder="Edit task details">{{old('detail', $editTask->detail)}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="task-detail">limit</label>
                        <input type="datetime-local" name="limit" class="form-control" id="task-limit" value="{{old('limit', str_replace(" ", "T", $editTask->limit))}}">
                    </div>
                    <div class="form-group">
                        <label for="task-detail">status</label>
                        <div class="form-check form-check-inline">
                            <input type="radio" name="status" class="form-check-input" id="task-status" value="{{\App\Task::STATUS_NOT_END}}" checked="checked">
                            <label class="form-check-label" for="task-status">未完了</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" name="status" class="form-check-input" id="task-status" value="{{\App\Task::STATUS_END}}">
                            <label class="form-check-label" for="task-status">完了</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-secondary">Edit task</button>
                    <button type="button" class="btn btn-secondary" onclick="history.back()">back</button>
                </form>
            </div>
        </div>
    </div>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
