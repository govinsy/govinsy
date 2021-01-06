<?php

namespace App\Controllers;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 *
 * @package CodeIgniter
 */

use CodeIgniter\Controller;

// session_start();

// Alamat utama
define('BASEPATH', dirname(dirname(dirname(__FILE__))));

// Database
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'govinsy');

// UniqueID Maker
define('UNIQUEID', substr(uniqid(), 8, 5));

// Deklarasi Paramater API
define('URL', [
	'covid_ind' => 'https://covid19.mathdro.id/api/countries/IDN',
	'covid_prov' => 'https://data.covid19.go.id/public/api/prov.json',
	'bps_domain' => 'https://webapi.bps.go.id/v1/api/domain?',
	'bps_strategic' => 'https://webapi.bps.go.id/v1/api/list?',
	'newsapi' => 'http://newsapi.org/v2/top-headlines?country=id&category=health&',
	'covid_dayone' => 'https://api.covid19api.com/dayone/country/indonesia',
	'hospital' => 'https://dekontaminasi.com/api/id/covid19/hospitals',
	'provdesc' => base_url() . '/json/provdesc.json'
]);
define('FIELD', [
	'key' => [
		'bps_key' => 'key=' . 'ae16cc87c0398c4ab14d22fa99deed75' . '&',
		'newsapi_key' => 'apiKey=' . '6ea14b5ed1454324aa734a9db2808c19'
	],
	'model' => [
		'indicators' => 'model=indicators&',
		'statictable' => 'model=statictable',
	],
	'type' => [
		'all'						=> 'type=all&',
		'prov'					=> 'type=prov&',
		'kab'					=> 'type=kab&',
		'provbykab'		=> 'type=provbykab&'
	]
]);


class BaseController extends Controller
{





	/**
	 * An array of helpers to be loaded automatically upon
	 * class instantiation. These helpers will be available
	 * to all other controllers that extend BaseController.
	 *
	 * @var array
	 */
	protected $helpers = [];

	// Lokasi definisi di config/config.php
	public $url = URL;
	public $field = FIELD;

	/**
	 * Constructor.
	 */
	public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
	{
		// Do Not Edit This Line
		parent::initController($request, $response, $logger);

		//--------------------------------------------------------------------
		// Preload any models, libraries, etc, here.
		//--------------------------------------------------------------------
		// E.g.:
		$this->session = \Config\Services::session();
		$this->pengguna_model = new \App\Models\Pengguna_model();
		$this->survei_model = new \App\Models\Survei_model();
		$this->statistik_model = new \App\Models\Statistik_model();
	}

	// Fungsi GET JSON
	public function getJSON($url, $arg = NULL)
	{
		$url = $url . $arg;
		$curl = curl_init($url);
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		$result = curl_exec($curl);
		curl_close($curl);
		return $result = json_decode($result, true);
	}

	// public function xlsRead($file)
	// {
	// 	require __DIR__ . '/../vendor/autoload.php';
	// 	$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
	// 	$spreadsheet = $reader->load($file);
	// 	return $spreadsheet;
	// }

	// public function excelToArray($filePath, $header = true)
	// {
	// 	require __DIR__ . '/../vendor/autoload.php';

	// 	//Create excel reader after determining the file type
	// 	$inputFileName = $filePath;
	// 	/**  Identify the type of $inputFileName  **/
	// 	$inputFileType = \PhpOffice\PhpSpreadsheet\IOFactory::identify($inputFileName);
	// 	/**  Create a new Reader of the type that has been identified  **/
	// 	$objReader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputFileType);
	// 	/** Set read type to read cell data onl **/
	// 	$objReader->setReadDataOnly(true);
	// 	/**  Load $inputFileName to a PHPExcel Object  **/
	// 	$objPHPExcel = $objReader->load($inputFileName);
	// 	//Get worksheet and built array with first row as header
	// 	$objWorksheet = $objPHPExcel->getActiveSheet();

	// 	//excel with first row header, use header as key
	// 	if ($header) {
	// 		$highestRow = $objWorksheet->getHighestRow();
	// 		$highestColumn = $objWorksheet->getHighestColumn();
	// 		$headingsArray = $objWorksheet->rangeToArray('A1:' . $highestColumn . '1', null, true, true, true);
	// 		$headingsArray = $headingsArray[1];

	// 		$r = -1;
	// 		$namedDataArray = array();
	// 		for ($row = 2; $row <= $highestRow; ++$row) {
	// 			$dataRow = $objWorksheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, null, true, true, true);
	// 			if ((isset($dataRow[$row]['A'])) && ($dataRow[$row]['A'] > '')) {
	// 				++$r;
	// 				foreach ($headingsArray as $columnKey => $columnHeading) {
	// 					$namedDataArray[$r][$columnHeading] = $dataRow[$row][$columnKey];
	// 				}
	// 			}
	// 		}
	// 	} else {
	// 		//excel sheet with no header
	// 		$namedDataArray = $objWorksheet->toArray(null, true, true, true);
	// 	}

	// 	return $namedDataArray;
	// }


}
