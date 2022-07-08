<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Fund;
use App\Donatur;
use Alert;

use function PHPUnit\Framework\fileExists;

class FundController extends Controller
{


    public function getFund()
    {
        $funds = Fund::orderBy('created_at','desc')->get();
        return view('dashboard.fund.getFund',compact(['funds']));
    }
    public function listDonatur($fund_id)
    {
        $donaturs = Donatur::where('fund_id',$fund_id)->orderBy('created_at','desc')->get();
        return view('dashboard.fund.getDonatur',compact(['donaturs','fund_id']));
    }

    public function createFund()
    {
        return view('dashboard.fund.createFund');
    }

    public function postFund(Request $request)
    {
        $request->validate([
            'tujuan' => 'required',
            'deskripsi' => 'required',
            'deadline' => 'required',
            'lokasi' => 'required',
            'target' => 'required',
        ]);

        if ($request->hasFile('gambar')) {
            $gambar_fund = $request->file('gambar');
            $nama_gambar_fund = time()."_".$gambar_fund->getClientOriginalName();
            $tujuan_upload = 'fund/img';
            Fund::create([
                'tujuan' => $request->tujuan,
                'deskripsi' => $request->deskripsi,
                'gambar' => $nama_gambar_fund,
                'deadline' => $request->deadline,
                'lokasi' => $request->lokasi,
                'dana_masuk' => 0,
                'target' => $request->target,
            ]);
            $gambar_fund->move($tujuan_upload,$nama_gambar_fund);
        }
        Alert::success('success','Berhasil Membuat fund');
        return redirect()->route('getFund');
    }

    public function editFund($id)
    {
        $fund = Fund::find($id);
        return view('dashboard.fund.editFund',compact(['fund']));
    }

    public function updateFund(Request $request)
    {
        $request->validate([
            'tujuan' => 'required',
            'deskripsi' => 'required',
            'deadline' => 'required',
            'lokasi' => 'required',
            'target' => 'required',
        ]);

        $fund = Fund::find($request->fund_id);

        if ($request->hasFile('gambar')) {
            if(File::exists("fund/img/".$fund->gambar)){
                File::delete("fund/img/".$fund->gambar);
            }
        $gambar_fund = $request->file('gambar');
        $nama_gambar_fund = time()."_".$gambar_fund->getClientOriginalName();
        $tujuan_upload = 'fund/img';
        $gambar_fund->move($tujuan_upload,$nama_gambar_fund);
        }else {
            $nama_gambar_fund = $fund->gambar;
        }

        $fund->update([
            'tujuan' => $request->tujuan,
            'deskripsi' => $request->deskripsi,
            'gambar' => $nama_gambar_fund,
            'deadline' => $request->deadline,
            'lokasi' => $request->lokasi,
            'target' => $request->target,
        ]);

        Alert::success('success','Berhasil mengedit berita');

        return back();
    }

    public function deleteFund($id)
    {
        $fund = Fund::find($id);
        if(File::exists("fund/img/".$fund->gambar)){
            File::delete("fund/img/".$fund->gambar);
        }
        $fund->delete();
        return back();
    }
}
