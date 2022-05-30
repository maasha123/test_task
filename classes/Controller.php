<?php
abstract class Controller
{
	private $view;
	private $model;

	protected function getView()
	{
		return $this->view;
	}
	protected function getModel()
	{
		return $this->model;
	}
	public function __construct()
	{
		$this->view = Template::getInstance();
		$this->model = ProductsModel::getInstance();
	}
	abstract public function act();
}
?>