<?php

namespace App\Models;

use Shart\BaseModel;

class SuratUnggah extends BaseModel
{
    /**
     * @var array
     */
    protected $fillable = [
        'id_surat',
        'id_media',
        'section',
    ];

    /**
     * @var string
     */
    protected $table = 'trx_surat_unggah';

    /**
     * @return mixed
     */
    public function media()
    {
        return $this->belongsTo(Media::class, 'id_media', 'id')->where('status', 1);
    }
}
