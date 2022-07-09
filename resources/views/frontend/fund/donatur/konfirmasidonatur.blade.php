@extends('layouts.fund.master')
@section('title')
    Konfirmasi donasi
@endsection
@section('content')
    <form action="{{route('updateDonatur')}}" method="post">
        <input type="hidden" name="json" id="json">
        <input type="submit" style="display : none;" id="submit" value="inset">
    </form>
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-zKBn6ycyWj_IWPl8"></script>
    <script type="text/javascript">
      snap.pay('{{$snapToken}}', {
        // Optional
        onSuccess: function(result){
             insert(result)
        },
        // Optional
        onPending: function(result){
            insert(result)
        },
        // Optional
        onError: function(result){
            insert(result)
        }
    });
    function insert(data){
        document.getElementById("json").value = JSON.stringify(data, null, 2);
        document.getElementById("submit").click();
    }
    </script>
@endsection