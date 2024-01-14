<?php
namespace App\Repository\Movies;   
use App\Interfaces\Movies\MovieRepositoryInterface; 
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;
use App\Models\Movie;
use App\Models\Category;
use App\Traits\UploadTrait;
use File;
class MovieRepository implements MovieRepositoryInterface 
{
    use UploadTrait;
        //get all Movies
    public function index()
    {
        $movies = Movie::all();
        return view('dashboard.movies.index',compact('movies'));
    }
        // add Movie
    public function create()
    {
        $categories = Category::all();
        return view('dashboard.movies.create',compact('categories'));
    }
        // stor Movie
    public function store($request)
    {
        try {
        //save photo
        $file_name=$this ->saveImage($request->image,'images/movies');
        //fetch data
        $movies = $request->all();
        //store data
        $movies = Movie::create([              
            'title'=> $movies['title'],
            'description'=> $movies['description'],
            'rate'=> $movies['rate'],
            'category_id'=> $movies['category_id'],
            'image'=>$file_name,
        ]);
        return view('dashboard.movies.index')->with('success', 'movie added successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error adding movie: ' . $e->getMessage())->withInput();
        }
    }
        //get MovieEdit
    public function edit($id)
    {
        $movies = Movie::find($id);
        $categories = Category::all();
        if (!$movies) {
            return redirect()->route('movies.index')->with(['error' => 'This movie Is Not Found']);
        }

        return view('dashboard.movies.edit', compact('movies','categories'));
    }
        //update Movie
    public function update($request,$id)
    {
        try {
            $movie = Movie::find($id);
        
            if (!$movie) {
                return redirect()->route('movies.index')->with('error', 'Movie not found');
            }
        
            // Check if the request has an image
            if ($request->hasFile('image')) {
                // Delete the old image
                if ($movie->image) {
                    Storage::delete($movie->image);
                }
        
                // Save the new image
                $file_name = $this->saveImage($request->image, 'images/movies');
        
                // Update the movie with the new image
                $movie->update([
                    'image' => $file_name
                ]);
            }
        
            // Update other data
            $movie->update([
                'title' => $request->title,
                'description' => $request->description,
                'rate' => $request->rate,
                'category_id' => $request->category_id,
            ]);
        
            return redirect()->route('movies.index')->with('success', 'Movie updated successfully');
        } catch (\Exception $e) {
            // Handle the exception, for example, redirect back with an error message
            return redirect()->back()->with('error', 'Error updating movie: ' . $e->getMessage())->withInput();
        }
        
    }
        //destroy Movie
    public function destroy($id)
    {
        $movies = Movie::destroy($id);

        if ($movies) {
            return redirect()->route('movies.index')->with('success', 'movie deleted successfully');
        } else {
            return redirect()->route('movies.index')->with('error', 'movie not found');
        }
    }
}