<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		$data['countOfActiveUsers'] = $this->getTotalActiveUsrs();
		$data['countOfActiveUsersOfAttachedActiveProducts'] = $this->getCountOfActiveUsersOfAttachedActiveProducts();
		$data['activeProductsCount'] = $this->getActiveProductsCount();
		$data['activeProductsNotBelongsToUser'] = $this->getActiveProductsNotBelongsToUser();
		$data['amountOfActiveAttachedProducts'] = $this->getAmountOfActiveAttachedProducts();
		$this->load->view('home',$data);
	}

	private function getTotalActiveUsrs()
	{
		$this->load->model('user_model','users');
		$data = $this->users->getActiveUserCount();
		return $data;
	}

	private function getCountOfActiveUsersOfAttachedActiveProducts()
	{
		$this->load->model('user_model','users');
		$data = $this->users->getCountOfActiveUsersOfAttachedActiveProducts();
		return $data;
	}

	private function getActiveProductsCount()
	{
		$this->load->model('product_model','products');
		$data = $this->products->getActiveProductsCount();
		return $data;
	}

	private function getActiveProductsNotBelongsToUser()
	{
		$this->load->model('product_model','products');
		$data = $this->products->getActiveProductsNotBelongsToUser();
		return $data;
	}

	private function getAmountOfActiveAttachedProducts()
	{
		$this->load->model('product_model','products');
		$data = $this->products->getAmountOfActiveAttachedProducts();
		return $data;
	}
	
}
