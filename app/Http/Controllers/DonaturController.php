<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Donatur;
use App\Fund;

class DonaturController extends Controller
{
    public function listDonatur($id)
    {
        $donaturs = Donatur::where('fund_id',$id)->where('status','settlement')->orderBy('created_at','desc')->paginate(10);
        return view('frontend.fund.donatur.listdonatur',compact(['id','donaturs']));
    }
    public function createDonatur(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email'=> 'required',
            'no_hp' => 'required',
            'jumlah' => 'required',
            'fund_id' => 'required',
        ]);
        $order_id = $request->fund_id."-".date("dmy")."-".strval(rand());
        Donatur::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'jumlah' => $request->jumlah,
            'fund_id' => $request->fund_id,
            'order_id' => $order_id,
        ]);
        return redirect()->route('konfirmasiDonatur', ['order_id'=> $order_id,'data' => base64_encode($request->jumlah).'.'.base64_encode($request->nama).'.'.base64_encode($request->email).'.'.base64_encode($request->no_hp)]);
    }
    public function updateDonatur(Request $request)
    {
        $request->validate([
            'json' => 'required',
        ]);
        $json = json_decode($request->json);

        $donatur = Donatur::where('order_id',$json->order_id);

        $donatur->update([
            'payment_type' => $json->payment_type,
            'status' => $json->transaction_status,
            'transaction_id' => $json->transaction_id,
        ]);
        return redirect()->route('index');
    }
    public function konfirmasiDonatur($order_id,$data)
    {
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = 'SB-Mid-server-VvZd2mMFrXgGQUULjnRQFr7k';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $data = explode('.',$data);
        $jumlah = base64_decode($data[0]);
        $nama = base64_decode($data[1]);
        $email = base64_decode($data[2]);
        $no_hp = base64_decode($data[3]);
        $fund_id = explode('-',$order_id)[0];

        $params = array(
            'transaction_details' => array(
                'order_id' => $order_id,
                'gross_amount' => $jumlah,
            ),
            'customer_details' => array(
                'first_name' => $nama,
                'last_name' => " ",
                'email' => $email,
                'phone' => $no_hp,
            ),
        );
            
        $snapToken = \Midtrans\Snap::getSnapToken($params);
        return view('frontend.fund.donatur.konfirmasidonatur',compact(['snapToken','nama','email','fund_id']));
    }
    public function notifHandler()
    {
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$serverKey = 'SB-Mid-server-VvZd2mMFrXgGQUULjnRQFr7k';
        $notif = new \Midtrans\Notification();

        $transaction = $notif->transaction_status;
        $gross_amount = $notif->gross_amount;
        $type = $notif->payment_type;
        $order_id = $notif->order_id;
        $fraud = $notif->fraud_status;
        $fund_id = explode('-',$order_id)[0];

        $donatur = Donatur::where('order_id',$order_id);
        $fund = Fund::where('id',$fund_id)->first();
        
        
        if ($transaction == 'capture') {
            // For credit card transaction, we need to check whether transaction is challenge by FDS or not
            if ($type == 'credit_card') {
                if ($fraud == 'challenge') {
                    // TODO set payment status in merchant's database to 'Challenge by FDS'
                    $donatur->update([
                        'payment_type' => $type,
                        'status' => 'Challenge by FDS',
                    ]);
                    // TODO merchant should decide whether this transaction is authorized or not in MAP
                    echo "Transaction order_id: " . $order_id ." is challenged by FDS";
                } else {
                    // TODO set payment status in merchant's database to 'Success'
                    $donatur->update([
                        'payment_type' => $type,
                        'status' => 'Success',
                    ]);
                    $fund->update([
                        'dana_masuk' => $fund->dana_masuk + $gross_amount,
                    ]);
                    echo "Transaction order_id: " . $order_id ." successfully captured using " . $type;
                }
            }
        } else if ($transaction == 'settlement') {
            // TODO set payment status in merchant's database to 'Settlement'
            $donatur->update([
                'payment_type' => $type,
                'status' => $transaction,
            ]);
            $fund->update([
                'dana_masuk' => $fund->dana_masuk + $gross_amount,
            ]);
            

            echo "Transaction order_id: " . $order_id ." successfully transfered using " . $type;
        } else if ($transaction == 'pending') {
            // TODO set payment status in merchant's database to 'Pending'
            $donatur->update([
                'payment_type' => $type,
                'status' => $transaction,
            ]);
            echo "Waiting customer to finish transaction order_id: " . $order_id . " using " . $type;
        } else if ($transaction == 'deny') {
            // TODO set payment status in merchant's database to 'Denied'
            $donatur->update([
                'payment_type' => $type,
                'status' => $transaction,
            ]);
            echo "Payment using " . $type . " for transaction order_id: " . $order_id . " is denied.";
        } else if ($transaction == 'expire') {
            // TODO set payment status in merchant's database to 'expire'
            $donatur->update([
                'payment_type' => $type,
                'status' => $transaction,
            ]);
            echo "Payment using " . $type . " for transaction order_id: " . $order_id . " is expired.";
        } else if ($transaction == 'cancel') {
            // TODO set payment status in merchant's database to 'Denied'
            $donatur->update([
                'payment_type' => $type,
                'status' => $transaction,
            ]);
            echo "Payment using " . $type . " for transaction order_id: " . $order_id . " is canceled.";
        }
    }
}
