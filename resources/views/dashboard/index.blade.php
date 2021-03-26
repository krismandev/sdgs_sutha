@extends('layouts.dashboard.master')
@section('title')
    Dashboard
@endsection
@section('content')

@endsection
@section('js')
    <script>
        $(document).ready(function () {
            $(".btn").click(function (e) {
                for (let index = 0; index < 100; index++) {
                    $(".text").html("<h1>Hallo Dunia</h1>")

                }

            });
        });
    </script>
@endsection
