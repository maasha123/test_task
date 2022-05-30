<?php

class DeleteProductsController extends Controller
{
	public function act()
	{
		$this->getModel()->deleteProducts($_POST['md']);
		(new ShowProductsController)->act();
	}
}
?>