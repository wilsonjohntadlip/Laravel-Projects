<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    public function index() {

        // $data = Contact::where('user_id', '>=', 3)->orderby('name', 'asc')->limit(5)->get();

        // query to assign "user_id as user_count" then grouped by "user_id" which should output user_id and user_count
        // $data = DB::table('contacts')
        //         ->select(DB::raw('count(*) as user_count, user_id')) 
        //         ->groupby('user_id')
        //         ->get();

        $data = Contact::where('id', 2)->FirstOrFail()->get();       
        
        return view('contacts.index', ['contacts' => $data]);
    }
    
    public function show($id) {
        $data = Contact::findorFail($id);

        dd($data);
        
        return view('contacts.index', ['contacts' => $data]);
    }
}