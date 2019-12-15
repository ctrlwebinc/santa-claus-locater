<?php

namespace App\Http\Controllers;

use App\Location;
use Carbon\Carbon;

class LocatorController extends Controller
{
    /**
     * Show the Santa Claus locator.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show()
    {
        $christmas_day = Carbon::now()->toDateString() == env('CHRISTMAS_DAY');
        if (!$christmas_day) {
            $current_location = $this->_location_rest_of_the_year();
        } else {
            $current_location = Location::where('time', '>=', Carbon::now()->toTimeString())->orderBy('time')->first();
            if (!$current_location) {
                $current_location = $this->_location_rest_of_the_year();
            }
        }
        return view('locator',
            [
                'current_location' => $current_location,
                'christmas_day' => $christmas_day,
            ]
        );
    }

    private function _location_rest_of_the_year()
    {
        $location = new Location;
        $location->time = Carbon::now()->toTimeString();
        $location->city = "Santa's Village, North Pole";
        return $location;
    }
}
