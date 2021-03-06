<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect,Response,DB,Config;
use Datatables;
use App\Models\User;

class CountdownController extends Controller
{
    public function index()
    {
        // return view('yajra.users');
        return view('countdown');
    }
    public function usersList()
    {
        $usersQuery = User::query();

        $start_date = (!empty($_GET["start_date"])) ? ($_GET["start_date"]) : ('');
        $end_date = (!empty($_GET["end_date"])) ? ($_GET["end_date"]) : ('');

        if($start_date && $end_date){

         $start_date = date('Y-m-d', strtotime($start_date));
         $end_date = date('Y-m-d', strtotime($end_date));

         $usersQuery->whereRaw("date(users.created_at) >= '" . $start_date . "' AND date(users.created_at) <= '" . $end_date . "'");
        }
        $users = $usersQuery->select('*');
        return datatables()->of($users)
            ->make(true);
    }
}
