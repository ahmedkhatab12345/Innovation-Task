<?php
namespace App\Interfaces\Movies;

interface MovieRepositoryInterface                         
{
    //get all Movies
    public function index();

    // add Movie
    public function create();

    // stor Movie
    public function store($request);

    //get MovieEdit
    public function edit($id);

    //update Movie
    public function update($request,$id);

    //destroy Movie
    public function destroy($request);
}
    
