<!DOCTYPE html>
<html>
<head>
    <title>Task Assigned</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color:rgb(214, 216, 218);
            padding: 20px;
            display: flex;
            flex-direction: row;
            justify-content: center; 
            align-items: center; 
            min-height: 100vh; 
        }
        .container {
            width: fit-content;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
        }
        h2 {
            color: #696969;
            font-size: 16px;
            font-weight: bold;
        }
        p {
            color: rgb(148, 147, 147);
            font-size: 12px;
            line-height: 1;
        }
        .info {
            font-weight: bold;
            color: #808080;
        }
    
    </style>
</head>
<body>
    <div class="container">
        <h2>Task Assigned</h2>

        <div>
            <p>You have been assigned a new task: <span class="info">{{ $task->title }}</span></p>
            <p>Assigned on: <span class="info">{{ $task->created_at->format('l, Y/m/d') }}</span></p>
        </div>

        <p class="info">Task Description</p>

        <p> {{ $task->description }}</p>

        <p>Please review it at your earliest convenience</p>

        <div>
            <p>Thanks,</p>
            <p>{{ $mail_from }}</p>
        <div>

    </div>
</body>
</html>

