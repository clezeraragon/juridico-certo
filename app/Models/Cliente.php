<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 08 Feb 2018 04:00:12 +0000.
 */

namespace JuridicoCerto\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Cliente
 *
 * @property int $id
 * @property string $nome
 * @property string $email
 * @property \Carbon\Carbon $data_nascimento
 * @property string $ativo
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @property \Illuminate\Database\Eloquent\Collection $telefones
 *
 * @package JuridicoCerto\Models
 */
class Cliente extends Eloquent
{
    protected $casts = [
        'ativo' => 'string'
    ];

    protected $dates = [
        'data_nascimento'
    ];

    protected $fillable = [
        'nome',
        'email',
        'data_nascimento',
        'ativo'
    ];

    public function telefones()
    {
        return $this->hasMany(\JuridicoCerto\Models\Telefone::class);
    }

    public static function getComboClientes()
    {
        return self::pluck('id', 'nome');
    }
}
