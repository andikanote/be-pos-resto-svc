<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //CallIndex
    public function index(Request $request)
    {
        $users = DB::table('users')
        ->when($request->search, function ($query) use ($request){
            $query->where('name', 'like', '%' . $request->search . '%');
        })
        ->paginate(2);
        return view('pages.user.index', compact('users'));
    }
}
