<?php

namespace App\Http\Controllers;

use App\Models\Parroquia;
use App\Http\Requests\StoreParroquiaRequest;
use App\Http\Requests\UpdateParroquiaRequest;

class ParroquiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreParroquiaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreParroquiaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Parroquia  $parroquia
     * @return \Illuminate\Http\Response
     */
    public function show(Parroquia $parroquia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Parroquia  $parroquia
     * @return \Illuminate\Http\Response
     */
    public function edit(Parroquia $parroquia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateParroquiaRequest  $request
     * @param  \App\Models\Parroquia  $parroquia
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateParroquiaRequest $request, Parroquia $parroquia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Parroquia  $parroquia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Parroquia $parroquia)
    {
        //
    }
}
