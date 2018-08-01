<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class document extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'document';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'exported',
        'updated_at'
    ];

    /**
     * Definition of Eloquent relationship to keyvals
     *
     * @var array
     */
     public function keyvals()
   {
       return $this->hasMany('\App\keyvals')->withTimestamps();
   }

}
