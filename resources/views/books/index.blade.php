<x-app-layout>
    <x-slot name="title">書籍一覧</x-slot>

    <div class="bg-white rounded-lg shadow-md p-6">
        {{-- ヘッダー --}}
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">書籍一覧</h1>
            <a href="{{ route('books.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                新規登録
            </a>
        </div>

        {{-- 書籍リスト --}}
        @forelse($books as $book)
            <div class="border-b border-gray-200 py-4 last:border-b-0">
                <div class="flex justify-between items-start">
                    <div>
                        <h2 class="text-lg font-semibold">
                            <a href="{{ route('books.show', $book) }}" class="text-gray-800 hover:text-blue-500">
                                {{ $book->title }}
                            </a>
                        </h2>
                        <p class="text-gray-600">
                            {{ $book->author }}
                            @if ($book->category)
                                <span
                                    class="ml-2 px-2 py-1 bg-gray-200 rounded text-sm">{{ $book->category->name }}</span>
                            @endif
                        </p>
                        <div class="flex items-center mt-2">
                            {{-- 評価（星表示） --}}
                            <div class="text-yellow-400">
                                @for ($i = 1; $i <= 5; $i++)
                                    @if ($i <= $book->rating)
                                        ★
                                    @else
                                        ☆
                                    @endif
                                @endfor
                            </div>
                            <span class="text-gray-500 text-sm ml-2">
                                ({{ $book->rating }}/5)
                            </span>
                        </div>
                    </div>
                    <a href="{{ route('books.edit', $book) }}"
                        class="bg-gray-500 hover:bg-gray-600 text-white px-3 py-1 rounded text-sm">
                        編集
                    </a>
                </div>
            </div>
        @empty
            <p class="text-center text-gray-500 py-8">
                書籍がありません。「新規登録」ボタンから書籍を追加してください。
            </p>
        @endforelse
    </div>
</x-app-layout>
