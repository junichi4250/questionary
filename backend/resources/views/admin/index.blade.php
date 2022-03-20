@extends('app')

@section('title', '管理者画面')

@section('content')

<div class="bg-gray-100 py-32 px-10 min-h-screen">
    <div class="p-10">
        <p class="text-3xl text-center mb-8">レビュー管理システム</p>
        @include('admin.logout')
        @include('admin.search')
        {{ $reviews->links() }}
        <table class="table-auto text-left mx-auto">
            <thead>
                <tr class="border-b-2">
                    <th class="px-4 pr-32 py-2">店名</th>
                    <th class="px-4 pr-32 py-2">氏名</th>
                    <th class="px-4 pr-24 py-2">性別</th>
                    <th class="px-4 pr-32 py-2">年代</th>
                    <th class="px-4 pr-24 py-2">評価</th>
                    <th class="px-4 pr-64 py-2">内容</th>
                </tr>
            </thead>
            <tbody>
                @if (!isset($reviews))
                <tr>
                    <td>レビューがありませんでした</td>
                </tr>
                @else
                @foreach ($reviews as $review)
                <tr>
                    <td class="px-4 py-2">{{ $review->shop_name }}</td>
                    <td class="px-4 py-2">{{ $review->name }}</td>
                    <td class="px-4 py-2">{{ $review->gender }}</td>
                    <td class="px-4 py-2">{{ $review->age }}</td>
                    <td class="px-4 py-2">{{ $review->score }}点</td>
                    <td class="px-4 py-2">{{ $review->feedback }}</td>
                    <td class="py-2">
                        <button class="py-2 px-5 bg-red-100 border border-black"
                            onclick="location.href='{{ route('admin.show', ['id' => $review->id]) }}'">詳細</button>
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection
