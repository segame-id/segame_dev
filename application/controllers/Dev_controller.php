<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dev_controller extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('dev_model');
    }

	public function dev_monster_detail() {
        $fetch = 'ro/monster/fetch_monster_detail';
		$data = array(
            'appToken' => APPTOKEN,
            'monsterPid' => '30'
        );
        $data_json = json_encode($data);

        $result = $this->dev_model->get_data($fetch, $data_json);
        
        $output_json = json_decode($result, true);
        $data['data'] = $output_json['data'][0];
        $this->load->view('ro_monster_detail', $data);
    }
    
    public function dev_item_detail() {
        $fetch = 'ro/item/fetch_item_detail';
		$data = array(
            'appToken' => APPTOKEN,
            'itemPid' => '30'
        );
        $data_json = json_encode($data);

        $result = $this->dev_model->get_data($fetch, $data_json);
        
        $output_json = json_decode($result, true);
        $data['data'] = $output_json['data'][0];
        $this->load->view('ro_item_detail', $data);
    }

}
