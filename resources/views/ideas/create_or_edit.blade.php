<x-app-layout>
    <div>                       <!--Si $idea no existe o si esta vacia, muestra store, sino muestra el update. El store es para almacenar. Y hace referencia al idea.store de web.php que a su vez hace referencia al store de ideaController. Sino, te envia a la ruta del update, que ahí hace el put en lugar de crear. Ademas le pasamos la $idea por parametro para que pueda utilizar la informacion que había antes. En cambio el de crear una nota la idea estaba vacía desde un inicio-->
        <form method="POST" action="{{ empty($idea)?route('idea.store'):route('idea.update',$idea)}}" class="flex flex-col w-[50%] mx-auto py-12 gap-y-6">
            @csrf {{--Es por seguridad.  Para evitar ataques de falsificación de peticiones entre sitios. El CSRF Token es un valor secreto que genera la aplicación del lado del servidor y se transmite al cliente de tal manera que se incluye en la siguiente solicitud realizada por el cliente.--}}
            
            @if (empty($idea))  <!--Si idea no existe, es un post, sino es un put para actualizar-->
                @method("post")
            @else    
                @method("put")
            @endif
            
            

            <x-text-input id="title" type="text" name="title" :value="old('title', empty($idea)? '':$idea->title)" placeholder="Ingresa un titulo"/>
            <x-input-error :messages="$errors->get('title')"/>

            <textarea id="description" type="text" name="description" placeholder="Idea para aportar"  class="bg-transparent rounded-xl text-slate-200">{{old('description',empty($idea)?'':$idea->description)}}</textarea> 
            <x-input-error :messages="$errors->get('description')"/>

            
            <div class="flex justify-between mb-4">
                <x-primary-button>{{empty($idea)?'GUARDAR':'ACTUALIZAR'}}</x-primary-button>
                <a href="{{route('idea.index')}}" class="inline-flex items-center text-sm  text-gray-300 uppercase tracking-widest shadow-sm  focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-gray-800 hover:text-gray-200/50 transition-all">
                Volver</a>
            </div>
        </form>
    </div>
</x-app-layout>