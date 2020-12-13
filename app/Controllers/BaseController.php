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
use CodeIgniter\I18n\Time;
use App\Models\UrlModel;
use App\Models\UserModel;
use App\Models\SurveyModel;
use App\Models\QuestionModel;
use App\Models\AnswerModel;
use App\Models\UserAnswerModel;
use App\Models\AgentModel;

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
	protected $urlModel;
	protected $surveyModel;
	protected $questionModel;
	protected $answerModel;
	protected $userAnswerModel;
	protected $agentModel;

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
		// $this->session = \Config\Services::session();
		// Fungsi GET JSON
	
		session();
		$this->urlModel = new UrlModel();
		$this->userModel = new UserModel();
		$this->surveyModel = new SurveyModel();
		$this->questionModel = new QuestionModel();
		$this->answerModel = new AnswerModel();
		$this->userAnswerModel = new UserAnswerModel();
		$this->agentModel = new AgentModel();
		
		$agent = $this->request->getUserAgent();
		$ip = $this->request->getIPAddress();

		// Mengumpulkan data pengunjung web
		if (empty(session()->get('agent'))) {
			$this->agentModel->save([
				'agent' => $agent->getAgentString(),
				'platform' => $agent->getPlatform(),
				'browser' => $agent->isBrowser() ? $agent->getBrowser() : NULL,
				'version' => $agent->getVersion(),
				'robot' => $agent->isRobot() ? $agent->getRobot() : NULL,
				'mobile' => $agent->isMobile() ? $agent->getMobile() : NULL,
				'referrer' => $agent->getReferrer(),
				'ip' => $ip,
				'host' => gethostbyaddr($ip),
				'valid_ip' => $request->isValidIP($ip),
				'visited_at' => Time::now()
			]);
			
			session()->set(['agent' => $this->agentModel->getInsertID()]);
		}

	}

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

	
}
