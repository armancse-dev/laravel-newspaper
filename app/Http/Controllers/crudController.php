<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Input;
use DB;
use Session;
use Request;

class crudController extends Controller
{
    public function insertData(){
        $data = Request::except('_token');
        $tbl = decrypt($data['tbl']);
        unset($data['tbl']);
        $data['created_at'] = date('Y-m-d H:i:s');
        DB::table($tbl)->insert($data);
        session::flash('message', 'Data Insert Successfully');
        return redirect()->back();
    }
}
