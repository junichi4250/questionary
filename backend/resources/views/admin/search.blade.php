<form action="{{ route('admin.search')}}" method="post">
    @csrf
    <div class="flex justify-center items-center p-2">
        <div class="border p-6 grid grid-cols-1 gap-6">
            <div class="grid grid-cols-3 gap-4">
                <div>
                    <label class="mr-20">店名</label>
                    @if ($user->role == 1)
                    <input type="text" class="p-4 border border-gray-200" placeholder="入力してください" name="shop_name"
                        value="{{ $request->shop_name ?? '' }}">
                    @else
                    <input type="text" class="p-4 border border-gray-200 text-gray-400 pointer-events-none"
                        name="shop_name" value="{{ $user->shop_name }}">
                    @endif
                </div>
                <div>
                    <label class="mr-8">年代</label>
                    <select class="p-4 pr-28 border border-gray-200" value="{{ $request->age ?? ''}}" name="age">
                        <option value="99" @if(!isset($request->age)) selected
                            @elseif($request->age==99) selected
                            @endif>全て</option>
                        <option value="1" @if(!isset($request->age))
                            @elseif($request->age==1) selected
                            @endif>10代以下</option>
                        <option value="2" @if(!isset($request->age))
                            @elseif($request->age==2) selected
                            @endif>20代</option>
                        <option value="3" @if(!isset($request->age))
                            @elseif($request->age==3) selected
                            @endif>30代</option>
                        <option value="4" @if(!isset($request->age))
                            @elseif($request->age==4) selected
                            @endif>40代</option>
                        <option value="5" @if(!isset($request->age))
                            @elseif($request->age==5) selected
                            @endif>50代</option>
                        <option value="6" @if(!isset($request->age))
                            @elseif($request->gender==6) selected
                            @endif>60代以上</option>
                    </select>
                </div>
                <div class="p-4 pl-0">
                    <label class="mr-8">性別</label>
                    <input type="radio" class="mx-2" name="gender" value="99" @if(!isset($request->gender)) checked
                    @elseif($request->gender==99) checked @endif>全て
                    <input type="radio" class="mx-2" name="gender" value="0" @if(!isset($request->gender))
                    @elseif($request->gender==0) checked @endif>男性
                    <input type="radio" class="mx-2" name="gender" value="1" @if(!isset($request->gender))
                    @elseif($request->gender==1) checked @endif>女性
                </div>
            </div>

            <div class="grid grid-cols-3 gap-4">
                <div>
                    <label class="mr-16">登録日</label>
                    <input type="date" class="p-4 border border-gray-200"
                        value="{{ $request->created_start_date ?? ''}}" name="created_start_date">
                </div>
                <div>
                    <label class="mr-12">〜</label>
                    <input type="date" class="p-4 pr-5 border border-gray-200"
                        value="{{ $request->created_end_date ?? ''}}" name="created_end_date">
                </div>
                <div class="p-4 pl-0">
                    <label class="mr-8">メール送信許可(有りのみ)</label>
                    <input type="checkbox" class="mx-2" name="is_send_email" @if(!isset($request->is_send_email))
                    @elseif($request->is_send_email) checked
                    @endif>
                </div>
            </div>

            <div class="grid grid-cols-3 gap-4">
                <div>
                    <label class="mr-8">キーワード</label>
                    <input type="text" class="p-4 border border-gray-200" value="{{ $request->keyword ?? ''}}"
                        placeholder="キーワードを入力" name="keyword">
                </div>
            </div>

            <div class="flex justify-center">
                <button name="reset" class="mr-1 p-2 border border-black w-1/5 bg-orange-300">リセット</button>
                <button class="ml-1 p-2 border border-black w-1/5 bg-blue-300">検索</button>
            </div>
        </div>
    </div>
</form>
