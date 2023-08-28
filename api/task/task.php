<?php 

    if ($api == 'task') 
    {
        if ($method == 'GET')
        {
            include_once 'Controller/getTaskController.php';
        }

        if ($method == 'POST')
        {
            include_once 'Controller/postTaskController.php';
        }

        if ($method == 'PUT')
        {
            include_once 'Controller/updateTaskController.php';
        }

        if ($method == 'DELETE')
        {
            include_once 'Controller/deleteTaskController.php';
        }
    }

?>