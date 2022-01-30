@extends('app')

@section('title', 'アンケート')

@section('content')

<div class="bg-gray-200 py-32 px-10 min-h-screen ">
    <div class="bg-white p-10 md:w-3/4 lg:w-1/2 mx-auto">
        <form method="POST" action="{{ route('form.post') }}">
            @include('form.form')
            <div class="text-center">
                <button class="py-3 px-8 bg-green-400 text-white font-bold">確認</button>
            </div>
        </form>
    </div>
</div>
