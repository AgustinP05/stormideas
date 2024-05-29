<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //Nos permite interactuar con la base de datos
use Illuminate\View\View;

class IdeaController extends Controller
{
    private array $rules = [
        'title'=> 'required|string|max:50',
        'description'=> 'string|max:400',
    ]; 

    private array $errorMessages = [
        'required'=> 'El :attribute es obligatorio',//El :attribute es para que ponga el name del campo que hemos puesto, asi es dinamico 
        'string'=> 'Este campo debe ser un string',
        'title.max'=> 'El campo :attribute no debe ser mayor a :max caracteres',
        'description.max'=> 'El campo :attribute no debe ser mayor a :max caracteres',
    ];

    public function index():View{
        $ideas = Idea::get(); //SELECT * FROM ideas   //otra forma para hacerlo pero que genera errores $ideas = DB::table("ideas")->get(); 
        
        return view('ideas.index',['ideas'=>$ideas]);
    }

    public function create():View{  //Se muestra en ideas/crear
        return view('ideas.create_or_edit');
    }

    public function store(Request $request):RedirectResponse{ //Se muestra en ideas/crear pero cuando se haga POST  (en el formulario de ideas.create)
       //dd($request->all()); //Helper de Laravel que significa Dump and Die y sirve para mostrar el contenido de la variable pasada por parametro //el token viene del @csrf del formulario
    
       //Validamos los datos   //Ver reglas de validacion en la pagina oficial de laravel
       $validated = $request-> validate($this->rules,$this->errorMessages);

       //La informacion validada recien la creamos en la base de datos //Recordar ponerlos en protected $fillable en el modelo correspondiente
       Idea::create([  //Para crear un nuevo registro en la tabla del modelo utilizado (en este caso es el modelo Idea que hace referencia a la tabla 'ideas') //Recordar que los campos que queremos guardar en la bd con el create, hay que especificarlos primero en el modelo correspondiente, en este caso en el modelo Idea en la variable protected $fillable
            'user_id'=>auth()->user()->id, //Llamamos al id con la informacion del usuario actual que está autenticado    //forma normal: $request->user()->id, //este campo no viene del formulario asi que no se valida con la funcion de arriba. Tenemos que llamar al id con la informacion de la request // El id de tabla 'user', se guarda dentro del user_id de tabla 'ideas' 
            'title'=>$validated['title'],
            'description'=>$validated['description']
       ]); 


       //Esto es para que cuando se crea la idea, aparezca ese mensaje
       session()->flash('message','Idea creada con éxito!');
   
       //Luego de enviar y crear el campo en la base de datos, redirigimos la pagina otra vez a ideas.index
       return redirect()->route('idea.index');

    }

    public function edit(Idea $idea):View{ //Nos viene la idea del boton edit seleccionado
        return view('ideas.create_or_edit')->with('idea',$idea);//Llamamos a la ruta con la informacion que habiamos pasado por parametro. El '$idea' viene del /{idea} que pusimos en web.php
    }

    public function update(Request $request, Idea $idea):RedirectResponse{ //Se muestra en ideas/edit/{idea} pero cuando se haga PUT por el formulario //la $request es la informacion escrita en el formulario //la $idea es la informacion de la idea en especifico que se hizo click para editar. Esa $idea viene por parametro de create_or_edit
        
        //Validamos los datos   
        $validated = $request-> validate($this->rules,$this->errorMessages);

 
        $idea->update($validated); //Agarramos la idea seleccionada y la actualizamos con la informacion validada. El update() es una funcion nativa de Eloquent
 

        //Esto es para que cuando se edite la idea, aparezca ese mensaje
        session()->flash('message','Idea editada con éxito!');

        //Luego de actualizar, redirigimos la pagina otra vez a ideas.index
        return redirect()->route('idea.index');
 
     }

     public function show(Idea $idea):View{
        
        return view('ideas.show')->with('idea',$idea);
    }

    public function delete(Idea $idea):RedirectResponse{
        
        $idea->delete();

         //Esto es para que cuando se elimine la idea, aparezca ese mensaje
         session()->flash('message','Idea eliminada!');
         

        return redirect()->route('idea.index');
    }
}
