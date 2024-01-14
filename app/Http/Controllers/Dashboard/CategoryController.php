<?php
namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Interfaces\Categories\CategoryRepositoryInterface; 
class CategoryController extends Controller
{
    private $Categories;
  
    public function __construct(CategoryRepositoryInterface $Categories)
    {
        $this->Categories = $Categories;
    }
        //get all Categories
    public function index()
    {
        return  $this->Categories->index();
    }
        // add Category
    public function create()
    {
        return  $this->Categories->create();
    }
        // stor Category
    public function store(CategoryRequest $request)
    {
        return  $this->Categories->store($request);
    }
        //get CategoryEdit
    public function edit(string $id)
    {
        return  $this->Categories->edit($id);
    }
        //update Category
    public function update(CategoryRequest $request, $id)
    {
        return  $this->Categories->update($request, $id);
    }
        //destroy Category

    public function destroy($id)
    {
        return  $this->Categories->destroy($id);
    }
}
