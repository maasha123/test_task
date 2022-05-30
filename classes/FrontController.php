<?php
class FrontController
{
	private $url;
	private $httpMethod;

	private function getURL()
	{
		return $this->url;
	}
	private function getHTTPMethod()
	{
		return $this->httpMethod;
	}
	public function __construct()
	{
        $this ->url = isset($_SERVER['REDIRECT_URL']) ? $_SERVER['REDIRECT_URL'] :'/';
         $this ->httpMethod = isset($_SERVER['REQUEST_METHOD']) ? $_SERVER['REQUEST_METHOD'] :'GET';
	}
	public static function getInstance()
	{
		static $instance;
		if (!isset($instance)) $instance = new self;
		return $instance;
	}
	//можно через синглтон
	public function route()
	{
		if ($this->getURL() == '/' && $this->getHTTPMethod() =='GET')
		{ 
			$controller = 'ShowProducts';
			elseif ($this->getURL() == '/' && $this->getHTTPMethod() =='POST' && !count($_POST))
			{
				$controller = 'ShowProducts';
				elseif ($this->getURL() == '/addProduct' && $this->getHTTPMethod() =='GET')
				{ 
					$controller = 'ShowAddProductForm';
					elseif($this->getURL() == '/' && $this->getHTTPMethod() =='POST' && isset($_POST['price']))
					{
						$controller = 'AddProduct';
						elseif($this->getURL() == '/' && $this->getHTTPMethod() =='POST' && isset($_POST['md']))
					else{
						$controller = 'PageIsNotFound'
					}
				}
			}
		}
	}
(new "{controller}Controller")->act();

	}
}
?>