<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Entities\City;
use App\Entities\District;
use App\Entities\Ward;


class CityDistrictWardImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        $cities = [];
        $districts = [];
        $wards = [];

        $cityIds = [];
        $districtIds = [];
        foreach ($rows as $row) {
            // Ensure the row has all required columns
            if (isset($row['tinh_thanh_pho'], $row['ma_tp'], $row['quan_huyen'], $row['ma_qh'], $row['phuong_xa'], $row['ma_px'])) {

                $cityName = htmlspecialchars($row['tinh_thanh_pho'], ENT_QUOTES, 'UTF-8');
                $districtName = htmlspecialchars($row['quan_huyen'], ENT_QUOTES, 'UTF-8');
                $wardName = htmlspecialchars($row['phuong_xa'], ENT_QUOTES, 'UTF-8');
                $cityId = $row['ma_tp'];
                $districtId = $row['ma_qh'];
                $wardId = $row['ma_px'];
                
                if (!in_array($cityId, $cityIds)) {
                    $cities[] = [
                        'id' => $cityId,
                        'name' => $cityName
                    ];
                    $cityIds[] = $cityId;
                }

                if (!in_array($districtId, $districtIds)) {
                    $districts[] = [
                        'id' => $districtId,
                        'name' => $districtName,
                        'city_id' => $cityId
                    ];
                    $districtIds[] = $districtId;
                }

                $wards[] = [
                    'id' => $wardId,
                    'name' => $wardName,
                    'district_id' => $districtId
                ];
            }
        }
        City::insert($cities);
        District::insert($districts);
        Ward::insert($wards);
    }
}
