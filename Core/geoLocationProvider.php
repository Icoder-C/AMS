<?php

namespace Core;

use Core\Geoplugin;

class geoLocationProvider{

	
	public static function getGeoLocation(){
		$locationApi = new geoPlugin();

		$locationApi->locate();

		return [
			'lat'=>$locationApi->latitude,
			'long'=>$locationApi->longitude
		];
    }
}


?>