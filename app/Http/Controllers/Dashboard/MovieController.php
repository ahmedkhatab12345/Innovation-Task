<?php
namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\MovieRequest;
use App\Interfaces\Movies\MovieRepositoryInterface; 
use App\Traits\UploadTrait;
use DataTables;
class MovieController extends Controller
{
    private $Movies;
  
    public function __construct(MovieRepositoryInterface $Movies)
    {
        $this->Movies = $Movies;
    }
        //get all Movies
    public function index()
    {
        return  $this->Movies->index();
    }
        // add Movie
    public function create()
    {
        return  $this->Movies->create();
    }
        // stor Movie
    public function store(MovieRequest $request)
    {
        return  $this->Movies->store($request);
    }
        //get MovieEdit
    public function edit(string $id)
    {
        return  $this->Movies->edit($id);
    }
        //update Movie
    public function update(MovieRequest $request, $id)
    {
        return  $this->Movies->update($request,$id);
    }
        //destroy Movie
    public function destroy(string $id)
    {
        return  $this->Movies->destroy($id);
    }
}