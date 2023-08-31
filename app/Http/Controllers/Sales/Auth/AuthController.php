<?php
namespace App\Http\Controllers\Sales\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Bracelets;
use App\Models\Category;
use App\Models\DiscountReason;
use App\Models\Payment;
use App\Models\Product;
use App\Models\User;
use App\Models\VisitorTypes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Ifsnop\Mysqldump as IMysqldump;
use App\Classes\Import;
use Illuminate\Support\Facades\Schema;
use mysqli;
use PDO;

class AuthController extends Controller{


    public function __construct()
    {
        $this->middleware('auth')->only('logout');
    }

    public function view()
    {
        if (auth()->check()) {
            return redirect('/sales');
        }
        return view('sales.auth.login');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {

        $data = $request->validate([
            'user_name' => 'required|exists:users',
            'password' => 'required'
        ]);
        $data['status'] = 1;

        if (auth()->attempt($data)) {
            return response()->json(200);
        }
        return response()->json(405);
    }

    public function logout()
    {
        auth()->logout();
        toastr()->info('logged out successfully');
        return redirect('login');
    }


    public function uploadData()
    {
//        Artisan::call('sync:new-records');

    }

    private function is_connected()
    {
        $connected = @fsockopen("www.example.com", 80);

        if ($connected) {
            $is_conn = true;
            fclose($connected);
        } else {
            $is_conn = false;
        }
        return $is_conn;

    }



}

