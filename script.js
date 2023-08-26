$('.add-button button').click(function () {
    $('#task').val("")
    $('#task_id').val("")
    $('#type').val("initial");
    $('.input-elements').removeClass('loading');
    $('.loader').removeClass('loading');
    $('#add-task-button').html('Add Task')
    $('#task-heading').html('Add Task')
    $('#task-error').html("");
    $('.add-task-block').removeClass('hidden');
})
$('.close-button').click(function () {
    $('.add-task-block').addClass('hidden');
})

$('#task-form').on('submit', function (e) {
    e.preventDefault();
    let task = $('#task').val();
    let type = $('#type').val();
    let task_id = $('#task_id').val();

    if (task.trim() !== '') {
        $('.input-elements').addClass('loading');
        $('.loader').addClass('loading');
        $('#task-error').html("");
    } else {
        $('#task-error').html("Please add a task");
        return;
    }
    let action = "";
    if(task_id=="") {
        action = "add-task";
        $.ajax({
            type: 'POST',
            cache: false,
            data: { task: task, type: type, action: action },
            url: 'action',
            success: function (response) {
                $('.input-elements').removeClass('loading');
                $('.loader').removeClass('loading');
                $('.add-task-block').addClass('hidden');
                $('#task-form')[0].reset();
                renderBlocks();
            }
        })
    }
    else{
        action = "update-task";
        $.ajax({
            type: 'POST',
            cache: false,
            data: { task: task, type: type, id: task_id, action: action },
            url: 'action',
            success: function (response) {
                $('.input-elements').removeClass('loading');
                $('.loader').removeClass('loading');
                $('.add-task-block').addClass('hidden');
                $('#task-form')[0].reset();
                renderBlocks();
            }
        })
    }
   
})

function renderBlocks() {
    const actions = { initial: [], progress: [], completed: [] };
    const actionNames = Object.keys(actions);

    $.ajax({
        type: 'GET',
        cache: false,
        data: { action: 'blocks' },
        url: 'action',
        success: function (response) {
            const new_response = JSON.parse(response);

            new_response.forEach(item => {
                if (actionNames.includes(item.type)) {
                    actions[item.type].push(item);
                }
            });

            actionNames.forEach(actionName => {
                let html = '';

                actions[actionName].forEach(action => {
                    let moveButtons = '';

                    actionNames.forEach(otherAction => {
                        if (otherAction !== actionName) {
                            moveButtons += `<div data-id="${action.id}" move-type="${otherAction[0]}" class="action move ${otherAction[0]}">${otherAction[0].toUpperCase()}</div>`;
                        }
                    });

                    html += `<div class="single-task">
                        <div class="task">${action.task} <i data-id="${action.id}" class="fa fa-edit edit-task"></i> <i data-id="${action.id}" class="fa fa-trash delete-task"></i></div>
                        <div class="task-action">${moveButtons}</div>
                    </div>`;
                });

                $(`#${actionName}`).html(html);


            });

            $('.move').on('click', function () {
                let move_type = $(this).attr('move-type');
                let id = $(this).data('id');
                moveTask(move_type, id);
            });

            $('.edit-task').on('click', function () {
                let id = $(this).data('id');
                $.ajax({
                    type: 'GET',
                    cache: false,
                    data: { action: 'edit',id: id },
                    url: 'action',
                    success: function (response) {
                        const edit_response = JSON.parse(response);
                        $('.input-elements').removeClass('loading');
                        $('.loader').removeClass('loading');
                        $('#task-error').html("");
                        $('.add-task-block').removeClass('hidden');
                        $('#add-task-button').html('Update Task')
                        $('#task-heading').html('Update Task')
                        $('#task').val(edit_response.task)
                        $('#task_id').val(edit_response.id)
                        $('#type').val(edit_response.type);
                    }
                });
               
            })
            $('.delete-task').on('click', function () {
                let id = $(this).data('id');
                $.ajax({
                    type: 'GET',
                    cache: false,
                    data: { action: 'delete',id: id },
                    url: 'action',
                    success: function (response) {
                       renderBlocks();
                    }
                });
            })
        }
    });
}

function moveTask(type, id) {
    let action = "move";
    $.ajax({
        type: 'POST',
        cache: false,
        data: { type: type, id: id, action: action },
        url: 'action',
        success: function (response) {
            renderBlocks();
        }
    })
}





renderBlocks();