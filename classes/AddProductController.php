<?php

class AddProductController extends Controller
{
	public function act()
	{
		$this->getModel()->addProduct(new $_POST['type']($_POST));
		(new ShowProductsController)->act();
	}
}
?>