@csrf
<div class="mb-8">
    <label for="name" class="flex justify-start my-2">氏名</label>
    <p class="flex-1 py-2">{{ $input['name'] }}</p>
</div>
<div class="mb-8">
    <label for="number" class="flex justify-start my-2">性別</label>
    <p class="flex-1 py-2">
        @if($input['gender'] == '0')
        男性
        @elseif($input['gender'] == '1')
        女性
        @endif
    </p>
</div>

<div class="mb-8">
    <label class="flex justify-start my-2">年代</label>
    <p class="flex-1 py-2">
        @if($input['age_id'] == '0')
        10代以下
        @elseif($input['age_id'] == '1')
        20代
        @elseif($input['age_id'] == '2')
        30代
        @elseif($input['age_id'] == '3')
        40代
        @elseif($input['age_id'] == '4')
        50代
        @elseif($input['age_id'] == '5')
        60代以上
        @endif
    </p>
</div>

<div class="mb-8">
    <label class="flex justify-start my-2">メールアドレス</label>
    <p class="flex-1 py-2">{{ $input['email'] }}</p>
</div>

<div class="mb-8">
    <label class="flex justify-start my-2">メール送信可否</label>
    <p class="flex-1 py-2">
        @if($input['is_send_email'] == '0')
        送信しない
        @else
        送信する
        @endif
    </p>
</div>

<div class="mb-8">
    <label class="flex justify-start my-2">評価</label>
    <p class="flex-1 py-2">
        @if($input['score'] == '1')
        1点
        @elseif($input['score'] == '2')
        2点
        @elseif($input['score'] == '3')
        3点
        @elseif($input['score'] == '4')
        4点
        @elseif($input['score'] == '5')
        5点
        @endif
    </p>
</div>

<div class="mb-8">
    <label class="flex justify-start my-2">ご意見</label>
    <p class="flex-1 py-2">{{ $input['feedback'] }}</p>
</div>

@if(isset($input["photo_url"]))
<div class="mb-8">
    <img src="{{ Storage::disk('s3')->url('tmp/'.$input["photo_url"]) }}">
</div>
@endif
