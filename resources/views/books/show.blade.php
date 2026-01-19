<x-app-layout>
    <x-slot name="title">{{ $book->title }}</x-slot>

    <div class="bg-white rounded-lg shadow-md p-6">
        {{-- ヘッダー --}}
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">{{ $book->title }}</h1>
            <a href="{{ route('books.index') }}" class="text-blue-500 hover:text-blue-600">
                ← 一覧に戻る
            </a>
        </div>

        {{-- 書籍情報 --}}
        <div class="space-y-4">
            <div>
                <span class="text-gray-500 text-sm">著者</span>
                <p class="text-gray-800">{{ $book->author }}</p>
            </div>

            <div>
                <span class="text-gray-500 text-sm">評価</span>
                <div class="flex items-center">
                    <div class="text-yellow-400 text-xl">
                        @for ($i = 1; $i <= 5; $i++)
                            @if ($i <= $book->rating)
                                ★
                            @else
                                ☆
                            @endif
                        @endfor
                    </div>
                    <span class="text-gray-500 ml-2">({{ $book->rating }}/5)</span>
                </div>
            </div>

            <div>
                <span class="text-gray-500 text-sm">レビュー</span>
                <p class="text-gray-800 whitespace-pre-wrap">{{ $book->review ?? 'レビューはありません' }}</p>
            </div>

            <div>
                <span class="text-gray-500 text-sm">登録日</span>
                <p class="text-gray-800">{{ $book->created_at->format('Y年m月d日') }}</p>
            </div>
        </div>

        {{-- アクションボタン --}}
        <div class="flex space-x-4 mt-8 pt-6 border-t border-gray-200">
            <a href="{{ route('books.edit', $book) }}"
                class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                編集
            </a>
            <form action="{{ route('books.destroy', $book) }}" method="POST" onsubmit="return confirm('本当に削除しますか？');">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded">
                    削除
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
