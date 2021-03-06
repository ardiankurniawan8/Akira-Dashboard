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
        $request = $client->get(ENV('API_URL').'/graphql?query={KaryawanQuery{id,uuid,nip,nama,jenis_kelamin,rating,penempatan{posisi,tanggal_mulai,tanggal_berakhir,workshift{hari,jam_mulai,jam_akhir}ketersediaan{hari,jam_mulai,jam_akhir}}}}');
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
        // dd($request);
        $nama = $request->nama;
        $jk = $request->gender;


        // $test1 = 'http://localhost:3000/graphql?query=mutation{createProduk(nama:"'.$nama.'",kode:"'.$kode.'",waktu:'.$waktu.',harga:'.$harga.',deskripsi:"'.$deskripsi.'"){nama,kode,waktu,harga,deskripsi}}';
        // dd($test1);

        $client = new Client;
        $response = $client->post(ENV('API_URL').'/graphql?query=mutation{CreateKaryawan(nama:"'.$nama.'",jenis_kelamin:"'.$jk.'"){nip,nama}}');
        
        $test = $response->getBody()->getContents();
        return redirect()->route('terapis.index')->with('status','Berhasil Menambah Terapis');
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
        $request = $client->get(ENV('API_URL').'/graphql?query={KaryawanQuery(id:'.$id.'){id,uuid,nip,nama,rating,penempatan{posisi,tanggal_mulai,tanggal_berakhir,workshift{id,hari,jam_mulai,jam_akhir,flag}ketersediaan{hari,jam_mulai,jam_akhir}}}}');
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
        $client = new Client;
        $request = $client->get(ENV('API_URL').'/graphql?query={KaryawanQuery(id:'.$id.'){id,uuid,nip,nama,jenis_kelamin,rating,penempatan{posisi,tanggal_mulai,tanggal_berakhir,workshift{id,hari,jam_mulai,jam_akhir}ketersediaan{hari,jam_mulai,jam_akhir}}}}');
        $response = $request->getBody()->getContents();
        $data = json_decode($response, true);
        // dd($data);
        return view('admin.mutation.editTerapis')->withData($data);
    }

    public function editworkshift($id)
    {
        // dd($id);
        $client = new Client;
        $request = $client->get(ENV('API_URL').'/graphql?query={WorkshiftQuery(id:'.$id.'){id,hari,jam_mulai,jam_akhir,flag}}');
        $response = $request->getBody()->getContents();
        $data = json_decode($response, true);
        // dd($data);
        return view('admin.mutation.editworkshift')->withData($data);
    }

    public function enableworkshift($id)
    {
        // dd('enable');
        $client = new Client;
        $request = $client->get(ENV('API_URL').'/graphql?query=mutation{EnableWorkshift(id:'.$id.'){id,hari,karyawan_id{id}}}');
        $response = $request->getBody()->getContents();
        $data = json_decode($response, true);
        // dd($data);
        return redirect()->route('terapis.show', $data['data']['EnableWorkshift']['karyawan_id']['id']);
    }

    public function disableworkshift($id)
    {
        // dd('disable');
        $client = new Client;
        $request = $client->get(ENV('API_URL').'/graphql?query=mutation{DisableWorkshift(id:'.$id.'){id,hari,karyawan_id{id}}}');
        $response = $request->getBody()->getContents();
        $data = json_decode($response, true);
        // dd($data['data']['DisableWorkshift']['karyawan_id']['id']);
        return redirect()->route('terapis.show', $data['data']['DisableWorkshift']['karyawan_id']['id']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function updateworkshift(Request $request, $id)
    {
        // dd($request);
        $hari = $request->hari;
        $jam_mulai = $request->jam_mulai;
        $jam_akhir = $request->jam_akhir;
        // dd($jk);

        $client = new Client;
        $response = $client->post(ENV('API_URL').'/graphql?query=mutation{UpdateWorkshift(id:'.$id.',hari:"'.$hari.'",jam_mulai:"'.$jam_mulai.'",jam_akhir:"'.$jam_akhir.'"){hari,jam_mulai,jam_akhir}}');
        
        $test = $response->getBody()->getContents();
        // dd($test);
        return redirect()->route('terapis.index');
    }

    public function update(Request $request, $id)
    {
        $nama = $request->nama;
        $jk = $request->gender;
        // dd($jk);

        $client = new Client;
        $response = $client->post(ENV('API_URL').'/graphql?query=mutation{UpdateKaryawan(nama:"'.$nama.'",jenis_kelamin:"'.$jk.'",id:'.$id.'){id,nama}}');
        
        $test = $response->getBody()->getContents();
        // dd($test);
        return redirect()->route('terapis.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = new Client;
        $response = $client->post(ENV('API_URL').'/graphql?query=mutation{DeleteKaryawan(id:'.$id.'){id}}');
        
        $test = $response->getBody()->getContents();
        // dd($test);
        return redirect()->route('terapis.index');
    }
}
