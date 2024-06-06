<?php
/**
 *
 * Created by PhpStorm.
 * User: Sulaiman Al Breem ( @snbreem )
 * Date: ١٨/٠٨/٢٠٢١
 * Time: ٠٩:٠٠ ص
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CurrencyTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['name'];
}
