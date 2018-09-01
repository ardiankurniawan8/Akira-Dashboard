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
        
        $clients = new Client;
        $requests = $clients->get(ENV('API_URL').'/graphql?query={headerReservasi(kode:"'.$request->kode.'"){status_reservasi{progress}}}');
        $responses = $requests->getBody()->getContents();
        $datas = json_decode($responses, true);
        // dd($datas);
        // dd($request);
        if($datas['data']['headerReservasi'][0]['status_reservasi'][0]['progress'] === "selesai"){
            return redirect()->route('pembayaran.index')->with('status', 'Pembayaran sudah dilakukan');
        }else
        {
        $diskon = $request->diskon;
        $kode = $request->kode;
        $client = new Client;
        $time = date('y-m-d h:i:s');
        $request = $client->get(ENV('API_URL').'/graphql?query=mutation{CreateHeader(ref_id:"'.$request->kode.'",tanggal:"'.$time.'", jenis: "Tunai", jumlah: "'.$request->jumlah.'", referensi: "'.$request->referensi.'",diskon:"'.$diskon.'"){id,nomor,id_detail{id,ref_id}}}');
        $response = $request->getBody()->getContents();
        $data = json_decode($response, true);   
        // dd($data);
        return redirect()->route('pembayaran.edit', $data['data']['CreateHeader']['nomor'])->with('status', 'Pembayaran Berhasil');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $voucher = session()->get( 'voucher' );
        // dd($voucher);
        $client = new Client;
        $request = $client->get(ENV('API_URL').'/graphql?query={headerReservasi(id:'.$id.'){id,kode,tanggal_reservasi,detail_reservasi{produk_id{nama,harga}karyawan_id{nama}}}}');
        $response = $request->getBody()->getContents();
        $data = json_decode($response, true);
        // dd($data);
        return view('admin.mutation.addPembayaran')->withData($data)->withVoucher($voucher);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //error
        $client = new Client;
        $request = $client->get(ENV('API_URL').'/graphql?query={HeaderTransaksi(nomor:"'.$id.'"){nomor,tanggal,id_pembayaran{jumlah,referensi}id_detail{ref_id,produk,harga,diskon}}}');
        $response = $request->getBody()->getContents();
        $data = json_decode($response, true);
        // dd($data);

        return view('admin.invoice')->withData($data)->with('status','Pembayaran Sukses');
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
