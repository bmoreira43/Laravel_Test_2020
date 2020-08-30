<?php

namespace App\Http\Controllers;
use App\Url;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Auth;


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
