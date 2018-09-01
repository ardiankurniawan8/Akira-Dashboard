<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ChangePasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $request = $client->get(ENV('API_URL').'/graphql?query={users(username:"'.$id.'"){nama,username}}');
        $response = $request->getBody()->getContents();
        $data = json_decode($response, true);

        return view('admin.changepassword')->withData($data);
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
        $client = new Client;
        $request = $client->get(ENV('API_URL').'/graphql?query=mutation{resetPassword(username:"'.$id.'",password:"'.$request->password.'",new_password:"'.$request->newpassword.'"){id}}');
        $response = $request->getBody()->getContents();
        $data = json_decode($response, true);
        // dd($data);

        if($data['data']['resetPassword']['id'] == null){
            // dd('tidak cocok');

            return redirect()->route('gantipassword.edit', $id)->with('status', 'Password lama Salah');
        
        }
        else{
            dd($data);

        return redirect()->route('dashboard.index');    
        }
        
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
