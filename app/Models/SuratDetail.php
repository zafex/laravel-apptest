<?php

namespace App\Models;

use Shart\BaseModel;

class SuratDetail extends BaseModel
{
    /**
     * @var array
     */
    protected $fillable = [
        'id_surat',
        'content',
        'order',
    ];

    /**
     * @var string
     */
    protected $table = 'trx_surat_detail';
}
