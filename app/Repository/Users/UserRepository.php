<?php
namespace App\Repository\Users;   
use App\Interfaces\Users\UserRepositoryInterface; 
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class UserRepository implements UserRepositoryInterface 
{
    
    //get all Users
    public function index()
    {
        $users = User::all();
        return view('dashboard.users.index',compact('users'));
    }
        // add User
    public function create()
    {
        return view('dashboard.users.create');
    }

        // stor User
    public function store($request)
    {  
        try {

         //fetch all request
        $users = $request->all();  
        
        //hash password
        $hashedPassword = Hash::make($users['password']);

        //store data
        $users = User::create([              
            'name'=> $users['name'],
            'email'=> $users['email'],
            'birthdate'=> $users['birthdate'],
            'password'=> $hashedPassword ,
        ]);
        return view('dashboard.users.index')->with('success', 'User added successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error adding user: ' . $e->getMessage())->withInput();
        }
    }

        //get UserEdit
    public function edit($id)
    {
        $users = User::find($id);
        if (!$users) {
            return redirect()->route('users.index')->with(['error' => 'This User Is Not Found']);
        }

        return view('dashboard.users.edit', compact('users'));
    }
        //update User
    public function update($request,$id)
    {
        try {
            $user = User::find($id);
        
            if (!$user) {
                throw new \Exception('User not found');
            }
        
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'birthdate' => $request->birthdate,
                'password' => $request->password ? bcrypt($request->password) : $user->password,
            ]);
        
            return redirect()->route('users.index')->with('success', 'User updated successfully');
        } catch (\Exception $e) {
            return redirect()->route('users.index')->with('error', $e->getMessage());
        }
        
    }
        //destroy User
    public function destroy($id)
    {
        $user = User::destroy($id);

        if ($user) {
            return redirect()->route('users.index')->with('success', 'User deleted successfully');
        } else {
            return redirect()->route('users.index')->with('error', 'User not found');
        }
    }
}

    
    
    
    
    
