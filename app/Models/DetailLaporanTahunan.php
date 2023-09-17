<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetailLaporanTahunan extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded = ['id'];

    public function LaporanTahunan(){
        return $this->belongsTo(LaporanTahunan::class);
    }

    public function dokumen(){
        return $this->belongsTo(Dokumen::class);
    }

    public function file(){
        return $this->hasMany(FileLaporan::class);
    }

    public function logDetail(){
        return $this->hasMany(LogDetailLaporan::class)->orderBy('created_at', 'desc');
    }
}
