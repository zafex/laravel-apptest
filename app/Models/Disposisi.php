<?php

namespace App\Models;

use Shart\BaseModel;

class Disposisi extends BaseModel
{
    /**
     * @var array
     */
    protected $fillable = [
        'id_surat',
        'id_employee',
        'id_position',
        'id_organization',
        'id_reference',
        'section',
        'nomor',
        'tanggal',
        'keterangan',
    ];

    /**
     * @var string
     */
    protected $table = 'trx_disposisi';

    /**
     * @return mixed
     */
    public function instruksi()
    {
        return $this->hasMany(DisposisiDisposisi::class, 'id_disposisi', 'id');
    }

    /**
     * @return mixed
     */
    public function surat()
    {
        return $this->belongsTo(Surat::class, 'id_surat', 'id');
    }

    /**
     * @return mixed
     */
    public function tujuan()
    {
        return $this->hasMany(DisposisiTujuan::class, 'id_disposisi', 'id');
    }
}
