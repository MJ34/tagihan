<?php

namespace App\Http\Controllers;

use App\Models\Biaya;
use App\Http\Requests\StoreBiayaRequest;
use App\Http\Requests\UpdateBiayaRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BiayaController extends Controller
{
    private $viewIndex = 'biaya_index';
    private $viewCreate = 'biaya_form';
    private $viewEdit = 'biaya_form';
    private $routePrefix = 'biaya';
    private $accessClass = 'Data Biaya';

    public function index(Request $request)
    {
        if  ($request->filled('q')) {
            $models = Biaya::with('user')->search($request->q)->paginate(10);
        } else {
            $models = Biaya::with('user')->latest()->paginate(10);
        }

        return view('operator.' . $this->viewIndex, [
            'models' => $models,
            'routePrefix' => $this->routePrefix,
            'title' => $this->accessClass
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'model' => new Biaya(),
            'method' => 'POST',
            'route' => $this->routePrefix . '.store',
            'button' => 'SIMPAN',
            'title' => 'FORM DATA BIAYA',

        ];
        return view('operator.' . $this->viewCreate, $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBiayaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBiayaRequest $request)
    {
        Biaya::create($request->validated());
        flash('Data berhasil disimpan', 'success');
        return back();
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
    public function edit($id)
    {
        $data = [
            'model' => Biaya::findOrFail($id),
            'method' => 'PUT',
            'route' => [$this->routePrefix . '.update', $id],
            'button' => 'UPDATE',
            'title' => 'Ubah ' . $this->accessClass,
        ];

        return view('operator.' . $this->viewEdit, $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBiayaRequest  $request
     * @param  \App\Models\Biaya  $biaya
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBiayaRequest $request, $id)
    {
        $model = Biaya::findOrFail($id);
        $model->fill($request->validated());
        $model->save();

        flash('Data berhasil diupdate');
        return redirect()->route($this->routePrefix . '.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Biaya  $biaya
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Biaya::find($id);
        $model->delete();
        flash('Data berhasil dihapus');
        return back();
    }
}
