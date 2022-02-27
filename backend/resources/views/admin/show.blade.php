@extends('app')

@section('title', 'アンケート詳細')

@section('content')

<div class="bg-gray-200 py-32 px-10 min-h-screen ">
    <div class="p-10 md:w-3/4 lg:w-1/2 mx-auto">
        <p class="text-3xl text-center mb-8">アンケート管理システム</p>

        <form method="POST" action="{{ route('admin.delete', ['id' => $review->id]) }}">
            @csrf
            @method('delete')
            <div class="flex items-center mb-5">
                <label for="name" class="inline-block w-32 mr-8 text-left font-bold text-gray-600">店名</label>
                <p class="flex-1 py-2 border-b-2 border-gray-400">{{ $review['shop_name'] }}</p>
            </div>

            <div class="flex items-center mb-5">
                <label for="name" class="inline-block w-32 mr-8 text-left font-bold text-gray-600">氏名</label>
                <p class="flex-1 py-2 border-b-2 border-gray-400">{{ $review['name'] }}</p>
            </div>
            <div class="flex items-center mb-5">
                <label for="number" class="inline-block w-32 mr-8 text-left 
                                     font-bold text-gray-600">性別</label>
                <p class="flex-1 py-2 border-b-2 border-gray-400">
                    @if($review['gender'] == '0')
                    男性
                    @elseif($review['gender'] == '1')
                    女性
                    @endif
                </p>
            </div>

            <div class="flex items-center mb-5">
                <label class="inline-block w-32 mr-8 text-left 
                                  font-bold text-gray-600">年代</label>
                <p class="flex-1 py-2 border-b-2 border-gray-400">
                    @if($review['age_id'] == '0')
                    10代以下
                    @elseif($review['age_id'] == '1')
                    20代
                    @elseif($review['age_id'] == '2')
                    30代
                    @elseif($review['age_id'] == '3')
                    40代
                    @elseif($review['age_id'] == '4')
                    50代
                    @elseif($review['age_id'] == '5')
                    60代以上
                    @endif
                </p>

            </div>

            <div class="flex items-center mb-5">
                <label class="inline-block w-32 mr-8 text-left 
                                     font-bold text-gray-600">メールアドレス</label>
                <p class="flex-1 py-2 border-b-2 border-gray-400">{{ $review['email'] }}</p>
            </div>

            <div class="flex items-center mb-5">
                <label class="inline-block w-32 mr-8 text-left 
                                     font-bold text-gray-600">メールマガジン送信可否</label>
                <p class="flex-1 py-2 border-b-2 border-gray-400">
                    @if($review['is_send_email'] == '0')
                    送信不可
                    @else
                    送信許可
                    @endif
                </p>
            </div>

            <div class="flex mb-5">
                <label class="inline-block w-32 mr-8 text-left font-bold text-gray-600">評価</label>
                <p class="flex-1 py-2 border-b-2 border-gray-400">{{ $review['score'] }}点</p>
            </div>

            <div class="flex mb-5">
                <label class="inline-block w-32 mr-8 text-left font-bold text-gray-600">ご意見</label>
                <p class="flex-1 py-2 border-b-2 border-gray-400">{{ $review['feedback'] }}</p>
            </div>

            <div class="flex mb-5">
                <label class="inline-block w-32 mr-8 text-left font-bold text-gray-600">登録日時</label>
                <p class="flex-1 py-2 border-b-2 border-gray-400">{{ $review['created_at'] }}</p>
            </div>

            <div class="text-center mt-16">
                <button name="back" class="py-3 px-4 mr-8 bg-blue-400 text-white font-bold">一覧に戻る</button>
                <button onclick='return confirm("削除しますか？");'
                    class="py-3 px-8 bg-blue-400 text-white font-bold">削除</button>
            </div>
        </form>
    </div>
</div>
