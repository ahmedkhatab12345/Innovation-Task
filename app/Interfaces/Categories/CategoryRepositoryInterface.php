<?php
namespace App\Interfaces\Categories;

interface CategoryRepositoryInterface                         
{
    //get all Categories
    public function index();

    // add Category
    public function create();

    // stor Category
    public function store($request);

    //get CategoryEdit
    public function edit($id);

    //update Category
    public function update($request,$id);

    //destroy Category
    public function destroy($id);
}
    
