<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Exchange_rate extends CI_Controller {

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
		$url = "https://api.apilayer.com/exchangerates_data/latest";
		$currency_to = 'USD,RON';
		$currency_from = 'EUR';
		$paramsArray = ['symbols' => $currency_to,'base'=>$currency_from];
		$param_url = http_build_query($paramsArray);
		$final_url = $url."?".$param_url;
		$header_array = array(
			"Content-Type:text/plain",
			"apikey:iljyFUfV0Rj665QA4ifoiVkFFjG6DFjp"
		);
		//die(print($final_url));
		//  Initiate curl
		$ch = curl_init();

		// Disable SSL verification
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

		// Will return the response, if false it print the response
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $header_array);

		// Set the url
		curl_setopt($ch, CURLOPT_URL,$url);

		// Execute
		$result=curl_exec($ch);

		// Closing
		curl_close($ch);

		// Print the return data
		//print_r(json_decode($result, true));
		$api_response = json_decode($result, true);
		$data['ron_rates'] = $api_response['rates']['RON'];
		$data['usd_rates'] = $api_response['rates']['USD'];
		
		$this->load->view('exchange_rate',$data);
	}

	
}
