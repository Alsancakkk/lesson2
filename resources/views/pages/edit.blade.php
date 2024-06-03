@extends('layouts.app')

@section('title', 'Edit Task')

@section('content')
<div class="title">Edit Task</div>
<form action="{{ route('tasks.update', $task->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="task" name="task" value="{{ old('task', $task->task) }}">
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <input type="text" class="form-control" id="description" name="description" value="{{ $task->description }}">
    </div>
    <button type="submit" class="btn btn-primary">Update Task</button>
</form>
@endsection