<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;

class SearchController extends Controller
{
    public function index()
    {
        return view('search_page');
    }
    public function search(Request $request)
    {
        $query = $request->input('query');
        $users = Users::with(['department', 'designation'])
            ->where(function ($q) use ($query) {
                $q->where('name', 'LIKE', '%' . $query . '%')
                  ->orWhereHas('department', function ($q) use ($query) {
                      $q->where('name', 'LIKE', '%' . $query . '%');
                  })
                  ->orWhereHas('designation', function ($q) use ($query) {
                      $q->where('name', 'LIKE', '%' . $query . '%');
                  });
            })
           
            ->get();
            //dd($users);
        // $user = Users::with('designations')->get();
        // dd($user[1]->designations[0]->name);
        // //echo $request->input('query');
        // //Users::with('designations')->get();
        //  $query = $request->input('query');
        // if($query)
        // {
        //     $users = Users::with('designations')->where('name', 'LIKE', "%{$query}%")
        //               ->get();
                     
        // //echo $users;
        return response()->json($users);
        // }
        //echo $query;
        //$users = Users::all();
        
    }
}
