<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
//use App\Models\Idea; //no hace falta llamarla. Se llama automaticamente ya que se encuentra en la misma carpeta que este archivo actual

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    //Un usuario va a tener muchas ideas. Entonces con esta llamamos todas las ideas
    public function ideas():HasMany{
        return $this->hasMany(Idea::class);
    }

    //Un usuario va a tener muchas ideas a las que le haya dado Like// Este se conecta con usersLikedThis del modelo Idea
    public function ideasLiked():BelongsToMany{
        return $this->belongsToMany(Idea::class);//Como dije en el archivo de migracion, no hay un modelo para 'idea_user'. Pero aunque haya puesto el modelo Idea, Laravel entiende que existe una tabla pibote entre idea y usuario
    }
}
