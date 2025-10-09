<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Administrador extends Model
{

    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'administrador';
    protected $primaryKey = 'id_admin';
    protected $fillable = ['nome_admin','login'];
    protected $hidden = ['senha','remember_token'];

    public function histAlteracoes():HasMany {
        return $this->hasMany(Hist_Alteracao_Bioma::class, 'admin_id', 'id_admin');
    }
    public function getAuthPassword() {
        return $this->senha;
    }
}
