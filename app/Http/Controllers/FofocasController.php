<?php

namespace App\Http\Controllers;

use App\Models\Fofocas;
use Illuminate\Http\Request;

class FofocasController extends Controller
{

    protected $fofocas;

    public function __construct(Fofocas $fofocas)
    {
        $this->fofocas = $fofocas;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fofocas = $this->fofocas->all(['id','titulo','conteudo']);
        return response()->json($fofocas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
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
        $fofoca =  $this->fofocas->create($request->all());
        return response()->json([
            'message'=>'Criado com sucesso!',
            'fofoca'=>$fofoca
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fofocas  $fofocas
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fofoca = $this->fofocas->find($id);
        return response()->json($fofoca);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fofocas  $fofocas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $fofoca = $this->fofocas->fill($request->post())->save();
        return response()->json([
            'message'=>'fofoca atualizada!!',
            'fofoca'=>$fofoca
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fofocas  $fofocas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        return $this->fofocas->where('id', $id)->delete();
    }
}
