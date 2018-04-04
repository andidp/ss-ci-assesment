<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migrate extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (!$this->CheckAccess()) {
			echo 'You are not allowed to access this!';
			exit();
		}
	}
	

    /**
     * Index Page for this controller is for trigger the migration.
     *
     * @return String
     */
    public function index()
    {
        $this->load->library('migration');

        if ($this->migration->current() === false) {
            show_error($this->migration->error_string());
        } else {
            echo 'Migration success!!';
        }
    }

    /**
	 * reference : http://www.wmtips.com/php/simple-ways-restrict-access-webpages-using.htm
	 */

    public function CheckAccess()
    {
        //allowed IP range start, change it to yours

        //please note that $toip must be greater than $fromip

        $fromip = '127.0.0.1';

        //allowed IP range end

        $toip = '127.0.0.100';

        $ip = ip2long($_SERVER['REMOTE_ADDR']);

        return ($ip >= ip2long($fromip) && $ip <= ip2long($toip));

    }
}
