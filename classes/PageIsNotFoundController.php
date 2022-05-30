<?php

class ShowPageIsNotFoundController extends Controller
{
	public function act()
	{
		$content = $this->getView()->render(
			'templates/404.php',
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