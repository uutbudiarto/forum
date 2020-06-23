<?php

/**
 * 
 */
class MY_Controller extends CI_Controller
{	
	protected $data = [];
	function __construct()
	{
		parent::__construct();
	}

	public function layout()
	{
		$this->template['header'] = $this->load->view('layouts/header',$this->data, TRUE);
		$this->template['footer'] = $this->load->view('layouts/footer',$this->data, TRUE);
		$this->template['navbar'] = $this->load->view('layouts/navbar',$this->data, TRUE);
		$this->template['sidebar'] = $this->load->view('layouts/sidebar',$this->data, TRUE);
		$this->template['page'] = $this->load->view($this->page,$this->data, TRUE);
		$this->load->view('layouts/main',$this->template);
	}
}