<?php

namespace App\Http\Controllers;

use App\Models\Biaya;
use App\Http\Requests\StoreBiayaRequest;
use App\Http\Requests\UpdateBiayaRequest;
use Illuminate\Support\Facades\Storage;

class BiayaController extends Controller
{
    private $viewIndex = 'biaya_index';
    private $viewCreate = 'biaya_form';
    private $viewEdit = 'biaya_form';
    private $viewShow = 'biaya_show';
    private $routePrefix = 'biaya';

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
     * @param  \App\Http\Requests\StoreBiayaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBiayaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Biaya  $biaya
     * @return \Illuminate\Http\Response
     */
    public function show(Biaya $biaya)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Biaya  $biaya
     * @return \Illuminate\Http\Response
     */
    public function edit(Biaya $biaya)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBiayaRequest  $request
     * @param  \App\Models\Biaya  $biaya
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBiayaRequest $request, Biaya $biaya)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Biaya  $biaya
     * @return \Illuminate\Http\Response
     */
    public function destroy(Biaya $biaya)
    {
        //
    }
}
