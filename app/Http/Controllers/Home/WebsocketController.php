<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Basic\Supp;
use Excel;
use Auth;
use Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;

use Illuminate\Support\Facades\DB;

class WebsocketController extends Controller
{
    public $data;

    private static $success = '0200';

    public function __construct()
    {
        //$this->middleware('auth');

        if(env('APP_ENV') == 'test') {
            DB::enableQueryLog();
        }
    }


    public function index(Request $request) {
        $params = $request->all();

        $info = [
            'room_id'  => empty($params['room_id']) ? 11 : $params['room_id'],
            'user_id'  => empty($params['user_id']) ? 55 : $params['user_id'],
        ];

        return view('websocket.index')->with([
            'info' => $info
        ]);
    }

}
