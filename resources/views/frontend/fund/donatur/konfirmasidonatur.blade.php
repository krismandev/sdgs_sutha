@extends('layouts.fund.master')
@section('title')
    Konfirmasi donasi
@endsection
@section('content')
    <form action="{{route('index')}}" method="get">
        <input type="submit" style="display : none;" id="submit" value="inset">
    </form>
    <script src="{{env('MIDTRANS_JS_URL')}}" data-client-key="{{env('MIDTRANS_CLIENT_KEY')}}"></script>
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
        document.getElementById("submit").click();
    }
    </script>
@endsection