<?php
namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Interfaces\Users\UserRepositoryInterface; 

class UserController extends Controller
{
    private $Users;
  
    public function __construct(UserRepositoryInterface $Users)
    {
        $this->Users = $Users;
    }
        //get all Users
    public function index()
    {
        return  $this->Users->index();
    }
        // add User
    public function create()
    {
        return  $this->Users->create();
    }
        // stor User
    public function store(UserRequest $request)
    {
        return  $this->Users->store($request);
    }

        //get UserEdit
    public function edit(string $id)
    {
        return  $this->Users->edit($id);
    }
        //update User
    public function update(Request $request,$id)
    {
        return  $this->Users->update($request,$id);
    }
        //destroy User
    public function destroy($id)
    {
        return  $this->Users->destroy($id);
    }
}
