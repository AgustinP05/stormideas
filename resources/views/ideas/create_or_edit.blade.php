<x-app-layout>
    <div>                       <!--Si $idea no existe o si esta vacia, muestra store, sino muestra el update. El store es para almacenar. Y hace referencia al idea.store de web.php que a su vez hace referencia al store de ideaController-->
        <form method="POST" action="{{ empty($idea)?route('idea.store'):''}}" class="flex flex-col w-[50%] mx-auto py-12 gap-y-6">
            @csrf {{--Es por seguridad.  Para evitar ataques de falsificación de peticiones entre sitios. El CSRF Token es un valor secreto que genera la aplicación del lado del servidor y se transmite al cliente de tal manera que se incluye en la siguiente solicitud realizada por el cliente.--}}
            
            @if (empty($idea))  <!--Si idea no existe, es un post, sino es un put para actualizar-->
                @method("post")
            @else    
                @method("put")
            @endif
            
            

            <x-text-input id="title" type="text" name="title" :value="old('title', empty($idea)? '':$idea->title)" placeholder="Ingresa un titulo"/>
            <x-input-error :messages="$errors->get('title')"/>

            <textarea id="description" type="text" name="description" :value="old('description')" placeholder="Idea para aportar"  class="bg-transparent rounded-xl text-slate-200">
            {{old('description', empty($idea)?'Idea para aportar':$idea->description)}}
            </textarea> 
            <x-input-error :messages="$errors->get('description')"/>

            <div class=" mb-4">
            <a href="{{route('idea.store')}}" class="inline-flex items-center mx-4 px-6 py-4 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-bold text-sm  text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150">
            {{empty($idea)?'GUARDAR':'ACTUALIZAR'}}</a>

            <x-primary-button>{{empty($idea)?'GUARDAR':'ACTUALIZAR'}}</x-primary-button>
            <a href="{{route('idea.index')}}" class="inline-flex items-center mx-4 px-6 py-4 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-bold text-sm  text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150">
            CANCELAR</a>
            
        </div>
        </form>
    </div>
</x-app-layout>