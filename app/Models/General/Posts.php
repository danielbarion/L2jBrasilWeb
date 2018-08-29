<?php 
namespace App\Models\General;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model{
    
    /*
     Tabela associada a Model
    */
    protected $table = 'news_site';
    public $timestamps = false;

    protected $fillable = array('titulo', 
    'autor', 'date', 'post', 'urlimg');
}