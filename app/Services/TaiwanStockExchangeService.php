<?php

namespace App\Services;

use Carbon\Carbon;
use GuzzleHttp\Client;

class TaiwanStockExchangeService
{

    private $httpClient;

    /**
     * Instantiate a new TaiwanStockExchangeService instance.
     */
    public function __construct()
    {
        $this->httpClient = new Client();
    }

    /**
     * Get stock Information.
     *
     * @return void
     */
    public function getStockInfo($symbolIdAry)
    {
        $response = $this->httpClient->request('GET', 'http://mis.twse.com.tw/stock/api/getStockInfo.jsp', [
            'query' => [
                'ex_ch' => implode('|', $symbolIdAry),
                'json' => 1,
                'delay' => 0,
                '_' => Carbon::now()->toDateTimeString(),
            ],
        ]);
        return $response->getBody();		
    }
}
