@extends('app')

@section('title', 'アンケート詳細')

@section('content')

<div class="bg-gray-200 py-32 px-10 min-h-screen ">
    <div class="p-10 md:w-3/4 lg:w-1/2 mx-auto">
        <p class="text-3xl text-center mb-8">アンケート管理システム</p>

        <form method="POST" action="{{ route('admin.delete', ['id' => $answer->id]) }}">
            <div class="flex items-center mb-5">
                <label for="name" class="inline-block w-32 mr-8 text-left font-bold text-gray-600">ID</label>
                <p class="flex-1 py-2 border-b-2 border-gray-400">{{ $answer['fullname'] }}</p>
            </div>

            <div class="flex items-center mb-5">
                <label for="name" class="inline-block w-32 mr-8 text-left font-bold text-gray-600">氏名</label>
                <p class="flex-1 py-2 border-b-2 border-gray-400">{{ $answer['fullname'] }}</p>
            </div>
            <div class="flex items-center mb-5">
                <label for="number" class="inline-block w-32 mr-8 text-left 
                                     font-bold text-gray-600">性別</label>
                <p class="flex-1 py-2 border-b-2 border-gray-400">
                    @if($answer['gender'] == '0')
                    男性
                    @elseif($answer['gender'] == '1')
                    女性
                    @endif
                </p>
            </div>

            <div class="flex items-center mb-5">
                <label class="inline-block w-32 mr-8 text-left 
                                  font-bold text-gray-600">年代</label>
                <p class="flex-1 py-2 border-b-2 border-gray-400">
                    @if($answer['age_id'] == '0')
                    10代以下
                    @elseif($answer['age_id'] == '1')
                    20代
                    @elseif($answer['age_id'] == '2')
                    30代
                    @elseif($answer['age_id'] == '3')
                    40代
                    @elseif($answer['age_id'] == '4')
                    50代
                    @elseif($answer['age_id'] == '5')
                    60代以上
                    @endif
                </p>

            </div>

            <div class="flex items-center mb-5">
                <label class="inline-block w-32 mr-8 text-left 
                                     font-bold text-gray-600">メールアドレス</label>
                <p class="flex-1 py-2 border-b-2 border-gray-400">{{ $answer['email'] }}</p>
            </div>

            <div class="flex items-center mb-5">
                <label class="inline-block w-32 mr-8 text-left 
                                     font-bold text-gray-600">メールマガジン送信可否</label>
                <p class="flex-1 py-2 border-b-2 border-gray-400">
                    @if($answer['is_send_email'] == '0')
                    送信不可
                    @else
                    送信許可
                    @endif
                </p>
            </div>

            <div class="flex mb-5">
                <label class="inline-block w-32 mr-8 text-left font-bold text-gray-600">ご意見</label>
                <p class="flex-1 py-2 border-b-2 border-gray-400">{{ $answer['feedback'] }}</p>
            </div>

            <div class="flex mb-5">
                <label class="inline-block w-32 mr-8 text-left font-bold text-gray-600">登録日時</label>
                <p class="flex-1 py-2 border-b-2 border-gray-400">{{ $answer['created_at'] }}</p>
            </div>

            <div class="text-center">
                <a href="{{ route('admin.index') }}" class="py-3 px-4 bg-blue-400 text-white font-bold">一覧に戻る</button>
                <button class="py-3 px-8 bg-blue-400 text-white font-bold">削除</button>
            </div>
        </form>
    </div>
</div>
