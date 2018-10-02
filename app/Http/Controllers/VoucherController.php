<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class VoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client = new Client;
        $request = $client->get(ENV('API_URL').'/graphql?query={Voucher(status:1){id,kode,jenis,syarat,jumlah,logo_voucher,tanggal_kadaluarsa,owner_id{username,nama}}}');
        $response = $request->getBody()->getContents();
        $data = json_decode($response, true);
        // dd($data);
        return view('admin.management.voucher')->withData($data);
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
        
        $kode = $request->kode;
        $jumlah = $request->jumlah;
        $tanggal_kadaluarsa = $request->tanggal_kadaluarsa;
        $logo_voucher = $request->logo_voucher;

        // dd($logo_voucher);

        // $test1 = 'http://localhost:3000/graphql?query=mutation{createProduk(nama:"'.$nama.'",kode:"'.$kode.'",waktu:'.$waktu.',harga:'.$harga.',deskripsi:"'.$deskripsi.'"){nama,kode,waktu,harga,deskripsi}}';
        // dd($test1);

        $client = new Client;
        $response = $client->post(ENV('API_URL').'/graphql?query=mutation{CreateVoucher(kode:"'.$kode.'",jumlah:"'.$jumlah.'",tanggal_kadaluarsa:"'.$tanggal_kadaluarsa.'",logo_voucher:"'.$logo_voucher.'"){kode,jenis,jumlah,syarat,tanggal_kadaluarsa,logo_voucher,logo_qr}}');
        
        $test = $response->getBody()->getContents();
        return redirect()->route('voucher.index');
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
        // dd('here');
        $client = new Client;
        $request = $client->get(ENV('API_URL').'/graphql?query={Voucher(id:'.$id.'){id,kode,jenis,syarat,jumlah,logo_voucher,tanggal_kadaluarsa,owner_id{username}}}');
        $response = $request->getBody()->getContents();
        $data = json_decode($response, true);
        // dd($data);
        $datas = $data['data']['Voucher'][0];
        // dd($datas);
        return view('admin.mutation.editVoucher')->withDatas($datas);
    }

    public function editowner($id)
    {
        // dd('hello');
        $client = new Client;
        $request = $client->get(ENV('API_URL').'/graphql?query={Voucher(id:'.$id.'){id,kode,jenis,syarat,jumlah,logo_voucher,tanggal_kadaluarsa,owner_id{username}}}');
        $response = $request->getBody()->getContents();
        $data = json_decode($response, true);
        // dd($data);
        $datas = $data['data']['Voucher'][0];

        $clients = new Client;
        $requests = $clients->get(ENV('API_URL').'/graphql?query={users{id,username,nama}}');
        $responses = $requests->getBody()->getContents();
        $user = json_decode($responses, true);
        // dd($user);
        return view('admin.mutation.editOwnerVoucher')->withDatas($datas)->withUser($user);
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
        // dd($request);
        $clients = new Client;
        $gambar = $clients->post(ENV('API_URL').'/graphql?query={Voucher(id:'.$id.'){logo_voucher}}');
        $response = $gambar->getBody()->getContents();
        $data = json_decode($response, true);

        $kode = $request->kode;
        $jumlah = $request->jumlah;
        $tanggal_kadaluarsa = $request->tanggal_kadaluarsa;

        if($request->logo_voucher != null){
            // dd('notnull');
            $logo_voucher = $request->logo_voucher;
        }else{
            $logo_voucher = $data['data']['Voucher'][0]['logo_voucher'];
        }

        $client = new Client;
        $response = $client->post(ENV('API_URL').'/graphql?query=mutation{UpdateVoucher(id:'.$id.',kode:"'.$kode.'",jumlah:'.$jumlah.',tanggal_kadaluarsa:"'.$tanggal_kadaluarsa.'",logo_voucher:"'.$logo_voucher.'"){id,kode,jumlah,tanggal_kadaluarsa,logo_voucher}}');
        
        $test = $response->getBody()->getContents();
        // dd($test);
        return redirect()->route('voucher.index');
    }

    public function updateowner(Request $request, $id)
    {   
        $username = $request->username;

        $client = new Client;
        $response = $client->post(ENV('API_URL').'/graphql?query=mutation{UpdateOwner(id:'.$id.',username:"'.$username.'"){id,owner_id{id}}}');
        
        $test = $response->getBody()->getContents();
        // dd($test);
        return redirect()->route('voucher.index');
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
