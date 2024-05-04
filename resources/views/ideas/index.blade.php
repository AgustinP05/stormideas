<x-app-layout>
    
    <div class="flex flex-col py-12 px-[18%] ">
        <div class="mb-8 bg-indigo-900 shadow-sm sm:rounded-lg p-6 text-gray-900 dark:text-gray-100">
            <div class="flex flex-row justify-between mb-5 ">

                <div class="flex flex-col gap-x-4 ">
                    <h1 class="text-3xl">Titulo de la idea de la idea</h1>
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
                    
                    <div class="mb-8">
                        <div class="flex flex-row justify-between mb-5 ">
                            <div class="flex flex-row gap-x-4 items-center">
                                <h1>Nombre Apellido</h1>
                                <span>DD/MM/AA</span>
                                <span class=" text-gray-400 text-sm">- Editado</span>
                            </div>
                            <button>
                                <svg class="w-6 h-6 text-gray-400 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7"/>
                                </svg>
                            </button>
                        </div>
                       
                        <p class="mb-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos, maiores. Eius dolorem dolor vel labore modi enim illo architecto impedit, aut vitae culpa dolores odit error perferendis veniam laborum quis.</p>
                        
                        <div class="flex align-middle gap-x-1">
                            <button id="like">
                                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11c.889-.086 1.416-.543 2.156-1.057a22.323 22.323 0 0 0 3.958-5.084 1.6 1.6 0 0 1 .582-.628 1.549 1.549 0 0 1 1.466-.087c.205.095.388.233.537.406a1.64 1.64 0 0 1 .384 1.279l-1.388 4.114M7 11H4v6.5A1.5 1.5 0 0 0 5.5 19v0A1.5 1.5 0 0 0 7 17.5V11Zm6.5-1h4.915c.286 0 .372.014.626.15.254.135.472.332.637.572a1.874 1.874 0 0 1 .215 1.673l-2.098 6.4C17.538 19.52 17.368 20 16.12 20c-2.303 0-4.79-.943-6.67-1.475"/>
                                </svg>
                            </button>
                            <label for="like">0</label>
                        </div>
                    </div>


                    <div class="mb-8">
                        <div class="flex flex-row justify-between mb-5 ">
                            <div class="flex flex-row gap-x-4 items-center">
                                <h1>Nombre Apellido</h1>
                                <span>DD/MM/AA</span>
                                <span class=" text-gray-400 text-sm">- Editado</span>
                            </div>
                            <button>
                                <svg class="w-6 h-6 text-gray-400 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7"/>
                                </svg>
                            </button>
                        </div>
                       
                        <p class="mb-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos, maiores. Eius dolorem dolor vel labore modi enim illo architecto impedit, aut vitae culpa dolores odit error perferendis veniam laborum quis.</p>
                        
                        <div class="flex align-middle gap-x-1">
                            <button id="like">
                                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11c.889-.086 1.416-.543 2.156-1.057a22.323 22.323 0 0 0 3.958-5.084 1.6 1.6 0 0 1 .582-.628 1.549 1.549 0 0 1 1.466-.087c.205.095.388.233.537.406a1.64 1.64 0 0 1 .384 1.279l-1.388 4.114M7 11H4v6.5A1.5 1.5 0 0 0 5.5 19v0A1.5 1.5 0 0 0 7 17.5V11Zm6.5-1h4.915c.286 0 .372.014.626.15.254.135.472.332.637.572a1.874 1.874 0 0 1 .215 1.673l-2.098 6.4C17.538 19.52 17.368 20 16.12 20c-2.303 0-4.79-.943-6.67-1.475"/>
                                </svg>
                            </button>
                            <label for="like">0</label>
                        </div>
                    </div>

                    <div class="mb-8">
                        <div class="flex flex-row justify-between mb-5 ">
                            <div class="flex flex-row gap-x-4 items-center">
                                <h1>Nombre Apellido</h1>
                                <span>DD/MM/AA</span>
                                <span class=" text-gray-400 text-sm">- Editado</span>
                            </div>
                            <button>
                                <svg class="w-6 h-6 text-gray-400 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7"/>
                                </svg>
                            </button>
                        </div>
                       
                        <p class="mb-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos, maiores. Eius dolorem dolor vel labore modi enim illo architecto impedit, aut vitae culpa dolores odit error perferendis veniam laborum quis.</p>
                        
                        <div class="flex align-middle gap-x-1">
                            <button id="like">
                                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11c.889-.086 1.416-.543 2.156-1.057a22.323 22.323 0 0 0 3.958-5.084 1.6 1.6 0 0 1 .582-.628 1.549 1.549 0 0 1 1.466-.087c.205.095.388.233.537.406a1.64 1.64 0 0 1 .384 1.279l-1.388 4.114M7 11H4v6.5A1.5 1.5 0 0 0 5.5 19v0A1.5 1.5 0 0 0 7 17.5V11Zm6.5-1h4.915c.286 0 .372.014.626.15.254.135.472.332.637.572a1.874 1.874 0 0 1 .215 1.673l-2.098 6.4C17.538 19.52 17.368 20 16.12 20c-2.303 0-4.79-.943-6.67-1.475"/>
                                </svg>
                            </button>
                            <label for="like">0</label>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>