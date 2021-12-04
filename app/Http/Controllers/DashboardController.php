<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;



class DashboardController extends Controller
{

    public function index()



    {
        return view('app.index');
    }




    public function getData()
    {
        $client = new Client(); //GuzzleHttp\Client
        $url = env('API_ENDPOINT');


        $response = $client->request('GET', $url, [
            'verify'  => false,
        ]);

        
        $data_covid = json_decode($response->getBody(), true);
        
       
    
        return view('app.table',compact('data_covid'));
    }


    public function store(Request $request)
    {
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
