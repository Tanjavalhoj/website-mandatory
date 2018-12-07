<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client = new Client();
        $response = $client->get('http://localhost:8000/api/youtubeuser/1');
        if ($response->getStatusCode()) {
            $posts = json_decode($response->getBody()->getContents());
            return view('home', ['posts' => $posts]);
        }
        return view('home');
    }
}
