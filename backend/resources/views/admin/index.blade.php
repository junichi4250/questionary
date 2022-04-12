@extends('app')

@section('title', '管理者画面')

@include('admin.nav')

@section('content')

<div class="w-2/3 mx-auto">
    <div>
        <div class="mx-auto mt-12 border-2 px-12 pt-12 rounded-2xl shadow-lg">
            <p class="mb-6 text-2xl text-center">レビュー検索</p>
            @include('admin.search')
        </div>
        <div class="mx-auto mt-12 mb-12 border-2 px-12 py-16 rounded-2xl shadow-lg">
            {{ $reviews->links('pagination::simple-tailwind') }}
            @if($reviews->isEmpty())
            <span class="mb-6 text-center">検索に合致するレビューがありませんでした</span>
            @else
            <table class="table-auto mx-auto text-left">
                <thead>
                    <tr class="border-b-2">
                        <th class="px-4 py-2">店名</th>
                        <th class="px-4 py-2">氏名</th>
                        <th class="px-4 py-2">性別</th>
                        <th class="px-4 py-2">年代</th>
                        <th class="px-4 py-2">評価</th>
                        <th class="px-4 py-2">内容</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reviews as $review)
                    <tr>
                        <td class="px-4 py-2">{{ $review->shop_name }}</td>
                        <td class="px-4 py-2">{{ $review->name }}</td>
                        <td class="px-4 py-2">{{ $review->gender }}</td>
                        <td class="px-4 py-2">{{ $review->age }}</td>
                        <td class="px-4 py-2">{{ $review->score }}点</td>
                        <td class="px-4 py-2">{{ $review->feedback }}</td>
                        <td class="py-2">
                            <button class="mt-5 py-1 px-4 bg-green-400 text-white font-bold rounded-full"
                                onclick="location.href='{{ route('admin.show', ['id' => $review->id]) }}'">詳細</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>
        {{ $reviews->links() }}
    </div>
</div>
@endsection
