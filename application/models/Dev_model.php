<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dev_model extends CI_model {

    public function get_data($fetch, $data_json) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, API_URL . $fetch);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_json);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data_json)
        ));

        $output = curl_exec($ch);
        curl_close($ch);
        return $output;
    }

}
?>