<?php
namespace App\Repository\Categories;   
use App\Interfaces\Categories\CategoryRepositoryInterface; 
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
class CategoryRepository implements CategoryRepositoryInterface 
{
        //get all Categories
    public function index()
    {
        $categories = Category::all();
        return view('dashboard.categories.index',compact('categories'));
    }

        // add Category
    public function create()
    {
        return view('dashboard.categories.create');
    }
        // stor Category
    
    public function store($request)
    {
        try {

            //fetch all request
           $categories = $request->all();  

           //store data
           $categories = Category::create([              
               'title'=> $categories['title'],
           ]);
           return view('dashboard.categories.index')->with('success', 'Category added successfully.');
           } catch (\Exception $e) {
               return redirect()->back()->with('error', 'Error adding Category: ' . $e->getMessage())->withInput();
           }
    }

        //get CategoryEdit
    public function edit($id)
    {
        $categories = Category::find($id);
        if (!$categories) {
            return redirect()->route('categories.index')->with(['error' => 'This User Is Not Found']);
        }

        return view('dashboard.categories.edit', compact('categories'));
    }
        //update Category
    public function update($request,$id)
    {
        try {
            $categories = Category::find($id);
        
            if (!$categories) {
                throw new \Exception('Category not found');
            }
        
            $categories->update([
                'title' => $request->title,
            ]);
        
            return redirect()->route('categories.index')->with('success', 'Category updated successfully');
        } catch (\Exception $e) {
            return redirect()->route('categories.index')->with('error', $e->getMessage());
        }
        
    }
        //destroy Category
    public function destroy($id)
    {
        $category = Category::destroy($id);

        if ($category) {
            return redirect()->route('categories.index')->with('success', 'Category deleted successfully');
        } else {
            return redirect()->route('categories.index')->with('error', 'Category not found');
        }
    }
}