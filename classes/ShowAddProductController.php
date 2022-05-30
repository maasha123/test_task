<?php

class ShowAddProductFormController extends Controller
{
	public function act()
	{
		$content = $this->getView()->render(
			'templates/addProduct.php',
			[
				'products' => $products;
			]
		);
		echo $this->getView()->render(
			'templates/main.php',
			[
				'title' => 'Add Product',
				'content' => $content,
			]
		);
	}
}
?>
