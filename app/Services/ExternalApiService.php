<?php

namespace App\Services;

use GuzzleHttp\Client;

class ExternalApiService
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => config('services.external_api.base_uri'),
            'headers' => [
                'Authorization' => 'Bearer ' . config('services.external_api.token'),
                'Accept' => 'application/json',
            ],
        ]);
    }

    public function getData($endpoint)
    {
        $response = $this->client->get($endpoint);
        return json_decode($response->getBody()->getContents(), true);
    }

    public function postData($endpoint, $data)
    {
        $response = $this->client->post($endpoint, [
            'json' => $data
        ]);
        return json_decode($response->getBody()->getContents(), true);
    }

    public function putData($endpoint, $data)
    {
        $response = $this->client->put($endpoint, [
            'json' => $data
        ]);
        return json_decode($response->getBody()->getContents(), true);
    }

    public function deleteData($endpoint)
    {
        $response = $this->client->delete($endpoint);
        return json_decode($response->getBody()->getContents(), true);
    }
}
