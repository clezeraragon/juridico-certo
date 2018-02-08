<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 08 Feb 2018 01:09:13 +0000.
 */

namespace JuridicoCerto\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Telefone
 * 
 * @property int $id
 * @property int $cliente_id
 * @property string $ddd
 * @property string $numero
 * @property string $ativo
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \JuridicoCerto\Models\Cliente $cliente
 *
 * @package JuridicoCerto\Models
 */
class Telefone extends Eloquent
{
	protected $casts = [
		'cliente_id' => 'int',
		'ativo' => 'string'
	];

	protected $fillable = [
		'cliente_id',
		'ddd',
		'numero',
		'ativo'
	];

	public function cliente()
	{
		return $this->belongsTo(\JuridicoCerto\Models\Cliente::class);
	}
}
