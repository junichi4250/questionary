@extends('app')

@section('title', 'アンケート確認')

@section('content')

<div class="w-2/3 mx-auto">
    <div class="mx-auto mt-12 mb-12 border-2 px-12 py-16 rounded-2xl shadow-lg">
        <p class="mb-10 text-2xl text-center">内容確認</p>
        <form method="POST" action="{{ route('review.send') }}" class="w-1/2 mx-auto">
            @include('review.confirm_form')
            <div class="text-center">
                <button name="back" class="py-3 px-8 font-bold">戻る</button>
                <button class="py-3 px-8 bg-blue-400 text-white font-bold rounded-full">送信</button>
            </div>
        </form>
    </div>
</div>
