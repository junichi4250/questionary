@csrf
<div class="flex items-center mb-5">
    <label for="name" class="inline-block w-20 mr-6 text-right font-bold text-gray-600">氏名</label>
    {{ $input['fullname'] }}

</div>
<div class="flex items-center mb-5">
    <label for="number" class="inline-block w-20 mr-6 text-right 
                                 font-bold text-gray-600">性別</label>
    {{ $input['gender'] }}
</div>

<div class="flex items-center mb-5">
    <label class="inline-block w-20 mr-6 text-right 
                              font-bold text-gray-600">年代</label>
    {{ $input['age_id'] }}

</div>

<div class="flex items-center mb-5">
    <label class="inline-block w-20 mr-6 text-right 
                                 font-bold text-gray-600">メールアドレス</label>
    {{ $input['email'] }}
</div>

<div class="flex items-center mb-5">
    <label class="inline-block w-20 mr-6 text-right 
                                 font-bold text-gray-600">メール送信可否</label>
    {{ $input['is_send_email'] }}
</div>

<div class="flex mb-5">
    <label class="inline-block w-20 mr-6 text-right font-bold text-gray-600">ご意見</label>
    {{ $input['feedback'] }}

</div>
