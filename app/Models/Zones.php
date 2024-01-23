<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zones extends Model
{
    use HasFactory;

    public function getZoneByPostCode($postCode)
    {
        $zonesModel = new Zones();
        $postCode = substr($postCode, 0, 2);
        return $zonesModel::where('zone', $postCode)->first();
    }
}
