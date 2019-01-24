<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dev_controller extends CI_Controller {

	public function dev_monster_detail() {
		$data = array(
            'appToken' => APPTOKEN,
            'monsterPid' => '30'
        );
        $data_json = json_encode($data);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, API_URL . "ro/monster/fetch_monster_detail");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_json);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data_json)
        ));

        $output = curl_exec($ch);
        curl_close($ch);
        
        $output_json = json_decode($output, true);
        $data['monster'] = $output_json['monster'][0];
        $this->load->view('ro_monster_detail', $data);
	}

}
