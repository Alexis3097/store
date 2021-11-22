<?php


namespace App\IRepositories;


interface IProductoRepository extends IBaseRepository
{
    public function buscar($data);
    public function getProductosXcategoria($idCategoria);
    public function buscarProductosXCategoria($query,$id);
}
