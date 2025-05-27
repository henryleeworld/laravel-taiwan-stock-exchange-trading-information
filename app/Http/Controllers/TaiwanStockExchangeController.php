<?php

namespace App\Http\Controllers;

use App\Http\Integrations\TaiwanStockExchange\TaiwanStockExchangeConnector;

class TaiwanStockExchangeController extends Controller
{

    private $taiwanStockExchangeConnector;

	public function __construct(TaiwanStockExchangeConnector $taiwanStockExchangeConnector)
    {
        $this->taiwanStockExchangeConnector = $taiwanStockExchangeConnector;
    }

    public function show() 
    {
        $response = json_decode($this->taiwanStockExchangeConnector->getStockInfo(['tse_1101.tw', 'tse_1102.tw']))->msgArray;
        foreach ($response as $item) {
            echo __('Company full name:') . $item->nf . PHP_EOL;
            echo __('Company abbreviation name:') . $item->n . PHP_EOL;
            echo __('Ticker symbol:') . $item->c . PHP_EOL;
            echo __('Current price:') . $item->z . PHP_EOL;
            echo __('Current trading volume:') . $item->tv . PHP_EOL;
            echo __('Cumulative trading volume:') . $item->v . PHP_EOL;
            echo __('Opening:') . $item->o . PHP_EOL;
            echo __('High:') . $item->h . PHP_EOL;
            echo __('Low:') . $item->l . PHP_EOL;
            echo __('Closing:') . $item->y . PHP_EOL;
            echo __('Limit up:') . $item->u . PHP_EOL;
            echo __('Limit down:') . $item->w . PHP_EOL;
            echo __('Last trading day:') . $item->d . PHP_EOL;
            echo __('Last trading time:') . $item->t . PHP_EOL;
            echo '==============' . PHP_EOL;
        }
        // echo $response;
    }
}
