<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class TerapisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client = new Client;
        $request = $client->get(ENV('API_URL').'/graphql?query={KaryawanQuery{id,uuid,nip,nama,rating,penempatan{posisi,tanggal_mulai,tanggal_berakhir,workshift{hari,jam_mulai,jam_akhir}ketersediaan{hari,jam_mulai,jam_akhir}}}}');
        $response = $request->getBody()->getContents();
        $data = json_decode($response, true);
        // dd($data);
        return view('admin.therapist.index')->withData($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        $uuid = $request->uuid;
        $nip = $request->nip;
        $nama = $request->nama;

        // $test1 = 'http://localhost:3000/graphql?query=mutation{createProduk(nama:"'.$nama.'",kode:"'.$kode.'",waktu:'.$waktu.',harga:'.$harga.',deskripsi:"'.$deskripsi.'"){nama,kode,waktu,harga,deskripsi}}';
        // dd($test1);

        $client = new Client;
        $response = $client->post(ENV('API_URL').'/graphql?query=mutation{CreateKaryawan(nama:"'.$nama.'"){nip,nama}}');
        
        $test = $response->getBody()->getContents();
        return redirect()->route('terapis.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $client = new Client;
        $request = $client->get(ENV('API_URL').'/graphql?query={KaryawanQuery(id:'.$id.'){id,uuid,nip,nama,rating,penempatan{posisi,tanggal_mulai,tanggal_berakhir,workshift{hari,jam_mulai,jam_akhir}ketersediaan{hari,jam_mulai,jam_akhir}}}}');
        $response = $request->getBody()->getContents();
        $data = json_decode($response, true);
        // dd($data);
        return view('admin.therapist.workshift')->withData($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
