<?php

namespace App\Models;

use Shart\BaseModel;

class DisposisiTujuan extends BaseModel
{
    /**
     * @var array
     */
    protected $fillable = [
        'id_disposisi',
        'id_employee',
        'id_position',
        'id_organization',
    ];

    /**
     * @var string
     */
    protected $table = 'trx_disposisi_tujuan';
}
