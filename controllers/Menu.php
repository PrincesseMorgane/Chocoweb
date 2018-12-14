<?php 

class menu
{
	public $menus;

	function __construct()
	{
		$this->menus = $this->getMenus();
	}

	public function getMenus()
	{

		require('models/menu.php');
		$menu1 = new menuChocolat(1, 'fr');
		$menu2 = new menuChocolat(2, 'fr');
		$menu3 = new menuChocolat(3, 'fr');
		$menu4 = new menuChocolat(4, 'fr');
		$menu5 = new menuChocolat(5, 'fr');
		$menu6 = new menuChocolat(6, 'fr');

		return[$menu1,$menu2,$menu3,$menu4,$menu5,$menu6];
	}
}