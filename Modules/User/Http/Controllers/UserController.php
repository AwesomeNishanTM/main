<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\User\Repositories\IUserRepository;
use Modules\User\Entities\User;


class UserController extends Controller
{
    protected $user;
    public function __construct(IUserRepository $user){
        $this->user=$user;

     }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {

        $users = $this->user->list();
        // dd($users);
        return view('user::index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $users = $this->user->list();
        // dd($users);
        return view('user::create',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $this->user->storeOrUpdate($id = null, $data);
        return redirect()->route('user.index');
        // ->with([
        //     'message' => 'User added successfully!',
        //     'status' => 'success'
        // ]);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        // $users=User::all();

        $user = $this->user->findById($id);
        // dd($user);
        return view('user::show',compact('user'));


    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $user = $this->user->findById($id);
        // dd($user);
        return view('user::edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //

        $data = $request->validate([
            'name' => 'required',
            'email' => 'required'
        ]);

        $this->user->storeOrUpdate($id, $data);

        // return view('user::index');
        return redirect()->route('user.index');

        // ->with([
        //     'message' => 'User updated successfully!',
        //     'status' => 'success'
        // ]);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
        $this->user->destroyById($id);
        return redirect()->route('user.index');

    }
        // return view('user::index');
        // ->with([
        //     'message' => 'User deleted successfully!',
        //     'status' => 'success'
        // ]);

}

