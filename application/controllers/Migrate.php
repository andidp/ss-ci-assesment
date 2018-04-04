<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migrate extends CI_Controller {

	/**
	 * Index Page for this controller is for trigger the migration.
	 *
	 * @return String
	 */
	public function index()
	{
		$this->load->library('migration');

		if ($this->migration->current() === FALSE)
		{
			show_error($this->migration->error_string());
		} else {
			echo 'Migration success!!';
		}
	}
}
