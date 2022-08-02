let href = location.href;
let url = href.toString().split("/")[6];

function edit(id, txt)
{
    let form = document.createElement('form');
    form.method = 'POST';
    alert(url);
    form.action = url == 'index.php' ? 'index.php?page=index&action=update' : 'task_controller.php?action=update';
  

    let group = document.createElement('div');
    group.className = 'input-group';
    let input_append = document.createElement('div');
    input_append.className = 'input-group-append';

    let input = document.createElement('input');
    input.type = 'text';
    input.name = 'value_task';
    input.className = 'form-control';
    input.value = txt;

    let id_input = document.createElement('input');
    id_input.type = 'hidden';
    id_input.name = 'id';
    id_input.value = id;

    let btn = document.createElement('button');
    btn.type = 'submit';
    btn.className = 'btn btn-info';
    btn.innerHTML = 'Atualizar';

    input_append.appendChild(btn);
    group.append(input, id_input, input_append);
    form.appendChild(group);

    console.log(form)

    let task = document.getElementById('id_' + id);
    task.innerHTML = '';

    task.insertBefore(form, task[0]);
}

function remove(id) 
{
    if ( url == 'index.php' )
    {
        location.href = 'index.php?page=index&action=remove&id=' + id;       
    }
    else 
    {
        location.href = 'all_task.php?action=remove&id=' + id;
    }

}

function check(id)
{
    if ( url != 'index.php' )
    {
        location.href = 'all_task.php?action=check&id=' + id;
    }
    else 
    {
        location.href = 'index.php?page=index&action=check&id=' + id;
    }
}
