<?php

namespace App\Http\Controllers\Adm;

use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
        //$users = User::paginate(60);
        return view('admin.settings');
    }
}
