@extends('app')

@section('title', 'アンケート詳細')

@section('content')

<div class="w-2/3 mx-auto">
    <div class="mx-auto mt-12 mb-12 border-2 px-12 py-16 rounded-2xl shadow-lg">
        {{-- <p class="mb-10 text-2xl text-center">アンケート管理システム</p> --}}
        <form method="POST" action="{{ route('admin.delete', ['id' => $review->id]) }}" class="w-1/2 mx-auto">
            @csrf
            @method('delete')
            <div class="mb-8">
                <label for="name" class="flex justify-start my-2">店名</label>
                <p class="flex-1 py-2">{{ $review['shop_name'] }}</p>
            </div>

            <div class="mb-8">
                <label for="name" class="flex justify-start my-2">氏名</label>
                <p class="flex-1 py-2">{{ $review['name'] }}</p>
            </div>
            <div class="mb-8">
                <label for="number" class="flex justify-start my-2">性別</label>
                <p class="flex-1 py-2">
                    @if($review['gender'] == '0')
                    男性
                    @elseif($review['gender'] == '1')
                    女性
                    @endif
                </p>
            </div>

            <div class="mb-8">
                <label class="flex justify-start my-2">年代</label>
                <p class="flex-1 py-2">
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

            <div class="mb-8">
                <label class="flex justify-start my-2">メールアドレス</label>
                <p class="flex-1 py-2">{{ $review['email'] }}</p>
            </div>

            <div class="mb-8">
                <label class="flex justify-start my-2">メールマガジン送信可否</label>
                <p class="flex-1 py-2">
                    @if($review['is_send_email'] == '1')
                    送信不可
                    @else
                    送信許可
                    @endif
                </p>
            </div>

            <div class="mb-8">
                <label class="flex justify-start my-2">評価</label>
                <p class="flex-1 py-2">{{ $review['score'] }}点</p>
            </div>

            <div class="mb-8">
                <label class="flex justify-start my-2">ご意見</label>
                <p class="flex-1 py-2">{{ $review['feedback'] }}</p>
            </div>

            @if(isset($review['photo_url']))
            <div class="mb-8">
                <label class="inline-block w-32 mr-8"></label>
                <img src="{{ Storage::disk('s3')->url('uploads/'.$review["photo_url"]) }}">
            </div>
            @endif

            <div class="mb-8">
                <label class="flex justify-start my-2">登録日時</label>
                <p class="flex-1 py-2">{{ $review['created_at'] }}</p>
            </div>

            <div class="text-center mt-16">
                <button name="back" class="py-3 px-4 mr-8 font-bold">一覧に戻る</button>
                <button onclick='return confirm("削除しますか？");'
                    class="py-3 px-10 bg-red-400 text-white font-bold rounded-full">削除</button>
            </div>
        </form>
    </div>
</div>
