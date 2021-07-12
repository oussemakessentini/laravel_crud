<?php

namespace App\Http\Controllers;

use App\Models\medicin;
use Illuminate\Http\Request;

class MedicinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //liste medicins
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //affichage formulaire creation ajouter

        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //ajout dans bd
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\medicin  $medicin
     * @return \Illuminate\Http\Response
     */
    public function show(medicin $medicin)
    {
        // affichaége chaque medicin
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\medicin  $medicin
     * @return \Illuminate\Http\Response
     */
    public function edit(medicin $medicin)
    {
        //formulaire modification
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\medicin  $medicin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, medicin $medicin)
    {
        // modification dans la base
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\medicin  $medicin
     * @return \Illuminate\Http\Response
     */
    public function destroy(medicin $medicin)
    {
        // delete 
    }
}
