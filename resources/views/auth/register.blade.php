<x-app-layout>
    <x-slot name="title">新規登録</x-slot>

    <div class="max-w-md mx-auto bg-white rounded-lg shadow-md p-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-6 text-center">新規登録</h1>

        <form action="{{ route('register') }}" method="POST">
            @csrf

            {{-- 名前 --}}
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-medium mb-2">名前</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:border-blue-500">
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- メールアドレス --}}
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-medium mb-2">メールアドレス</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:border-blue-500">
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- パスワード --}}
            <div class="mb-4">
                <label for="password" class="block text-gray-700 font-medium mb-2">パスワード</label>
                <input type="password" name="password" id="password"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:border-blue-500">
                @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- パスワード確認 --}}
            <div class="mb-6">
                <label for="password_confirmation" class="block text-gray-700 font-medium mb-2">パスワード（確認）</label>
                <input type="password" name="password_confirmation" id="password_confirmation"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:border-blue-500">
            </div>

            {{-- ボタン --}}
            <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white py-2 rounded">
                登録
            </button>
        </form>

        <p class="text-center text-gray-600 mt-4">
            すでにアカウントをお持ちの方は
            <a href="{{ route('login') }}" class="text-blue-500 hover:underline">ログイン</a>
        </p>
    </div>
</x-app-layout>
