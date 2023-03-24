<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;
    protected $fillable = [
        'name_produits	',
        'produit_prix'
    ];


    public function user() { 

        return $this->hasManyThrough(User::class, Commande::class,'produit_id', 'id', 'id', 'user_id' ); 
        
        } 
        
    public function commande() { 
        
        return $this->hasOne(Commande::class);
    }


}
