<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            イベント一覧
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    index<br>
                    @if( Auth::check() )
                        <a href="{{ route('events.create') }}" class="text-blue-500">新規作成</a>
                    @else
                        <p>イベント作成には<a href="{{ route('login')}}" class="text-blue-500">ログイン</a>が必要です</p>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
