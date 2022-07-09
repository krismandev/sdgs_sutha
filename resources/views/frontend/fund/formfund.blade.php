@extends('layouts.fund.master')
@section('title')
    Form Donasi
@endsection
@section('content')
<div class="card">
        <button onclick="history.back()" class="close-button close"><i class="fa-solid fa-arrow-left"></i></button>
        <h2>Nominal donasi</h2>
        <div class="nominal-donasi">
            <input class="mt-2 input" id="layar" name="layar" type='currency' value="10000" placeholder='' onchange="blur()"/><br>
            <div class="grid gap-2 grid-rows-2 md:grid-rows-1 justify-evenly grid-flow-col">
                <button onclick="masukanNilai(25000)" class="tombol w-24">rp 25.000</button>
                <button onclick="masukanNilai(50000)" class="tombol w-24">rp 50.000</button>
                <button onclick="masukanNilai(75000)" class="tombol w-24">rp 75.000</button>
                <button onclick="masukanNilai(100000)" class="tombol w-24">rp 100.000</button>
            </div>
        </div>
    </div>
    <div class="card">
        <h2>data donatur</h2>
        <form action="{{route('createDonatur')}}" method="POST">
            <input type="hidden" name="jumlah" id="jumlah">
            <input type="hidden" name="fund_id" id="fund_id" value="{{ $id}}">
            <label class="font-medium mt-4 block" for="nama">Nama Lengkap</label>
            <input class="input" id="nama" name="nama" type='text' placeholder='Nama' required/><br>
            <label class="font-medium mt-2 block" for="email">Email</label>
            <input class="input" id="email" name="email" type='email' placeholder='Email' required/><br>
            <label class="font-medium mt-2 block" for="no_hp">Nomor HP</label>
            <input class="input" id="no_hp" name="no_hp" type='number' placeholder='Nomor HP' required/><br>
            <input class="tombol cursor-pointer mx-auto block" type="submit" value="donasi">
        </form>
    </div>
@endsection
