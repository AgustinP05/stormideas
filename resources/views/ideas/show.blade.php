<x-app-layout>
    <div class="flex w-full p-10 justify-center items-center ">
        <div class="w-[70%] mb-8 bg-gray-700 shadow-sm sm:rounded-lg p-6 text-gray-900 dark:text-gray-100">
            <div class="flex flex-row justify-between mb-5 ">

                <div class="flex flex-col gap-x-4 ">
                    <h1 class="text-3xl">{{$idea->title}}</h1>
                    <div>
                        <h2 class="inline-block font-bold text-slate-200">{{$idea->user->name}}</h2>
                        <small> <span>- {{$idea->created_at->format('d/m/Y')}}</span></small>
                        @unless($idea->created_at->eq($idea->updated_at)) {{--unless es lo contrario de if. Si el momen
                                    t         o de creacion es distinto al momento de actualizacion, se muestra la etiqueta que viene despue
                            s                   . Recordar el detalle que al subir una idea a la base de datos, se crea y actualiza al mis
                                m             o tiempo. Por eso utilizamos este unless para verificar que si se edita la nota que no sea por 
                                        s       u creacion--}}
                                                <small class=" text-gray-400 text-sm">- Editado
                                                    {{$idea->updated_at->format('d/m/Y h:ma')}}</small>
                        @endunless
                    </div>
                </div>
                <button>
                    <svg class="w-6 h-6 text-gray-400 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 9-7 7-7-7" />
                    </svg>
                </button>
            </div>

            <p class="mb-5">{{$idea->description}}</p>

            <form method="POST" action="" class="flex align-middle justify-between items-center">
                @csrf
                @method("put")
                <div class="flex gap-x-5 items-center">
                    <x-primary-button>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#1f2937" class="size-6 mr-2">
                            <path d="M7.493 18.5c-.425 0-.82-.236-.975-.632A7.48 7.48 0 0 1 6 15.125c0-1.75.599-3.358 1.602-4.634.151-.192.373-.309.6-.397.473-.183.89-.514 1.212-.924a9.042 9.042 0 0 1 2.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 0 0 .322-1.672V2.75A.75.75 0 0 1 15 2a2.25 2.25 0 0 1 2.25 2.25c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 0 1-2.649 7.521c-.388.482-.987.729-1.605.729H14.23c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 0 0-1.423-.23h-.777ZM2.331 10.727a11.969 11.969 0 0 0-.831 4.398 12 12 0 0 0 .52 3.507C2.28 19.482 3.105 20 3.994 20H4.9c.445 0 .72-.498.523-.898a8.963 8.963 0 0 1-.924-3.977c0-1.708.476-3.305 1.302-4.666.245-.403-.028-.959-.5-.959H4.25c-.832 0-1.612.453-1.918 1.227Z" />
                        </svg>
                        Me gusta
                    </x-primary-button>
                    <span>Likes: {{$idea->likes}}</span>
                </div>

                <a href="{{route('idea.index')}}" class="inline-flex items-center text-sm  text-gray-300 uppercase tracking-widest shadow-sm  focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-gray-800 hover:text-gray-200/50 transition-all">
                Volver</a>
            </form>
        </div>
    </div>
</x-app-layout>