<?php

namespace App\Exceptions;

use Exception;

class TasksNotBelongsToUser extends Exception
{
    public function render()
    {
        return ['errors' => 'Tasks Not Belongs To User'];
    }
}
