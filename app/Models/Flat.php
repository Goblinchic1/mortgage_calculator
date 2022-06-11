<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Flat extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'type', 'price'];


    /**
     * Возвращает Ипотеки
     * @return BelongsToMany
     */
    public function mortgages()
    {
        return $this->belongsToMany(Mortgage::class)->withPivot('monthly_payment');
    }


}
