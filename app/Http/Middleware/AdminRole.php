<?php

namespace App\Http\Middleware;

use Closure;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;

class AdminRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $client = new Client;
        $requests = $client->get(ENV('API_URL').'/graphql?query={users(username:"'.Auth::user()->username.'"){username,organizations{nama,scopes}}}');
        $response = $requests->getBody()->getContents();
        $data = json_decode($response, true);
        $role = $data['data']['users'][0]['organizations'][0]['scopes'];
        // dd($role);

        if($role === "[\"admin\"]" || $role ===  "[\"owner\"]"){
            return $next($request);
        }
        
        return redirect('/notallowed');
    }
}
