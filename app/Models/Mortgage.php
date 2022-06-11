<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Mortgage extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'interest_rate', 'years', 'min_initial_contribution'];


    /**
     * Возвращает Квартиры
     * @return BelongsToMany
     */
    public function flats()
    {
        return $this->belongsToMany(Flat::class)->withPivot('monthly_payment');
    }


    /**
     * Возвращает ежемесячный платёж
     *
     * @param $iPrice
     * @param array|int $mortgage
     * @return float|int
     */
    public static function getMonthlyPayment($iPrice, $mortgage)
    {
        if (!is_object($mortgage)) {
            $oMortgage = self::find($mortgage);
        } else {
            $oMortgage = $mortgage;
        }
        $iSum = $iPrice - $oMortgage->min_initial_contribution;
        $iMounts = $oMortgage->years * 12;
        $fMountPercent = $oMortgage->interest_rate / 12 / 100;
        return $iSum / $iMounts + $iSum * $fMountPercent;
    }
}
