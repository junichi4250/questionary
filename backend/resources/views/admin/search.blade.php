<form action="{{ route('admin.search')}}" method="post">
    @csrf
    <div class="h-screen flex justify-center items-center p-2">
        <div class="border p-6 grid grid-cols-1 gap-6">
            <div class="grid grid-cols-3 gap-4">
                <div>
                    <label class="mr-20">氏名</label>
                    <input type="text" class="p-4 border border-gray-200" placeholder="入力してください" name="name">
                </div>
                <div>
                    <label class="mr-8">年代</label>
                    <select class="p-4 pr-28 border border-gray-200" name="age_condition">
                        <option selected value="0">全て</option>
                        <option value="1">10代以上</option>
                        <option value="2">以下</option>
                    </select>
                </div>
                <div class="p-4 pl-0">
                    <label class="mr-8">性別</label>
                    <input type="radio" class="mx-2" checked>全て
                    <input type="radio" class="mx-2">男性
                    <input type="radio" class="mx-2">女性
                </div>
            </div>

            <div class="grid grid-cols-3 gap-4">
                <div>
                    <label class="mr-16">登録日</label>
                    <input type="text" class="p-4 border border-gray-200" placeholder="日付を選択してください" name="name">
                </div>
                <div>
                    <label class="mr-12">〜</label>
                    <input type="text" class="p-4 pr-5 border border-gray-200" placeholder="日付を選択してください" name="name">
                </div>
                <div class="p-4 pl-0">
                    <label class="mr-8">メール送信許可</label>
                    <input type="checkbox" class="mx-2">
                </div>
            </div>

            <div class="grid grid-cols-3 gap-4">
                <div>
                    <label class="mr-8">キーワード</label>
                    <input type="text" class="p-4 border border-gray-200" placeholder="キーワードを入力" name="name">
                </div>
            </div>

            <div class="flex justify-center">
                <button class="mr-1 p-2 border border-black w-1/5 bg-orange-300">リセット</button>
                <button class="ml-1 p-2 border border-black w-1/5 bg-blue-300">検索</button>
            </div>
        </div>
    </div>
</form>