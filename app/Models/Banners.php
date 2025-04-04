<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banners extends Model
{
    use HasFactory;
    protected $fillable = ['name','description','photopath','status'];

    public function banner()
    {
    return $this->belongsTo(Banners::class);
    }
}
