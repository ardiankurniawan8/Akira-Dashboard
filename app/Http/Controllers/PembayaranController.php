<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client = new Client;
        $request = $client->get(ENV('API_URL').'/graphql?query={statusReservasi(progress:"checkin"){tanggal,header_reservasi_id{id,tanggal_reservasi,tamu,kode,detail_reservasi{produk_id{nama,harga,}karyawan_id{nip,nama}}}}}');
        $response = $request->getBody()->getContents();
        $data = json_decode($response, true);
        // dd($data);
        return view('admin.pembayaran')->withData($data);
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

        $client = new Client;
        $time = date('y-m-d h:i:s');
        $request = $client->get(ENV('API_URL').'/graphql?query=mutation{CreateHeader(ref_id:"'.$request->kode.'",tanggal:"'.$time.'", jenis: "Tunai", jumlah: "'.$request->jumlah.'", referensi: "asdf1234"){id,nomor,id_detail{id,ref_id}}}');
        $response = $request->getBody()->getContents();
        $data = json_decode($response, true);
        dd($data);
    }

    public function cekvoucher(Request $request)
    {

        
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
        $request = $client->get(ENV('API_URL').'/graphql?query={headerReservasi(id:'.$id.'){kode,tanggal_reservasi,detail_reservasi{produk_id{nama,harga}karyawan_id{nama}}}}');
        $response = $request->getBody()->getContents();
        $data = json_decode($response, true);
        // dd($data);
        return view('admin.mutation.addPembayaran')->withData($data);
        
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
