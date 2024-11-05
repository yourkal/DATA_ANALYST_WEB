<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Analist extends Model
{
    use HasFactory;

    // app/Models/Analist.php
public function qtyDetails()
{
    return $this->hasMany(QtyDetail::class);
}

}
