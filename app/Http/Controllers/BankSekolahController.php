<?php

namespace App\Http\Controllers;

use App\Models\BankSekolah;
use App\Http\Requests\StoreBankSekolahRequest;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateBankSekolahRequest;

class BankSekolahController extends Controller
{
    private $viewIndex = 'bank_index';
    private $viewCreate = 'bank_form';
    private $viewEdit = 'bank_form';
    private $routePrefix = 'bank';
    private $accessClass = 'Data Bank Sekolah';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if  ($request->filled('q')) {
            $models = BankSekolah::with('user')->search($request->q)->paginate(10);
        } else {
            $models = BankSekolah::with('user')->latest()->paginate(10);
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
            'model' => new BankSekolah(),
            'method' => 'POST',
            'route' => $this->routePrefix . '.store',
            'button' => 'SIMPAN',
            'title' => 'FORM DATA BANK SEKOLAH',

        ];
        return view('operator.' . $this->viewCreate, $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBankSekolahRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBankSekolahRequest $request)
    {
        BankSekolah::create($request->validated());
        flash('Data berhasil disimpan', 'success');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BankSekolah  $bankSekolah
     * @return \Illuminate\Http\Response
     */
    public function show(BankSekolah $bankSekolah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BankSekolah  $bankSekolah
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [
            'model' => BankSekolah::findOrFail($id),
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
     * @param  \App\Http\Requests\UpdateBankSekolahRequest  $request
     * @param  \App\Models\BankSekolah  $bankSekolah
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBankSekolahRequest $request, $id)
    {
        $model = BankSekolah::findOrFail($id);
        $model->fill($request->validated());
        $model->save();

        flash('Data berhasil diupdate');
        return redirect()->route($this->routePrefix . '.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BankSekolah  $bankSekolah
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = BankSekolah::find($id);
        $model->delete();
        flash('Data berhasil dihapus');
        return back();
    }
}
