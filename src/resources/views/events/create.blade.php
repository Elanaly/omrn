<x-app-layout>
    @vite(['resources/css/tagify.css', 'resources/js/tagify.js'])
    @vite(['resources/js/quill.js', 'resources/js/event.js', 'resources/css/quill.css'])
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            イベント作成
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <section class="text-gray-600 body-font relative">
                        <form method="post" action="{{ route('events.store') }}" id="form">
                                @csrf
                                <div class="container px-5 py-24 mx-auto">
                                    <div class="flex flex-col text-center w-full mb-12">
                                        <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">イベントを作成します</h1>
                                    </div>
                                <div class="lg:w-3/4 md:w-3/4 mx-auto">
                                    <div class="flex flex-wrap -m-2">
                                        <div class="p-2 w-full">
                                            <div class="relative">
                                                <label for="title" class="leading-7 text-sm text-gray-600">タイトル</label>
                                                <input type="text" id="title" name="title" value="{{ old('title') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                            </div>
                                        </div>
                                        <div class="p-2 w-full">
                                            <div class="relative">
                                                <label for="attendee_info" class="leading-7 text-sm text-gray-600" >参加者への情報</label>
                                                    <div id="attendee_info_editor" placeholder='キーワード(タグ)入力' class="h-24"></div>
                                                    <textarea name="attendee_info" style="display:none" id="attendee_info"></textarea>
                                            </div>
                                        </div>
                                        <div class="p-2 w-full">
                                            <div class="relative">
                                                <label for="date-time" class="leading-7 text-sm text-gray-600">日時</label>
                                                <input type="date" id="date" name="date" value="{{ old('date') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                                <input type="time" id="time" name="time" value="{{ old('time') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                            </div>
                                        </div>

                                        <div class="p-2 w-full">
                                            <div class="relative">
                                                <label for="place" class="leading-7 text-sm text-gray-600">場所</label><br>
                                                オンライン開催の場合チェック<input type="checkbox" name="" id="">
                                                <input type="place" id="place" name="place" value="{{ old('place') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                                <button type="button">この場所をGoogleMapで検索する</button>
                                                <div id="map_container" style="display: none;">
                                                    <div id="map"></div>
                                                    <div id="map_alert"></div>
                                                </div>  
                                            </div>
                                        </div>
                                        <div class="p-2 w-full">
                                            <div class="relative">
                                                <label for="details" class="leading-7 text-sm text-gray-600">詳細</label>
                                                <div id="details_editor"></div>
                                                <textarea name="details" style="display:none" id="details">{{ old('details') }}</textarea>
                                            </div>
                                        </div>
                                        <div class="p-2 w-full">
                                            <div class="relative">
                                                <label for="capacity" class="leading-7 text-sm text-gray-600">定員</label><br>
                                                <input type="number" name="capacity" id="capacity">
                                            </div>
                                        </div>
                                        <div class="p-2 w-full">
                                            <div class="relative">
                                                <label for="url" class="leading-7 text-sm text-gray-600">関連するサイトのURL</label><br>
                                                <input type="url" name="url" id="url">
                                            </div>
                                        </div>
                                        <div class="p-2 w-full">
                                            <div class="relative">
                                                <label for="tags" class="leading-7 text-sm text-gray-600">キーワード(タグ)</label><br>
                                                <input name='tags' class='w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out' placeholder='キーワード(タグ)入力' value='' autofocus>
                                            </div>
                                        </div>
                                        <div class="p-2 w-full">
                                            <div class="relative">
                                                <input type="checkbox" id="caution" name="caution">注意事項に同意する
                                            </div>
                                        </div>
                                        <x-input-error class="mb-4" :messages="$errors->all()"/>
                                        <div class="p-2 w-full">
                                            <button type="button" id="submit_btn" class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">投稿する</button>
                                        </div>
                                        {{-- <div class="p-2 w-full pt-8 mt-8 border-t border-gray-200 text-center">
                                            <a class="text-indigo-500">example@email.com</a>
                                            <p class="leading-normal my-5">49 Smith St.
                                                <br>Saint Cloud, MN 56301
                                        </p>
                                        <span class="inline-flex">
                                            <a class="text-gray-500">
                                            <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                                                <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
                                            </svg>
                                            </a>
                                            <a class="ml-4 text-gray-500">
                                            <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                                                <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"></path>
                                            </svg>
                                            </a>
                                            <a class="ml-4 text-gray-500">
                                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                                                <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
                                                <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"></path>
                                            </svg>
                                            </a>
                                            <a class="ml-4 text-gray-500">
                                            <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                                                <path d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z"></path>
                                            </svg>
                                            </a> --}}
                                        </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
    <script>
            function selectLocalImage(editor){
                const input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.click();

                input.onchange = () => {
                    const image = input.files[0];
                    if(/^image\//.test(image.type)){
                        imageHandler(image, editor);
                    }else{
                        alert("画像だけアップロードできます");
                    }
                };
            }

            function imageHandler(file, editor){
                const fd = new FormData();
                fd.append('image', file);
                const xhr = new XMLHttpRequest();
                xhr.open('POST', '{{route("image.upload")}}', true);
                xhr.setRequestHeader('X-CSRF-Token', '{{csrf_token()}}');
                xhr.onload = () => {
                    if(xhr.status === 200){
                        console.log("yes");
                        const url = JSON.parse(xhr.responseText).url;
                        insertToEditor(url, editor);
                    }else if(xhr.status === 413){
                        alert("画像のサイズが大きすぎます");
                    }else{
                        alert("エラーが起きました。");
                    }
                }
                xhr.send(fd);
            }

            function insertToEditor(url, editor) {
                const range = editor.getSelection();
                editor.insertEmbed(range.index, 'image', `${url}`);
            }
    </script>
</x-app-layout>
