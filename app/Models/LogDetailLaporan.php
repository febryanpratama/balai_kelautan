<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LogDetailLaporan extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];
    

    public function user(){
        return $this->belongsTo(User::class,  'log_user_id', 'id');
    }
}
