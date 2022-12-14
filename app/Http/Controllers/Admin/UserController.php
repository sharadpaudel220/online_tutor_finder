<?php
namespace App\Models;
namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\User;
use App\Models\Country;
use App\Models\Job;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreUserRequest;
use App\Http\Requests\Admin\UpdateUserRequest;
use Illuminate\Http\Request;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(5);

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('title', 'id');
        $countries = Country::all()->pluck('name', 'id');

        return view('admin.users.create', compact('roles', 'countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $user = User::create($request->validated() + ['password' => bcrypt($request->password)]);
        $user->roles()->sync($request->input('roles'));

        return redirect()->route('admin.users.index')->with('message', "Successfully Created !");   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::pluck('title', 'id');

        $countries = Country::with('country')->pluck('name', 'id');

        return view('admin.users.edit', compact('user','roles', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request,User $user)
    {
        $user->update($request->validated() + ['password' => bcrypt($request->password)]);
        $user->roles()->sync($request->input('roles'));

        return redirect()->route('admin.users.index')->with('message',  "Successfully updated !");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('admin.users.index')->with('message',  "Successfully deleted !");
    }
    public function search()
    {
        $search_text=$_GET['query'];
  
        $teachers=User::where('subject','LIKE','%'.$search_text.'%')->get();
        return view('frontend.teachersprofile', compact('teachers'));
    }
    public function searchbycategory(Request $request)
    {
        // dd($subject);
        // $search_text=$_GET['query'];
        $data=Request()->get('subject');
        // dd($data);

  
        // $teachers=User::where('teachers','LIKE','%'.$search_text.'%')->get();
// $teachers=User::where('subject',Request()->get('subject'))->get();
$teachers=User::where('subject','LIKE','%'.$data.'%')->get();

// dd($teachers);
        return view('frontend.teachersprofile', compact('teachers'));
    }

    public function teacherprofile($id){
        $info=User::find($id);
        return view('frontend.sinleprofile', compact('info'));
    }
        
}
