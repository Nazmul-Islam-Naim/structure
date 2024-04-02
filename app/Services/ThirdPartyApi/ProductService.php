<?php

namespace App\Services\ThirdPartyApi;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

class ProductService {
    protected $client;
    /**
     * initialize guzzle httm
     */
    public function __construct(){
        $this->client = new Client();
    }

    /**
     * fetch data from api
     * @return $response
     */
    public function index(){
        $response = Http::get('https://fakestoreapi.com/products?limit=5');
        $data['header'] = $response->headers();
        $data['content'] =$response->object();
        $data['status'] = $response->status();
        return $data;
    }

    /**
     * store data
     * @param   $data
     * @return object
     */

    public function store($data){
        $url = 'https://fakestoreapi.com/products';
        $response = $this->client->Request('POST', $url, $data);
        return $response;
    }

    /**
     * fetch record
     * @param  $id
     * @return object
     */
    public function show($id){
        $response = Http::get('https://fakestoreapi.com/products/'. $id);
        return $response->object();
    }

    /**
     * update a record
     * @param  $id
     * @param  $data
     */
    public function update($id, $data){
        $url = 'https://fakestoreapi.com/products/'. $id;
        $response = $this->client->put($url, $data);
        return $response;
    }

    /**
     * destroy a record
     * @param  $id
     */
    public function destory($id){
        $url = 'https://fakestoreapi.com/products/'. $id;
        $response = $this->client->delete($url);
        return $response;
    }
}




