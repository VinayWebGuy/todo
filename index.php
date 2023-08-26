<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <main>
        <div class="logo">myTodo App</div>
        <div class="blocks">
            <div class="initial-block block">
                <div class="block-heading">Initial</div>
                <div id="initial" class="block-content">
                    
                </div>
            </div>
            <div class="progress-block block">
                <div class="block-heading">In Progress</div>
                <div id="progress" class="block-content">
                </div>
            </div>
            <div class="complete-block block">
                <div class="block-heading">Completed</div>
                <div id="completed" class="block-content">
                 
                </div>
            </div>
        </div>

        <div class="add-task-block hidden">
            <div class="add-task-form">
                <div class="add-task-header">
                    <h3>Add Task</h3>
                    <div class="close-icon close-button">&#x2715;</div>
                </div>
                <div class="add-task-body">
                    <form id="task-form" class="input-elements">
                        <input type="hidden" name="task_id" id="task_id">
                        <textarea name="task" id="task"></textarea>
                        <span id="task-error" class="error"></span>
                        <select name="type" id="type">
                            <option value="initial">Initial</option>
                            <option value="progress">Progress</option>
                            <option value="completed">Completed</option>
                        </select>
                        <div class="add-task-buttons">
                            <button id="add-task-button">Add Task</button>
                        </div>
                    </form>
                    <div class="loader">

                    </div>
                </div>
            </div>
        </div>

        <div class="add-button">
            <button>Add</button>
        </div>
    </main>


    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>

</html>