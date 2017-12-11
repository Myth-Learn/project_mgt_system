<?php

namespace App\Http\Controllers;
use DB;
use Response;
use Session;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function data()
    {
        $data = DB::select( 
            DB::raw("select u.*, r.role, c.name as country_name
                    FROM users as u
                    LEFT JOIN roles as r on r.id = u.user_role
                    LEFT JOIN countries as c on c.code = u.country_code
                    where u.user_role > 1
                    ORDER by u.id DESC")
        );
        return $data;
    }

    public function show()
    {
        $data = $this->data();
        return view('layouts.admin', compact('data'));
    }

    public function userState($id, Request $request)
    {
        $state = $request->get('state');
        
        $user = User::find($id);
        if($state == 'true') {
            $user->status = 1;
            Session::flash('Success', 'User Activated!');        
        } else if($state == 'false') {
            $user->status = 0;
            Session::flash('Success', 'User De-Activated!');
        }
        $user->save();        
        return Response::json(true);
    }
}
