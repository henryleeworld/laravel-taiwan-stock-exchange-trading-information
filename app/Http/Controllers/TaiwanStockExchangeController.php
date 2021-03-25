<?php

namespace App\Http\Controllers;

use App\Services\TaiwanStockExchangeService;

class TaiwanStockExchangeController extends Controller
{

    private $taiwanStockExchangeService;

	public function __construct(TaiwanStockExchangeService $taiwanStockExchangeService)
    {
        $this->taiwanStockExchangeService = $taiwanStockExchangeService;
    }

    public function show() 
    {
        $response = json_decode($this->taiwanStockExchangeService->getStockInfo(['tse_1101.tw', 'tse_1102.tw']))->msgArray;
        foreach ($response as $item) {
            echo '公司全名：' . $item->nf . PHP_EOL;
            echo '公司簡稱：' . $item->n . PHP_EOL;
            echo '股票代號：' . $item->c . PHP_EOL;
            echo '當盤成交價：' . $item->z . PHP_EOL;
            echo '當盤成交量：' . $item->tv . PHP_EOL;
            echo '累積成交量：' . $item->v . PHP_EOL;
            echo '開盤：' . $item->o . PHP_EOL;
            echo '最高：' . $item->h . PHP_EOL;
            echo '最低：' . $item->l . PHP_EOL;
            echo '昨收：' . $item->y . PHP_EOL;
            echo '漲停價：' . $item->u . PHP_EOL;
            echo '跌停價：' . $item->w . PHP_EOL;
            echo '最近交易日期：' . $item->d . PHP_EOL;
            echo '最近成交時刻：' . $item->t . PHP_EOL;
            echo '==============' . PHP_EOL;
        }
        // echo $response;
    }
}
