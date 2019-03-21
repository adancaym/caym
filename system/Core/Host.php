<?php
/**
 * Created by PhpStorm.
 * User: caym
 * Date: 19/03/19
 * Time: 10:16 PM
 */

namespace CodeIgniter\Core;

use App\Models\HostsModel;

class Host
{
	private $http_host;

	public function __construct($host)
	{
		$hostModel       = new HostsModel();
		$this->http_host = $hostModel->getHostByHost($host['HTTP_HOST']);
	}

	public function getCuenta()
	{
		return $this->getHost()->getCuenta();
	}

	public function getHost()
	{
		return $this->http_host;
	}

	public function getNameSpace()
	{
		return $this->getHost()->namespace;
	}

	public function getController()
	{
		return $this->getHost()->controller;
	}
	public function getMethod()
	{
		return $this->getHost()->metodo;
	}

	public function getRutas()
	{
		return $this->getCuenta()->getArrayRuta();
	}

	public function getTemplate()
	{
		$this->getHost()->getTemplate();
	}

}
