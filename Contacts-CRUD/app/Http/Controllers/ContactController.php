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

        $data = DB::table('contacts')
                ->select(DB::raw('count(*) as user_count, user_id'))
                ->groupby('user_id')
                ->get();
        
        return view('contacts.index', ['contacts' => $data]);
    }
}