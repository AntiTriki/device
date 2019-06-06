<?php

namespace App\Http\Controllers;

use App\Equipmentassignment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EquipmentassignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $asig = DB::table('equipmentassignments')->get();
        $user = DB::table('users')->get();
        $posi = DB::table('positions')->get();
        $branch = DB::table('branches')->get();
        $pc = DB::table('pcs')->get();
        $peri = DB::table('peripherals')->get();
        $occu = DB::table('occurences')->get();
        return view('device.equipmentassignments',['asig'=>$asig,'user'=>$user,'pc'=>$pc,'posi'=>$posi,'branch'=>$branch,'peri'=>$peri,'occu'=>$occu]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Equipmentassignment  $equipmentassignment
     * @return \Illuminate\Http\Response
     */
    public function show(Equipmentassignment $equipmentassignment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Equipmentassignment  $equipmentassignment
     * @return \Illuminate\Http\Response
     */
    public function edit(Equipmentassignment $equipmentassignment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Equipmentassignment  $equipmentassignment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Equipmentassignment $equipmentassignment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Equipmentassignment  $equipmentassignment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Equipmentassignment $equipmentassignment)
    {
        //
    }
}
