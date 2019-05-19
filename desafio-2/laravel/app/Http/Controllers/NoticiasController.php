<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;


class NoticiasController extends Controller{

    function getNoticias($page = 1, Request $request){

        $baseUrl = 'http://www.marcha.cnm.org.br/webservice/noticias?';
        $param = $request->parametro ? 'pesquisa=' . $request->parametro : 'page=' . $page;
        $client = new Client();
        $response = $client->request('GET', $baseUrl . $param);

        if ($response->getStatusCode() == 200) {
            $response = json_decode($response->getBody());

            if (isset($response->noticias) && $response->total_noticias > 0) {

                $total_pages = ceil($response->total_noticias / 15);

                return view('index', ['noticias' => $response->noticias, 'page' => $page, 'total_pages'=>$total_pages]);
            }
        }

        return view('index', ['parametro' => $request->parametro]);
    }

}
