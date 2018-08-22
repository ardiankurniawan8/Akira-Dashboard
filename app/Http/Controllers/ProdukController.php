<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    public function index()
    {
        $client = new Client;
        $request = $client->get(ENV('API_URL').'/graphql?query={produk{id,nama,kode,deskripsi,harga,waktu}}');
        $response = $request->getBody()->getContents();
        $data = json_decode($response, true);
        // dd($data);
        return view('admin.dashboard')->withData($data);
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
     //   dd($request);
            // dd("its store");
        $nama = $request->nama;
        $kode = $request->kode;
        $waktu = $request->waktu;
        $harga = $request->harga;
        $deskripsi = $request->deskripsi;

        // $test1 = 'http://localhost:3000/graphql?query=mutation{createProduk(nama:"'.$nama.'",kode:"'.$kode.'",waktu:'.$waktu.',harga:'.$harga.',deskripsi:"'.$deskripsi.'"){nama,kode,waktu,harga,deskripsi}}';
        // dd($test1);

        $client = new Client;
        $response = $client->post(ENV('API_URL').'/graphql?query=mutation{createProduk(nama:"'.$nama.'",waktu:'.$waktu.',harga:'.$harga.',deskripsi:"'.$deskripsi.'"){nama,waktu,harga,deskripsi}}');
        
        $test = $response->getBody()->getContents();
        return redirect()->route('dashboard.index');
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
        $request = $client->get(ENV('API_URL').'/graphql?query={produk(id:'.$id.'){id,nama,kode,deskripsi,harga,waktu}}');
        $response = $request->getBody()->getContents();
        $data = json_decode($response, true);
        $datas = $data['data']['produk'][0];
        // dd($datas);
        return view('admin.mutation.editproduk')->withDatas($datas);
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
        // dd($id);
        $nama = $request->nama;
        $kode = $request->kode;
        $waktu = $request->waktu;
        $harga = $request->harga;
        $deskripsi = $request->deskripsi;
        // dd($nama);

        $client = new Client;
        $response = $client->post(ENV('API_URL').'/graphql?query=mutation{updateProduk(id:'.$id.',nama:"'.$nama.'",kode:"'.$kode.'",waktu:'.$waktu.',harga:'.$harga.',deskripsi:"'.$deskripsi.'"){id,nama,kode,waktu,harga,deskripsi}}');
        
        $test = $response->getBody()->getContents();
        // dd($test);
        return redirect()->route('dashboard.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        $client = new Client;
        $response = $client->post(ENV('API_URL').'/graphql?query=mutation{deleteProduk(id:'.$id.'){id}}');
        
        $test = $response->getBody()->getContents();
        // dd($test);
        return redirect()->route('dashboard.index');
    }
}
