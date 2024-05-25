<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Idea extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','title','description']; //Aquí van los campos que queremos permitir crear con el metodo create en controladores. Esto es por seguridad   // el campo likes no hace falta ponerlo porque no lo estamos creando con el create, sino que ya le pusimos un valor por default desde las migrations
    
    protected $casts = ['created_at'=>'datetime']; //Para mostrar valores de manera diferente//En este caso es para no mostrar la hora en la que se creó, marcamos que queremos castear el datetime. Y donde lo llamamos declaramos el formato

    //Cada idea le pertenece a su usuario//Asi que teniendo un objeto Idea, puedo llamar a la funcion User para tener su usuario que lo creó
    //relacion inversa se llama esto
    public function user():BelongsTo{
        return $this->belongsTo(User::class);
    }

    //Un usuario va a tener muchas ideas a las que le haya dado Like // Este se conecta con ideasLiked del modelo User
    public function usersLikedThis():BelongsToMany{
        return $this->belongsToMany(User::class);//Como dije en el archivo de migracion, no hay un modelo para 'idea_user'. Pero aunque haya puesto el modelo User, Laravel entiende que existe una tabla pibote entre idea y usuario
    }
}


