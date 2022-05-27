<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect,Response,DB,Config;
use Datatables;
use App\Models\User;
// use Yii;
// use yii\data\Pagination;

class UsersController extends Controller
{
    public function index()
    {
        return view('yajra.users');
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

    public function index_for_editables()
    {
        $users = User::paginate(10);
        return view('editables.index_for_editables', [
            'users' => $users
        ]);
    }
    public function update(Request $request)
    {
        // return view('update');
        if ($request->ajax()) {

            User::find($request->pk)

                ->update([

                    $request->name => $request->value

                ]);

            return response()->json(['success' => true]);

        }
    }

    public function getModalWithForm() {
        $users = User::take(10)->get();
        // dd($users);
        return view('my_modal', [
            'users' => $users
        ]);
    }
    public function postFromModal() {
        $users = User::take(10)->get();
        // dd($users);
        return view('my_modal', [
            'users' => $users
        ]);
    }
    public function paginateData() {
        // $users = User::get();
        // $users = \DB::select("SELECT * FROM users");
        // // $rawData = DB::select("SELECT * FROM users");
        // // dd($users);

        // // $obj_raw_data = (object) $rawData;
        // // dd($obj_raw_data);

        // $count = count($users);
        // // $count = count($rawData);
        // // dd($count);

        // // $pagination = new Pagination(['totalCount' => $count]);

        // // Initialize a Data Pagination with previous count number
        // $pagination = new \yidas\data\Pagination([
        //     'totalCount' => $count,
        // ]);

        // Get range data for the current page
        // $users = $obj_raw_data
        // ->offset($pagination->offset)
        // ->limit($pagination->limit)
        // ->get()->result_array();


        // dd($pagination);

        // Get count of data set first
        $sql = DB::select("SELECT * FROM users");
        // dd($sql);
        $count = count($sql);
        // dd($count);

        // Initialize a Data Pagination with previous count number
        $pagination = new \yidas\data\Pagination([
            'totalCount' => $count,
        ]);

        // Get range data for the current page
        $sql = DB::select("SELECT * FROM `users` LIMIT {$pagination->offset}, {$pagination->limit}");
        // dd($sql);
        // $sth = $conn->prepare($sql);
        // $sth->execute();
        // $users = $sth->fetchAll();
        $users = $sql;
        // dd($users);

        return view('pagination.yidas', [
            'users' => $users,
            'pagination' => $pagination
        ]);
    }
}
