<?php

namespace App\Repositories;

use App\User;

class UserRepository {

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function getAllWorkers(){
        return $this->model->where('role','pracownik')->orderBy('name','asc')->get();
    }
}