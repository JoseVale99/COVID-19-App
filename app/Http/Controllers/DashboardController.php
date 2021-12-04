<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;



class DashboardController extends Controller
{
    // Positive cases by state : Gobmx_covid_stats_state
    public $URL_STATES ="https://api.datamexico.org/tesseract/data?Covid+Result=1&cube=gobmx_covid&drilldowns=Updated+Date%2CState&measures=Cases";
    // Total cases at the national level
    public $TOTAL_CASES_COVID = "https://api.datamexico.org/tesseract/data.jsonrecords?Covid+Result=1&cube=gobmx_covid&drilldowns=Covid+Result%2CUpdated+Date&measures=Cases&parents=false&sparse=false"; 
    // Cases by Oaxaca municipality
    Public $CASES_COVID_MUNICIPALITY = "https://datamexico.org/api/data.jsonrecords?cube=gobmx_covid_stats_mun&drilldowns=Municipality&measures=Accum+Cases,Daily+Cases,AVG+7+Days+Accum+Cases,AVG+7+Days+Daily+Cases,Rate+Daily+Cases,Rate+Accum+Cases,Days+from+50+Cases&s=Daily%20New%20Cases&r=rollingMeanOption&locale=es&time=time.latest&State=20";
    public function index(){
        $client = new Client(); 
        $url = $this->TOTAL_CASES_COVID;
        $response = $client->request('GET', $url, [
            'verify'  => false,
        ]);
        $url_states = $this->URL_STATES;
        $response_states = $client->request('GET', $url_states, [
            'verify'  => false,
        ]);
        $result_covid = json_decode($response->getBody(), true);
        $covid_states = json_decode($response_states->getBody(), true);
        $covid_oaxaca_cases = $covid_states["data"]["19"];
    
        return view('app.index',compact('result_covid','covid_oaxaca_cases'));
    }




    public function getData()
    {
        $client = new Client(); //GuzzleHttp\Client
        $url = $this->CASES_COVID_MUNICIPALITY;


        $response = $client->request('GET', $url, [
            'verify'  => false,
        ]);

        
        $data_covid = json_decode($response->getBody(), true);
        
       
    
        return view('app.table',compact('data_covid'));
    }


    public function getDataStates()
    {
        $client = new Client(); //GuzzleHttp\Client
        $url = $this->URL_STATES;


        $response = $client->request('GET', $url, [
            'verify'  => false,
        ]);

        
        $states_covid = json_decode($response->getBody(), true);
        
       
    
        return view('app.states',compact('states_covid'));
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
