<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Idea extends Model
{
    use HasFactory;

    
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


