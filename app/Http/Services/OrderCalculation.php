<?php

namespace App\Http\Services;

use App\Models\Zones;

class OrderCalculation
{
    private $discount = 0.05;
    private $longProductExtraCost = 1995;
    private $discountApplied = false;


    public function calculate(array $data): array
    {
        $zonesModel = new Zones();
        $zone = $zonesModel->getZoneByPostCode($data['postcode']);

        $value = $zone['price'] * $data['total_amount'];
        $value = $this->addLongProductExtraCost($value, $data);
        $value = $this->addDiscount($value);
        return $this->prepareResult($value, $data, $zone);

    }

    private function addDiscount($value)
    {
        if ($value > 12500) {
            $this->discountApplied = true;
            return $value * (1 - $this->discount);
        } else {
            return $value;
        }

    }

    private function addLongProductExtraCost($value, $data)
    {
        if (isset($data['long_product'])) {
            return $value + $this->longProductExtraCost;
        } else {
            return $value;
        }
    }

    private function prepareResult(int $value, array $data, Zones $zone): array
    {
        $result['value'] = $value;
        $result['price'] = $zone['price'];
        $result['postcode'] = $data['postcode'];
        $result['total_amount'] = $data['total_amount'];

        if ($this->discountApplied) {
            $result['discount_applied'] = $this->discount;
        } else {
            $result['discount_applied'] = null;
        }
        if (isset($data['long_product'])) {
            $result['long_product'] = $this->longProductExtraCost;
        } else {
            $result['long_product'] = null;
        }

        $result['created_at'] = now('Europe/Warsaw');
        return $result;
    }


}
