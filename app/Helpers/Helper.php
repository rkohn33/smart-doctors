<?php 

if (!function_exists('returnResponse')) {
    /**
     * Returns a human readable file size
     *
     * @param integer $bytes
     * Bytes contains the size of the bytes to convert
     *
     * @param integer $decimals
     * Number of decimal places to be returned
     *
     * @return string a string in human readable format
     *
     * */
    function returnResponse($code, $data=[], $message, $errors=null)
    {
        $response = [
            "code"      => $code,
            "data"      => [],
            "message"   => $message
        ];

        if(!empty($errors)){
            $response['errors'] = $errors;
        }

        if(!empty($data)){
            $response['data'] = $data;
        }

        return $response;
    }
}
 