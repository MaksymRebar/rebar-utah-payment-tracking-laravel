<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable=['amount','payer','due_on','vat','is_vat_inclusive'];
    public function payments():HasMany{
        return  $this->hasMany(Payment::class,'transaction','id');
    }
    public function paid():float{
        $payments=$this->hasMany(Payment::class,'transaction','id');
        return $payments->sum('amount');
    }
}
