<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ReservasiMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client = new Client;
        $request = $client->get(ENV('API_URL').'/graphql?query={statusReservasi(status:"pending"){tanggal,header_reservasi_id{id,tanggal_reservasi,tamu,kode,detail_reservasi{produk_id{nama,harga,}karyawan_id{nip,nama}}}}}');
        $response = $request->getBody()->getContents();
        $data = json_decode($response, true);
        // dd($data);
        return view('admin.reservasi.reservasimasuk')->withData($data);
        // $fetch = file_get_contents('http://929bd54c.ngrok.io/graphql?query={produk{nama,kode}}');
        // $test = json_decode($fetch,true);
        // dd($test);
        
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // dd($id);
        $client = new Client;
        $request = $client->get(ENV('API_URL').'/graphql?query=mutation{TerimaReservasi(ref_id:"'.$id.'"){status,progress}}');
        $response = $request->getBody()->getContents();
        $data = json_decode($response, true);
        // dd($datas);
        return redirect()->route('konfirmasi.index');
    }

    public function edit2($id)
    {
        // dd($id);
        $client = new Client;
        $request = $client->get(ENV('API_URL').'/graphql?query=mutation{TolakReservasi(ref_id:"'.$id.'"){status,progress}}');
        $response = $request->getBody()->getContents();
        $data = json_decode($response, true);
        // dd($datas);
        return redirect()->route('konfirmasi.index');
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
