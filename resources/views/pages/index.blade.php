@extends('layouts.app')

@section('title', 'To Do List')

@section('content')
<div class="title">To Do List</div>
<table class="table table-sm table-dark" >
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Task</th>
      <th scope="col">Description</th>
      <th scope="col">Creation Time</th>
    </tr>
  </thead>
  <tbody>
  @foreach($tasks as $task)
    <tr>
        <td>{{ $task->id }}</td>
        <td>{{ $task->task }}</td>
        <td>{{ $task->description }}</td>
        <td>{{ $task->created_at }}</td>   
        
        <form action="{{ route('tasks.destroy',['id' => $task->id]) }}" method="POST">
        @csrf
        @method('DELETE')
        <td><button type="submit" class="btn btn-danger btn-sm">Delete</button></td> 
        </form>

       
        
        <form action="{{ route('tasks.edit',['id' => $task->id]) }}" method="GET">
        @csrf
        <td><button type="submit">Edit</button></td>
        </form>
        
        
        <form action="{{ route('tasks.toggleCompleted', $task->id) }}" method="POST">
            @csrf
            <td><button type="submit" class="btn btn-sm {{ $task->is_completed ? 'btn-success' : 'btn-secondary' }}">
                {{ $task->completed ? 'Completed' : 'Mark as Completed' }}
            </button> </td>
        </form>
        
       
    </tr>
    @endforeach
  </tbody>

</table>



@endsection

