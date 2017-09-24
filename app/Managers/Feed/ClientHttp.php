<?php

namespace App\Managers\Feed;

use GuzzleHttp\Client;
use Illuminate\Support\Manager;

class ClientHttp
{
    public function get($link)
    {
        $request = with(new Client)->get($link);

        if ($request->getStatusCode() != 200) {
            throw new \Exception;
        }
    
        $result = $request->getBody()->getContents();

        $result = new \SimpleXMLElement($result);

        $result = json_decode(json_encode($result), true);

        return $result;
    }
}
