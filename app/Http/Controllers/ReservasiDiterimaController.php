<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ReservasiDiterimaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client = new Client;
        $request = $client->get(ENV('API_URL').'/graphql?query={statusReservasi(progress:"konfirm"){tanggal,header_reservasi_id{tanggal_reservasi,tamu,kode,detail_reservasi{produk_id{nama,harga,}karyawan_id{nip,nama}}}}}');
        $response = $request->getBody()->getContents();
        $data = json_decode($response, true);
        
        // foreach ($data['data']['statusReservasi'] as $datas) {
        //     $datas['tanggal'] = date('y-m-d',strtotime($datas['tanggal']));
        // }
        // dd($datas);

        // $datas = $data['data']['statusReservasi'][0]['tanggal'];
        // dd($datas);
        // $datass = date('y-m-d', strtotime($datas));
        return view('admin.reservasi.reservasiditerima')->withData($data);
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
        $client = new Client;
        $request = $client->get(ENV('API_URL').'/graphql?query=mutation{CheckinReservasi(ref_id:"'.$id.'"){status,progress}}');
        $response = $request->getBody()->getContents();
        $data = json_decode($response, true);
        // dd($datas);
        return redirect()->route('checkin.index');
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
