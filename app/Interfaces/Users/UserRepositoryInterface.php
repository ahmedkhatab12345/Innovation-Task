<?php
namespace App\Interfaces\Users;

interface UserRepositoryInterface                         
{
    //get all Users
    public function index();

    // add User
    public function create();

    // stor User
    public function store($request);

    //get UserEdit
    public function edit($id);

    //update User
    public function update($request,$id);

    //destroy User
    public function destroy($id);
}