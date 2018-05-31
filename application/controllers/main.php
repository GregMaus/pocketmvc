<?php

class Main extends PKT_Controller {
	
	function index()
	{
        $this->load->view('header');
		$this->load->view('main_view',array("nome"=>"greg"));
        $this->load->view('footer');

	}

	public function teste(){
	    echo "opa";
    }
    
}
