<?php


namespace App\IRepositories;


interface IBaseRepository
{
    public function all();
    public function create($data);
    public function show($id);
    public function update($id,$data);
    public function delete($id);
}
