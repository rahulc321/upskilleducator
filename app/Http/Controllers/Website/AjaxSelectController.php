<?php

namespace App\Http\Controllers\Website;

use App\Models\CityStateCountry;
use App\Utils\AppConstant;
use App\Http\Controllers\Controller;

class AjaxSelectController extends Controller
{
    private $cityStateCountry;

    public function __construct(
        CityStateCountry $cityStateCountry
    )
    {
        $this->cityStateCountry = $cityStateCountry;
    }

    public function loadData($index, $id = 0)
    {
        $result = "";
        switch ($index) {
            case 'state':
                $users = $this->cityStateCountry->where(array(
                    'status' => AppConstant::STATUS_ACTIVE
                ))->get('state')->toArray();

                $result = "<option value=''>Select User</option>";
                foreach ($users as $user) {
                    $result .= "<option value='" . $user->id . "'>$user->name</option>";
                }
                break;
        }
        echo $result;
    }

    public function loadSelData($index, $selId, $id = 0)
    {
        $result = "";
        switch ($index) {
            case 'state':
                $states = $this->cityStateCountry->where(array(
                    'country' => $selId
                ))->groupBy('state')->get('state');

                $result = "<option value=''>Select State/Province</option>";
                foreach ($states as $state) {
                    $result .= "<option value='" . $state->state . "'>$state->state</option>";
                }
                break;
            case 'city':
                $cities = $this->cityStateCountry->where(array(
                    'state' => $selId
                ))->orderBy('city')->get();

                $result = "<option value=''>Select City/County</option>";
                foreach ($cities as $city) {
                    $result .= "<option value='" . $city->city . "'>$city->city </option>";
                }
                break;
        }
        echo $result;
    }
}
