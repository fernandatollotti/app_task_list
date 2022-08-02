<?php

    require "../protected/task.model.php";
    require "../protected/task.service.php";
    require "../protected/connection.php";

    $__task = new Task();
    $__conn = new Connection();
    $__task_service = new TaskService($__conn, $__task);

    $get_action = isset($_GET['action']) ? $_GET['action'] : $action; 
    
    if ( $get_action == 'insert' )
    {
        $__task->__set('task', $_POST['item_task']);
        $__task_service->insert();

        header('Location: new_task.php?inclusion=1');
    }

    if ( $get_action == 'read' )
    {
        $list = $__task_service->select();
    }

    if ( $get_action == 'update' )
    {
        $__task->__set('id', $_POST['id'])->__set('value_task', $_POST['value_task']);
        
        if ( $__task_service->update() )
        {
            if ( isset($_GET['page']) && $_GET['page'] == 'index' )
            {
                header('Location: index.php');
            }
            else 
            {
                header('Location: all_task.php');
            }
        }
    }

    if ( $get_action == 'remove' )
    {
        $__task->__set('id', $_GET['id']);

        $__task_service->delete();

        if ( isset($_GET['page']) && $_GET['page'] == 'index' )
        {
            header('Location: index.php');
        }
        else 
        {
            header('Location: all_task.php');
        }
    }

    if ( $get_action == 'check' )
    {
        $__task->__set('id', $_GET['id'])->__set('id_status', 2);

        $__task_service->check_task();

        if ( isset($_GET['page']) && $_GET['page'] == 'index' )
        {
            header('Location: index.php');
        }
        else 
        {
            header('Location: all_task.php');
        }
    }

    if ( $get_action == 'pending' )
    {
        $__task->__set('id_status', 1);

        $list = $__task_service->pend();
    }

?>