<?php

namespace App\Data;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class Website
{
    public function getWebsiteByCode(String $code) {
        $apiServerPath = env("API_SERVER");
        $client = new Client();
        try {
            $result = $client->get($apiServerPath.'/api/website-content-test/'.$code, [
                'headers' => [
                    'Content-Type' => 'application/x-www-form-urlencoded',
                ],
                'form_params' => [
                    'code' => $code
                ]
            ]);
            $serverResponse = json_decode($result->getBody()->getContents());
            if($serverResponse->content) {
                $response = array(
                    'status' => true, 
                    'message' => $serverResponse
                );
                return json_encode($response);
            } else {
                $response = array(
                    'status' => false, 
                    'message' => $serverResponse->content
                );
                return json_encode($response);
            }
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            $et = $guzzleResult = $e->getResponse();
            $response = array(
                'status' => false, 
                'message' => $et
            );
            return json_encode($response);
        }
        $response = array(
            'status' => false, 
            'message' => "Unexpected"
        );
        return json_encode($response);
        // $path = "/website-content-test/".$code;
        // $apiServerPath = env("API_SERVER");
        // $client = new Client();
        // $result = $client->request('GET', $apiServerPath.$path);
        // $realResult = json_decode($result->getBody()->getContents());
        // $content = json_decode($realResult->content);
        // $content = str_replace('<\/', '</', $content);
        // $content = str_replace('" ', '', $content);
        // $content = str_replace(' "', '', $content);
        // $content = str_replace('\"', '', $content);
        // return $content;
    }
}
