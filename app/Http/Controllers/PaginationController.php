<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect,Response,DB,Config;
use Datatables;
use App\Models\User;
// use Yii;
// use yii\data\Pagination;
// use Illuminate\Database\PDO\Connection;
// use PDO;

class PaginationController extends Controller
{
    public function index()
    {

        // $db = new PDO('mysql"dbname=packages_test;host127.0.0.1', 'musah', 'abumucal');

        // User input
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        // echo $page;
        $per_page = isset($_GET['per-page']) && $_GET['per-page'] <= 50 ? (int)$_GET['per-page'] : 5;
        // echo $per_page;

        // Positioning
        $start = ($page > 1) ? ($page * $per_page) - $per_page : 0;

        // echo $star t;

        // Query
        $users = DB::select("SELECT SQL_CALC_FOUND_ROWS id, name, email FROM users LIMIT {$start}, {$per_page}");
        // $users = $db->prepare("
        // SELECT * FROM users LIMIT 0, {$per_page}
        // ");

        // $users->execute();

        // $users = $users->fetchAll(PDO::FETCH_ASSOC);
        // var_dump($users);
        // $users = DB::select("SELECT * FROM users LIMIT 0, {$per_page}");
        // $users = DB::select('SELECT * from users LIMIT 0, 5');
        // dd($users);
        // $users = (object) $users;
        // dd($users);
        // var_dump($users);

        // Pages
        // $total = DB::select("SELECT FOUND_ROWS() AS total");
        // echo ($total);
        // var_dump($total);

        return view('pagination.vanilla', [
            'users' => $users
        ]);
    }
}
