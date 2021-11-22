<?php


namespace App\IRepositories;


interface ICategoriaRepository extends IBaseRepository
{
    public function allActive();
    public function getCategoriasConProductos();
    public function buscarCategoria($query);

}
