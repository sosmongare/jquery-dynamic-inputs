<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    public function index() 
    {
        return view('index');
    }

    //store dynamic input fields as multiple rows
    public function stores(Request $request)
    {
       $request->validate([
            'moreFields.*.message.*' => 'required'
        ]);

        foreach ($request->moreFields as $key => $fields) {
            Todo::create([
                    'title' => $request->title,
                    'message' => $fields['message'],
                ]);
        }
     
        return redirect()->route('store')->with('success', 'Record created Successfully.');
    }

    //store dynamic input fields as single row, record separated by comma
    public function store(Request $request)
    {
       $request->validate([
            'moreFields.*.message.*' => 'required'
        ]);

       // Concatenate all the messages into a single string
        $message = implode(', ', array_map(function ($fields) {
            return $fields['message'];
        }, $request->moreFields));

        Todo::create([
                'title' => $request->title,
                'message' => $message,
            ]);
    
        return redirect()->route('store')->with('success', 'Record Created Successfully.');
    }


    
}
