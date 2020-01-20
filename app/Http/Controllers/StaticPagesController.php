<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaticPagesController extends Controller
{
    function __construct()
    {
        $this->jobs = [
            1 =>  ['id' => 1, 'title' => 'Housekeeping Supervisor', 'classification' => 'Machinery/Heavy Industry', 'type' => 'volunteer', 'company logo' => 'images/logo1.png', 'company name' => 'Jast Inc', 'city' => 'Sydney|Five Dock', 'company size' => '10-19people'],
            2 => ['id' => 2, 'title' => 'Data Entry Operator', 'classification' => 'Telecommunication', 'type' => 'Contract', 'company logo' => '', 'company name' => 'Jast Inc', 'city' => 'Sydney|Maroubra', 'company size' => '10-19people'],
            3 => ['id' => 3, 'title' => 'Recreational Vehicle Service Technician', 'classification' => 'Land/Property Management', 'type' => 'volunteer', 'company logo' => '', 'company name' => 'Jast Inc', 'city' => 'Sydney|Mcmahons Point', 'company size' => '10-19people'],
            4 =>  ['id' => 4, 'title' => 'Funeral Director', 'classification' => 'Furniture/Appliance/Toys', 'type' => 'Contract', 'company logo' => '', 'company name' => 'Jast Inc', 'city' => 'Sydney|Osborne Park', 'company size' => '10-19people'],
            5 =>  ['id' => 5, 'title' => 'title5', 'classification' => 'classification5', 'type' => 'type5', 'company logo' => '', 'company name' => 'company name 5', 'city' => 'Sydney|Five Dock', 'company size' => '10-19people']
        ];
    }

    public function home()
    {
        return view('static_pages/home',['jobs'=>$this->jobs]);
    }

    public function job()
    {
        return view('static_pages/job');
    }
    public function jobDetail($id)
    {
        return view('static_pages/jobDetail',['jobs'=>$this->jobs[$id]]);
    }
    public function about()
    {
        return view('static_pages/about');
    }
}
