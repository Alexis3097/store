<?php


namespace App\IRepositories;


interface ICategoriaRepository extends IBaseRepository
{
    public function allActive();
}
