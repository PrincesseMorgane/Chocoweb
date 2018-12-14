<?php 


class Slide 
{
	public $id;
	public $src;
	public $alt;
	public $pre;
	public $title;
	public $href;
	public $button;
	
	function __construct($id = null, $locale = null)
	{
		// Récupérer le slide $id avec sa traduction $locale en base de données
		$result = $this->querySlide($id, $locale);
		$this ->id = $result['id'];
		$this ->src = $result['img_src'];
		$this ->alt = $result['img_alt'];
		$this ->pre = $result['pre'];
		$this ->title = $result['title'];
		$this ->href = $result['btn_href'];
		$this ->button = $result['btn_label'];
	}

	public function querySlide($id, $locale)
	{
		//configurer PDO
		$host = '127.0.0.1';
		$db   = 'choco';
		$user = 'root';
		$pass = '';
		$charset = 'utf8mb4';

		$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
		$options = [
		    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
		    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
		    PDO::ATTR_EMULATE_PREPARES   => false,
		];
		try {
		     $pdo = new PDO($dsn, $user, $pass, $options);
		} catch (\PDOException $e) {
		     throw new \PDOException($e->getMessage(), (int)$e->getCode());
		}


		//Préparer la requete
	
		$query = $pdo->prepare('SELECT s.id, s.img_src, st.img_alt, st.pre, st.title, st.btn_href, st.btn_label FROM slides s JOIN slide_translations st ON st.slides_id = s.id AND st.locale = ? WHERE s.id = ?;'); 
		$query->execute([$locale, $id]);
		//retourner le resultat
		return $query->fetch();
	}
}