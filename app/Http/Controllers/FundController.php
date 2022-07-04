<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fund;

class FundController extends Controller
{
    public function detailFund($id)
    {
        $fund = Fund::find($id);
        $dana_masuk = "Rp " . number_format($fund->dana_masuk,2,',','.');
        $target = "Rp " . number_format($fund->target,2,',','.');
        $deadline = date_diff(date_create(),date_create($fund->deadline." 23:59:59.000000"))->d;
        $persentasefund = explode('.',$fund->dana_masuk/$fund->target*100,2)[0]."%";
        return view('frontend.fund.detailfund',compact(['fund','persentasefund','dana_masuk','target','deadline','id']));
    }
    public function formFund($id)
    {
        return view('frontend.fund.formfund',compact(['id']));
    }
}
