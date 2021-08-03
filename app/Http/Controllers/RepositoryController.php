<?php

namespace App\Http\Controllers;

use App\Repositories\IUserRepository;
use Illuminate\Http\Request;

class RepositoryController extends Controller
{

    public $user;

    public function __construct(IUserRepository $user)
    {
        $this->user=$user;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allUser=$this->user->getAllUsers();
        return view('repositery.repositeryview',compact('allUser'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('repositery.repositeryinsert');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http
     */
    public function store(Request $request)
    {
        $this->user->userInsert($request);
        return redirect()->route('user.repo.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editData=$this->user->userEdit($id);
        return view('repositery.repositeryedit',compact('editData'));
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
        $this->user->userUpdate($request,$id);
        return redirect()->route('user.repo.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->user->userDelete($id);
        return redirect()->route('user.repo.index');

    }
}
