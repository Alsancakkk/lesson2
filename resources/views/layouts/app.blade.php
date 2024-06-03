<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'To Do List')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f0f0f0;
        }

        .container {
            width: 800px;
            padding: 100px;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .title {
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .add-button {
            position: fixed;
            top: 10px;
            right: 10px;
            padding: 15px 25px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        .add-button:hover {
            background-color: #218838;
        }

        #popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            background-color: #f1f1f1;
            border: 1px solid #ccc;
            z-index: 1000;
        }

        #overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 999;
        }

        .completed-task {
            text-decoration: line-through;
        }
    </style>
</head>

<body>
    <button class="add-button" onclick="openPopup()">Add</button>
    <div class="container">
        @yield('content')
    </div>

    <div id="overlay" onclick="closePopup()"></div>
    <div id="popup">
        <h2>Add Task</h2>
        <form action="{{ route('task.store') }}" method="POST">
            @csrf
            <input type="text" name="task" placeholder="Task Name" required>
            <input type="text" name="description" placeholder="Task Description">
            <button type="submit">Add</button>
        </form>
        <button onclick="closePopup()">Close</button>
    </div>

    <script>
        function openPopup() {
            document.getElementById("popup").style.display = "block";
            document.getElementById("overlay").style.display = "block";
        }

        function closePopup() {
            document.getElementById("popup").style.display = "none";
            document.getElementById("overlay").style.display = "none";
        }
    </script>

</html>