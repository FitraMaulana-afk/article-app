<div>
    <div class="w-full flex justify-between gap-8">
        <div class="w-3/4 bg-gray-300/25 flex flex-col p-4 rounded-lg mt-10 gap-3">
            <h2 class="font-bold text-xl">Komentar {{ $total_comments }}</h2>
            @auth
                <form class="w-full" wire:submit.prevent="store">
                    <x-form.textarea-input class="w-full border-none shadow-md" wire:model.defer="body"
                        placeholder="Tulis Komentar..." />
                    @error('body')
                        <div class="mb-4 rounded-lg bg-danger-100 px-6 py-5 text-base text-danger-800 border border-danger-300"
                            role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                    <x-button variant="orange" size="sm" class="float-right mt-3">
                        <span>Kirim</span>
                    </x-button>
                </form>
            @endauth
            @guest
                <div class="mb-4 rounded-lg bg-info-100 px-6 py-5 text-base text-info-800 border border-info-300"
                    role="alert">
                    Login terlebih dahulu untuk Berkomentar <a href="{{ route('landing.login') }}" class="underline">Klik
                        Disini</a>
                </div>
            @endguest
        </div>
        <div class="w-1/4">
            <h2 class="text-xl font-bold"></h2>
        </div>
    </div>

    <div class="w-full flex justify-between gap-8">
        <div class="w-3/4 bg-gray-200/25 flex items-center  flex-col py-10 rounded-lg mt-10 gap-3">
            @forelse ($comments as $comment)
                <div class="flex flex-col justify-center gap-4 mx-4 w-full my-2" id="comment-{{ $comment->id }}">
                    <div class="w-full flex flex-col justify-center items-center  mx-4">
                        <div class="w-full flex  justify-center gap-8 mx-4">
                            <div class="rounded-full w-1/12">
                                <img src="{{ asset('assets/content/user_default_img.png') }}" class="rounded-full "
                                    alt="">
                            </div>
                            <div class="w-5/6">
                                <h2 class="text-md font-bold">{{ $comment->user->name }}</h2>
                                <p class="text-sm text-gray-600/75">{{ $comment->updated_at->diffForHumans() }}</p>
                                <p class="text-gray-800">{{ $comment->body }}
                                </p>
                                @auth
                                    <div class="flex justify-normal gap-8 mt-2 mb-4">
                                        @if ($comment->user_id == Auth::user()->id)
                                            <button
                                                class="bg-transparant text-base text-gray-500  hover:text-gray-800 font-medium"
                                                wire:click="selectEdit({{ $comment->id }})">
                                                Edit
                                            </button>
                                            <button
                                                class="bg-transparant text-base text-gray-500  hover:text-gray-800 font-medium"
                                                wire:click="delete({{ $comment->id }})">
                                                Hapus
                                            </button>
                                        @endif
                                        <button
                                            class="bg-transparant text-base text-gray-500  hover:text-gray-800 font-medium"
                                            wire:click="selectReply({{ $comment->id }})">
                                            Balas
                                        </button>
                                    </div>
                                @endauth
                            </div>
                        </div>
                        {{-- Replay Comment --}}
                        @if (isset($comment_id) && $comment_id == $comment->id && $showFormReply == true)
                            <form class="w-3/4 ml-8 " wire:submit.prevent="reply">
                                <x-form.textarea-input class="w-full " wire:model.defer="body2"
                                    placeholder="Tulis Komentar..." />
                                @error('body2')
                                    <div class="mb-4 rounded-lg bg-danger-100 px-6 py-5 text-base text-danger-800 border border-danger-300"
                                        role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <button
                                    class=" mt-1 bg-gray-100 text-base text-gray-400 p-2 float-right rounded-full  hover:text-gray-800 hover:bg-gray-400 font-medium">
                                    <span>Simpan</span>
                                </button>
                            </form>
                        @endif

                        {{-- Edit Comment --}}
                        @if (isset($edit_comment_id) && $edit_comment_id == $comment->id && $showFormEdit == true)
                            <form class="w-3/4 ml-8 " wire:submit.prevent="change">
                                <x-form.textarea-input class="w-full " wire:model.defer="body2"
                                    placeholder="Tulis Komentar..." />
                                @error('body2')
                                    <div class="mb-4 rounded-lg bg-danger-100 px-6 py-5 text-base text-danger-800 border border-danger-300"
                                        role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <button
                                    class=" mt-1 bg-gray-100 text-base text-gray-400 p-2 float-right rounded-full  hover:text-gray-800 hover:bg-gray-400 font-medium">
                                    <span>Simpan</span>
                                </button>
                            </form>
                        @endif
                    </div>
                </div>

                @if ($comment->childrens)
                    @foreach ($comment->childrens as $reply)
                        <div class="flex justify-center gap-4 ml-20">
                            <div class="rounded-full w-1/12">
                                <img src="{{ asset('assets/content/content1.jpeg') }}" class="rounded-full "
                                    alt="">
                            </div>
                            <div class="w-4/5">
                                <h2 class="text-md font-bold">{{ $reply->user->name }}</h2>
                                <p class="text-sm text-gray-600/75">{{ $reply->updated_at->diffForHumans() }}</p>
                                <p class="text-gray-800">{{ $reply->body }}
                                </p>
                                @auth
                                    <div class="flex justify-normal gap-8 mt-2 mb-4">
                                        @if ($reply->user_id == Auth::user()->id)
                                            <button
                                                class="bg-transparant text-base text-gray-500  hover:text-gray-800 font-medium"
                                                wire:click="selectEdit({{ $reply->id }})">
                                                Edit
                                            </button>
                                            <button
                                                class="bg-transparant text-base text-gray-500  hover:text-gray-800 font-medium"
                                                wire:click="delete({{ $reply->id }})">
                                                Hapus
                                            </button>
                                        @endif
                                        <button
                                            class="bg-transparant text-base text-gray-500  hover:text-gray-800 font-medium"
                                            wire:click="selectReply({{ $reply->id }})">
                                            Balas
                                        </button>
                                    </div>
                                @endauth
                            </div>
                        </div>
                        {{-- Replay Comment --}}
                        @if (isset($comment_id) && $comment_id == $comment->id && $showFormReply == true)
                            <form class="w-3/4 ml-8 " wire:submit.prevent="reply">
                                <x-form.textarea-input class="w-full " wire:model.defer="body2"
                                    placeholder="Tulis Komentar..." />
                                @error('body2')
                                    <div class="mb-4 rounded-lg bg-danger-100 px-6 py-5 text-base text-danger-800 border border-danger-300"
                                        role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <button
                                    class=" mt-1 bg-gray-100 text-base text-gray-400 p-2 float-right rounded-full  hover:text-gray-800 hover:bg-gray-400 font-medium">
                                    <span>Simpan</span>
                                </button>
                            </form>
                        @endif

                        {{-- Edit Comment --}}
                        @if (isset($edit_comment_id) && $edit_comment_id == $comment->id && $showFormEdit == true)
                            <form class="w-3/4 ml-8 " wire:submit.prevent="change">
                                <x-form.textarea-input class="w-full " wire:model.defer="body2"
                                    placeholder="Tulis Komentar..." />
                                @error('body2')
                                    <div class="mb-4 rounded-lg bg-danger-100 px-6 py-5 text-base text-danger-800 border border-danger-300"
                                        role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <button
                                    class=" mt-1 bg-gray-100 text-base text-gray-400 p-2 float-right rounded-full  hover:text-gray-800 hover:bg-gray-400 font-medium">
                                    <span>Simpan</span>
                                </button>
                            </form>
                        @endif
                    @endforeach
                @endif
            @empty
                <i class="fa-solid fa-comments text-8xl"></i>
                <h2 class="font-bold text-xl">Belum ada Komentar</h2>
            @endforelse


        </div>
    </div>
</div>
