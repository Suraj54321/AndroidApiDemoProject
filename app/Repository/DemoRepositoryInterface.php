<?php
namespace App\Repository;

use Illuminate\Database\Eloquent\Model;

interface DemoRepositoryInterface{
    public function getAllUser();

    public function createDemo($request);

    public function showDemo($id);

    public function updateDemo($request,$id);

    public function deleteDemo($id);
}