<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**public function __construct()
{
  parent::__construct();
  $this->load->model('RS_Advent_Model');
  $this->load->helper('url_helper');
}
public function index()
{
   $data['dokter'] = $this->RS_Advent_Model->get_db();
}

public function view()
{
  $this->load->view('RS_Advent_View');
}
 *
*/
class Irfan_Grayscale_Controller extends CI_Controller
{
    public function view_irfan_grayscale()
    {
      $this->load->view('View_Irfan_Grayscale/V_Home.php');
    }
}
 ?>
