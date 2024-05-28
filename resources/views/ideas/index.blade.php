<x-app-layout>

    <div class="flex flex-col py-12 px-[18%] ">
        <div class="mb-8 bg-indigo-900 shadow-sm sm:rounded-lg p-6 text-gray-900 dark:text-gray-100">
            <div class="flex flex-row justify-between mb-5 ">

                <div class="flex flex-col gap-x-4 ">
                    <h1 class="text-3xl">Titulo del proyecto</h1>
                    <div>
                        <small> <span>DD/MM/AA</span></small>
                        <span class=" text-gray-400 text-sm">- Editado</span>
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

            <p class="mb-5">Descripcion general Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos, maiores.
                Eius dolorem dolor vel labore modi enim illo architecto impedit, aut vitae culpa dolores odit error
                perferendis veniam laborum quis.</p>

            <div class="flex align-middle gap-x-1">

                <span>Ideas Totales: 3</span>
            </div>
        </div>

        <!-- Si la sesion tiene este mensaje. Muestra el div. el message viene del IdeaController -->
        @if (session()->has('message')) 
            <div class="text-center bg-gray-400/20 rounded-md p-2 mb-4 border-2 border-green-500 font-bold">
                <span class="text-green-500 text-xl">{{session('message')}}</span>
            </div>
        @endif
        
        <div class=" mb-4">
            <a href="{{route('idea.create')}}"
                class="inline-flex items-center mx-4 px-6 py-4 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-bold text-sm  text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150">AGREGAR</a>

            <x-secondary-button>LAS MEJORES</x-secondary-button>
        </div>

        <div class="w-[100%] ">
            <div class=" bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="pt-6 px-6 text-gray-900 dark:text-gray-100">

                    @forelse($ideas as $idea) <!--En la lista $ideas por cada idea hace lo siguiente   -->
                                            <div class="mb-8">
                                                <div class="flex flex-row justify-between mb-5 ">
                                                    <div class="flex flex-row gap-x-4 items-center">
                                                        <h1>{{$idea->user->name}}</h1>
                                                        <!-- Por cada $idea estamos llamando el metodo user() (y a su campo 'name') que se encuentra en el modelo Idea.php, ya que este modelo es el que se conecta con la tabla 'ideas'. Recordemos que en el IdeaController dije que $ideas hace referencia a la conexion con la DB en la tabla 'ideas', por eso entonces utilizo el modelo Idea que hace referencia a esa tabla -->
                                                        <small>{{$idea->created_at->format('d/m/Y')}}</small>
                                                        <!--Llamamos a la fecha en la cual se creó, esta fecha se encuentra en la base de datos que se hace de manera automatica-->
                                                        @unless($idea->created_at->eq($idea->updated_at)) {{--unless es lo contrario de if. Si 
                                                            e                               l momento de creacion es distinto al momento de actualizacion, se muestra la etiqueta q
                                                            u                               e viene despues. Recordar el detalle que al subir una idea a la base de datos, se crea
                                                                                            y actualiza al mismo tiempo. Por eso utilizamos este unless para verificar que si se edi
                                                            t                               a la nota que no sea por su creacion--}}
                                                                                            <small class=" text-gray-400 text-sm">- Editado</small>
                                                        @endunless
                                                    </div>
                                                    <x-dropdown>
                                                        <x-slot name="trigger">
                                                            <button>
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400"
                                                                    viewBox="0 0 20 20" fill="currentColor">
                                                                    <path
                                                                        d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                                                </svg>
                                                            </button>
                                                        </x-slot>
                                                        <x-slot name="content">
                                                            <x-dropdown-link :href="route('idea.show', $idea)">
                                                                Ver
                                                            </x-dropdown-link>
                                                            <x-dropdown-link :href="route('idea.edit', $idea)">
                                                                Editar
                                                            </x-dropdown-link>
                                                            <form method="POST" action="{{route('idea.delete', $idea)}}">
                                                              @csrf
                                                              @method('delete')
                                                                <x-dropdown-link href="#" onclick="event.preventDefault(); this.closest('form').submit();">  <!-- Este onclick hace que se haga el submit -->
                                                                    Eliminar
                                                                </x-dropdown-link>
                                                            </form>

                                                        </x-slot>
                                                    </x-dropdown>
                                                </div>

                                                <p class="mb-5">{{$idea->title}}</p>

                                                <div class="flex align-middle gap-x-1 items-center">
                                                    <button id="like">
                                                        <!-- <svg class="w-6 h-6 text-gray-800 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11c.889-.086 1.416-.543 2.156-1.057a22.323 22.323 0 0 0 3.958-5.084 1.6 1.6 0 0 1 .582-.628 1.549 1.549 0 0 1 1.466-.087c.205.095.388.233.537.406a1.64 1.64 0 0 1 .384 1.279l-1.388 4.114M7 11H4v6.5A1.5 1.5 0 0 0 5.5 19v0A1.5 1.5 0 0 0 7 17.5V11Zm6.5-1h4.915c.286 0 .372.014.626.15.254.135.472.332.637.572a1.874 1.874 0 0 1 .215 1.673l-2.098 6.4C17.538 19.52 17.368 20 16.12 20c-2.303 0-4.79-.943-6.67-1.475"/>
                                                            </svg> -->
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#ffffff"
                                                            class="size-6 mr-1 ">
                                                            <path
                                                                d="M7.493 18.5c-.425 0-.82-.236-.975-.632A7.48 7.48 0 0 1 6 15.125c0-1.75.599-3.358 1.602-4.634.151-.192.373-.309.6-.397.473-.183.89-.514 1.212-.924a9.042 9.042 0 0 1 2.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 0 0 .322-1.672V2.75A.75.75 0 0 1 15 2a2.25 2.25 0 0 1 2.25 2.25c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 0 1-2.649 7.521c-.388.482-.987.729-1.605.729H14.23c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 0 0-1.423-.23h-.777ZM2.331 10.727a11.969 11.969 0 0 0-.831 4.398 12 12 0 0 0 .52 3.507C2.28 19.482 3.105 20 3.994 20H4.9c.445 0 .72-.498.523-.898a8.963 8.963 0 0 1-.924-3.977c0-1.708.476-3.305 1.302-4.666.245-.403-.028-.959-.5-.959H4.25c-.832 0-1.612.453-1.918 1.227Z" />
                                                        </svg>
                                                    </button>
                                                    <label for="like">{{$idea->likes}}</label>
                                                </div>
                                            </div>
                                            @empty <!--Si es la lista $ideas no hay nada, se muestra lo siguiente  -->
                                            <div
                                                class="mb-8 bg-indigo-900 shadow-sm sm:rounded-lg p-6 text-gray-900 dark:text-gray-100 text-2xl font-semibold">
                                                No hay ideas todavía
                                            </div>
                    @endforelse




                </div>
            </div>
        </div>
    </div>
</x-app-layout>