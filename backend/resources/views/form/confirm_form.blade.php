@csrf
<div class="flex items-center mb-5">
    <label for="name" class="inline-block w-32 mr-8 text-left font-bold text-gray-600">氏名</label>
    <p class="flex-1 py-2 border-b-2 border-gray-400">{{ $input['fullname'] }}</p>
</div>
<div class="flex items-center mb-5">
    <label for="number" class="inline-block w-32 mr-8 text-left 
                                 font-bold text-gray-600">性別</label>
    <p class="flex-1 py-2 border-b-2 border-gray-400">
        @if($input['gender'] == '0')
        男性
        @elseif($input['gender'] == '1')
        女性
        @endif
    </p>
</div>

<div class="flex items-center mb-5">
    <label class="inline-block w-32 mr-8 text-left 
                              font-bold text-gray-600">年代</label>
    <p class="flex-1 py-2 border-b-2 border-gray-400">
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

<div class="flex items-center mb-5">
    <label class="inline-block w-32 mr-8 text-left 
                                 font-bold text-gray-600">メールアドレス</label>
    <p class="flex-1 py-2 border-b-2 border-gray-400">{{ $input['email'] }}</p>
</div>

<div class="flex items-center mb-5">
    <label class="inline-block w-32 mr-8 text-left 
                                 font-bold text-gray-600">メール送信可否</label>
    <p class="flex-1 py-2 border-b-2 border-gray-400">
        @if($input['is_send_email'] == '0')
        送信しない
        @else
        送信する
        @endif
    </p>
</div>

<div class="flex mb-5">
    <label class="inline-block w-32 mr-8 text-left font-bold text-gray-600">ご意見</label>
    <p class="flex-1 py-2 border-b-2 border-gray-400">{{ $input['feedback'] }}</p>
</div>
