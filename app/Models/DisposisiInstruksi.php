<?php

namespace App\Models;

use Shart\BaseModel;

class DisposisiInstruksi extends BaseModel
{
    /**
     * @var array
     */
    protected $fillable = [
        'id_disposisi',
        'id_instruksi',
    ];

    /**
     * @var string
     */
    protected $table = 'trx_disposisi_instruksi';
}
