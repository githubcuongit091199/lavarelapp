<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::table('users')->get();
        
        return View('user.admin', ['users' => $users]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $user = User::all();
        $affected = DB::table('users')
        ->insert(['name' =>  $request->input('name'),
                    'email' =>  $request->input('email'),
                    'password' =>  $request->input('password'), 
                    'role_id'=> 2                                           
            ]);
        return redirect(route('users.index', compact('user')));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('user.index', ['users' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return View('user.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->file()) {
            $fileName = $request->file('avatar')->getClientOriginalName();
            $filePath = $request->file('avatar')->storeAs('uploads', $fileName, 'public');
            //tham số thứ 3 là chỉ lưu trên disk 'public', tham số thứ 1:  lưu trong thư mục 'uploads' của disk 'public'
           $avatar = '/storage/' . $filePath;
            // $filepath='uploads/'+$fileName --> $profile->avatar = 'storage/uploads/tenfile --> đường dẫn hình trong thư mục public
            }
        $user=User::find($id);
        if(isset($user->profile->id)==false)
        {
            $affected = DB::table('profiles')
            ->insert(['full_name' =>  $request->input('full_name'),
                        'address' =>  $request->input('address'),
                        'birthday' =>  $request->input('birthday'),                      
                        'avatar' => $avatar,    
                        'user_id' =>  $user->id,                                           
                ]);
        }
       else
       {
        $affected = DB::table('profiles')
            ->where('user_id', $id )
            ->update(['full_name' =>  $request->input('full_name'),
                        'address' =>   $request->input('address'),
                        'birthday' =>   $request->input('birthday'),
                        'avatar' => $avatar,                                                    
                ]);
       }
        return redirect(route('users.show', compact('user')))->with('message','Update User complete!!!!');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if($user->profile !== null)
        {
            $user->profile->delete();
        }
        return redirect(route('users.index', compact('user')))->with('message','Delete profile complete!!!!');
    }
    
}
