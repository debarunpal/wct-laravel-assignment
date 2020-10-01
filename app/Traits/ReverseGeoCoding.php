<?php

 namespace App\Traits;

 trait ReverseGeoCoding
 {

    public function getLocation($lat, $long)
    {
        // Define Constants
        $GOOGLE_API_KEY = env('GOOGLE_MAPS_API_KEY');
        $key     = self::GOOGLE_API_KEY;
        $url     = "https://maps.googleapis.com/maps/api/geocode/json?latitude=$lat&longitude=$long&key=$key";

        // Create a curl call
        $ch      = curl_init();
        $timeout = 0;

        curl_setopt( $ch, CURLOPT_URL, $url );
        curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, 0 );
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt( $ch, CURLOPT_HEADER, 0 );
        curl_setopt( $ch, CURLOPT_CONNECTTIMEOUT, $timeout );

        $data = curl_exec( $ch );
        // send request and wait for response

        $response = json_decode( $data, true );

        curl_close( $ch );

        if ( $jsonFormat == true ) {
            return response()->json( $response, 200 );
        } else {
            return $response;
        }

    }

    /**
     * @param string $address
     *
     * @return mixed
     */
    public static function getLatLng( $address = "" ) {
        $geoData = self::getLocation( $address, false );

        if(empty($geoData['results'])) {
            return ['lat' => null, 'lng' => null];
        } else {
            return $geoData['results'][0]['geometry']['location'];
        }
    }
 }
