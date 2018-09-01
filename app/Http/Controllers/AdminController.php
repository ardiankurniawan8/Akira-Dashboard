<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client = new Client;
        $request = $client->get(ENV('API_URL').'/graphql?query={users{nama,username,jenis_kelamin}}');
        $response = $request->getBody()->getContents();
        $data = json_decode($response, true);
        // dd($data);
        return view('admin.management.admin')->withData($data);

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
        // dd($request);
        $nama = $request->nama;
        $username = $request->username;
        $password = str_random(10);
        // dd($password);
        // dd($logo_voucher);

        // $test1 = 'http://localhost:3000/graphql?query=mutation{createProduk(nama:"'.$nama.'",kode:"'.$kode.'",waktu:'.$waktu.',harga:'.$harga.',deskripsi:"'.$deskripsi.'"){nama,kode,waktu,harga,deskripsi}}';
        // dd($test1);

        $client = new Client;
        $response = $client->post(ENV('API_URL').'/graphql?query=mutation{AddUser(nama:"'.$nama.'",username:"'.$username.'",password:"'.$password.'",jk:""){nama,username}}');
        
        $test = $response->getBody()->getContents();
        return redirect()->route('admin.index')->with('status', 'Password anda : '.$password);
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
        $response = $client->post(ENV('API_URL').'/graphql?query=mutation{Deactivate(username:"'.$id.'"){nama,username}}');
        
        $test = $response->getBody()->getContents();
        // dd($test);
        return redirect()->route('admin.index')->with('status', 'Berhasil di Deactivate');
        
    }
}
