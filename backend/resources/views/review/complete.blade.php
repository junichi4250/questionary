@extends('app')

@section('title', 'アンケート送信')

@include('nav')

@section('content')

<div class="w-2/3 mx-auto">
    <div class="mx-auto mt-12 border-2 px-12 py-16 rounded-2xl shadow-lg">
        <p class="mb-10 text-2xl text-center">ご意見をお送りいただきありがとうございました</p>
        <div class="text-center">
            <button onclick="location.href='{{ route('shop.index') }}'"
                class="py-3 px-8 bg-blue-400 text-white font-bold rounded-full">お店一覧へ戻る</button>
        </div>
    </div>
</div>
