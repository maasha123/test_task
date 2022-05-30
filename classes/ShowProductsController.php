<?php

class ShowProductsController extends Controller
{
	public function act()
	{
		$products = $this->getModel()->getProducts();
		$content = $this->getView()->render(
			'templates/main.php',
			[
				'products' => $products;
			]
		);

		echo $this->getView()->render(
			'templates/main.php',
			[
				'title' => 'Products List',
				'content' => $content,
			]
		);
	}
}
?>