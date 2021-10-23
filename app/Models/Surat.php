<?php

namespace App\Models;

use Shart\BaseModel;

class Surat extends BaseModel
{
    /**
     * @var array
     */
    protected $fillable = [
        'id_organization',
        'id_employee',
        'id_position',
        'id_klasifikasi',
        'id_sifat',
        'id_jenis',
        'perihal',
        'ringkasan',
        'nomor',
        'tanggal',
    ];

    /**
     * @var string
     */
    protected $table = 'trx_surat';

    /**
     * @return mixed
     */
    public function details()
    {
        return $this->hasMany(SuratDetail::class, 'id_surat', 'id')->where('status', 1);
    }

    /**
     * @return mixed
     */
    public function dokumen()
    {
        return $this->hasOne(SuratUnggah::class, 'id_surat', 'id')->with('media')->where('section', 'dokumen');
    }

    /**
     * @return mixed
     */
    public function lampiran()
    {
        return $this->hasMany(SuratUnggah::class, 'id_surat', 'id')->with('media')->where('section', 'lampiran');
    }
}
