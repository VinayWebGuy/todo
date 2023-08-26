<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <main>
        <div class="logo">CG - TODO</div>
        <div class="blocks">
            <div class="initial-block block">
                <div class="block-heading">Initial</div>
                <div class="block-content">
                    <div class="single-task">
                        <div class="task">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore, mollitia?
                        </div>
                        <div class="task-action">
                            <div class="action p">P</div>
                            <div class="action c">C</div>
                        </div>
                    </div>
                    <div class="single-task">
                        <div class="task">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore, mollitia?
                        </div>
                        <div class="task-action">
                            <div class="action p">P</div>
                            <div class="action c">C</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="progress-block block">
                <div class="block-heading">In Progress</div>
                <div class="block-content">
                    <div class="single-task">
                        <div class="task">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore, mollitia?
                        </div>
                        <div class="task-action">
                            <div class="action i">I</div>
                            <div class="action c">C</div>
                        </div>
                    </div>
                    <div class="single-task">
                        <div class="task">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore, mollitia?
                        </div>
                        <div class="task-action">
                            <div class="action i">I</div>
                            <div class="action c">C</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="complete-block block">
                <div class="block-heading">Completed</div>
                <div class="block-content">
                    <div class="single-task">
                        <div class="task">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore, mollitia?
                        </div>
                        <div class="task-action">
                            <div class="action i">I</div>
                            <div class="action p">P</div>
                        </div>
                    </div>
                    <div class="single-task">
                        <div class="task">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore, mollitia?
                        </div>
                        <div class="task-action">
                            <div class="action i">I</div>
                            <div class="action p">P</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="add-task-block">
            <div class="add-task-form">
                <div class="add-task-header">
                    <h3>Add Task</h3>
                    <div class="close-icon">&#x2715;</div>
                </div>
                <div class="add-task-body">
                    <textarea name="task" id=""></textarea>
                    <select name="" id="">
                        <option value="initial">Initial</option>
                        <option value="progress">Progress</option>
                        <option value="completed">Completed</option>
                    </select>
                    <div class="add-task-buttons">
                        <button id="add-task-button">Add Task</button>
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