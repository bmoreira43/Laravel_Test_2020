<?php

namespace App\Http\Controllers;
use App\Url;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class URLController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shortLinks = Url::latest()->get();
        return view('url', compact('shortLinks'));    
    }
    public function apiindex()
    {
        $shortLinks = Url::latest()->get();
        return response()->json([$shortLinks]);

        // return view('url', compact('shortLinks'));    
    }
     
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
           'link' => 'required|url'
        ]);
   
        $input['link'] = $request->link;
        $input['link_short'] =  Str::random(6);
        $input['ip'] = $request->ip();
        
        // check if the user is logged in and store the user id
        if (Auth::check()) {
            $input['user_id'] = Auth::id();
        }else {
            $input['user_id'] = 0;
            
        }
        
        Url::create($input);
  
        return redirect('generate-shorten-link')
             ->with('success', 'Shorten Link Generated Successfully!');
    }
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function shortenLink($code)
    {
        $find = Url::where('link_short', $code)->first();
   
        return redirect($find->link);
    }


}
