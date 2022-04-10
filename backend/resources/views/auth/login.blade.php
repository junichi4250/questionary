@extends('app')

@section('title', 'ログイン')

@include('nav')

@section('content')

<div class="w-2/3 mx-auto">
    <div class="mx-auto mt-12 mb-12 border-2 px-12 py-16 rounded-2xl shadow-lg">
        <div class="mb-10 text-2xl text-center">{{ __('管理者ログイン') }}</div>
        <form method="POST" action="{{ route('login') }}" class="w-1/2 mx-auto">
            @include('auth.form')
            <div class="text-center">
                <button type="submit" class="mt-5 py-3 px-10 bg-blue-400 text-white font-bold rounded-full">
                    {{ __('ログイン') }}
                </button>
            </div>
        </form>
    </div>
</div>
