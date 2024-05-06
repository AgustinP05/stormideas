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
                    <svg class="w-6 h-6 text-gray-400 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7"/>
                    </svg>
                </button>
            </div>
                        
            <p class="mb-5">Descripcion general Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos, maiores. Eius dolorem dolor vel labore modi enim illo architecto impedit, aut vitae culpa dolores odit error perferendis veniam laborum quis.</p>
                            
            <div class="flex align-middle gap-x-1">
                
                <span>Ideas Totales:  3</span>
            </div>
        </div>
        

        <div class=" mb-4">
            <x-secondary-button class="mx-5 ">AGREGAR</x-secondary-button>
            <x-secondary-button>LAS MEJORES</x-secondary-button>
        </div>
        <div class="w-[100%] ">
            <div class=" bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="pt-6 px-6 text-gray-900 dark:text-gray-100">
                    
                    @forelse($ideas as $idea) <!--En la lista $ideas por cada idea hace lo siguiente   -->
                        <div class="mb-8">
                            <div class="flex flex-row justify-between mb-5 ">
                                <div class="flex flex-row gap-x-4 items-center">
                                    <h1>{{$idea->user()->name}}</h1> <!-- Por cada $idea estamos llamando el metodo user() (y a su campo 'name') que se encuentra en el modelo Idea.php, ya que este modelo es el que se conecta con la tabla 'ideas'. Recordemos que en el IdeaController dije que $ideas hace referencia a la conexion con la DB en la tabla 'ideas', por eso entonces utilizo el modelo Idea que hace referencia a esa tabla -->
                                    <small>{{$idea->created_at}}</small> <!--Llamamos a la fecha en la cual se creó, esta fecha se encuentra en la base de datos que se hace de manera automatica-->
                                    @unless($idea->created_at->eq($idea->updated_at)) {{--unless es lo contrario de if. Si el momento de creacion es distinto al momento de actualizacion, se muestra la etiqueta que viene despues. Recordar el detalle que al subir una idea a la base de datos, se crea y actualiza al mismo tiempo. Por eso utilizamos este unless para verificar que si se edita la nota que no sea por su creacion--}}
                                            <small class=" text-gray-400 text-sm">- Editado</small>
                                    @endunless
                                </div>
                                <x-dropdown>
                                        <x-slot name="trigger">
                                            <button>
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                                    <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                                </svg>
                                            </button>
                                        </x-slot>
                                        <x-slot name="content">
                                        <x-dropdown-link wire:click="edit()">
                                                {{ __('Ver') }}
                                            </x-dropdown-link>
                                            <x-dropdown-link wire:click="edit()">
                                                {{ __('Edit') }}
                                            </x-dropdown-link>
                                            <x-dropdown-link wire:click="delete()" wire:confirm="Are you sure to delete this chirp?"> 
                                                 {{ __('Delete') }}
                                             </x-dropdown-link> 
                                        </x-slot>
                                    </x-dropdown>
                            </div>
                        
                            <p class="mb-5">{{$idea->title}}</p>
                            
                            <div class="flex align-middle gap-x-1">
                                <button id="like">
                                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11c.889-.086 1.416-.543 2.156-1.057a22.323 22.323 0 0 0 3.958-5.084 1.6 1.6 0 0 1 .582-.628 1.549 1.549 0 0 1 1.466-.087c.205.095.388.233.537.406a1.64 1.64 0 0 1 .384 1.279l-1.388 4.114M7 11H4v6.5A1.5 1.5 0 0 0 5.5 19v0A1.5 1.5 0 0 0 7 17.5V11Zm6.5-1h4.915c.286 0 .372.014.626.15.254.135.472.332.637.572a1.874 1.874 0 0 1 .215 1.673l-2.098 6.4C17.538 19.52 17.368 20 16.12 20c-2.303 0-4.79-.943-6.67-1.475"/>
                                    </svg>
                                </button>
                                <label for="like">{{$idea->likes}}</label>
                            </div>
                        </div>
                    @empty  <!--Si es la lista $ideas no hay nada, se muestra lo siguiente  -->
                        <div class="mb-8 bg-indigo-900 shadow-sm sm:rounded-lg p-6 text-gray-900 dark:text-gray-100 text-2xl font-semibold">
                            No hay ideas todavía
                        </div>
                    @endforelse


                        

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
