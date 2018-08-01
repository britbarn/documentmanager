<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Keyval extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'key_values';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'key',
        'value',
		'doc_id'
	];


}
