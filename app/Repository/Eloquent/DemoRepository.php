<?php

namespace App\Repository\Eloquent;

use App\Models\DemoModel;
use App\Repository\DemoRepositoryInterface;

class DemoRepository implements DemoRepositoryInterface{

    public $model;

    public function __construct(DemoModel $demoModel)
    {
        $this->model=$demoModel;
    }

    public function getAllUser()
    {
        return $this->model->all();
    }

    public function createDemo($request)
    {
        return $this->model->create($request->validated());
    }

    public function showDemo($id)
    {
        return $this->model->find($id);
    }

    public function updateDemo($request,$id){
        
        return $this->model->where('id',$id)->update($request->validated());
    }

    public function deleteDemo($id)
    {
        return $this->model->find($id)->delete();
    }
}