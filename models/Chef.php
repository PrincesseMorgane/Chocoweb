<?php

class Chef
{
    public $id;
    public $src;
    public $description;
    public $name;
    public $job;
    public $network;

    function __construct($id = null, $locale = null)
    {
        $result = $this->queryChef($id, $locale);

        $this->id = $result['id'];
        $this->src = $result['img'];
        $this->name = $result['name'];
        $this->job = $result['job'];
        $this->description = $result['description'];
        $this->network = $this->queryNetwork($id);
        // $this->locale = $result['locale'];
    }

    public function queryChef($id, $locale)
    {
        // Configurer PDO
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

   $query =$pdo->prepare('SELECT c.id, c.img, c.name, ct.job, ct.description FROM chefs c JOIN chefs_translations ct ON c.id = ct.chef_id AND ct.locale = ? JOIN chefs_socials cs ON c.id = cs.chef_id WHERE c.id = ?');
   $query->execute([$locale, $id]);
   return $query->fetch();

}
   public function queryNetwork($id){
   	   // Configurer PDO
        $host = '127.0.0.1';
        $db   = 'choco';
        $user = 'root';
        $pass = '';
        $charset = 'utf8mb4';

        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        try {
             $pdo = new PDO($dsn, $user, $pass, $options);
        } catch (\PDOException $e) {
             throw new \PDOException($e->getMessage(), (int)$e->getCode());
   }

   $query =$pdo->prepare('SELECT cs.network, cs.url FROM chefs_socials cs WHERE cs.chef_id = ?');
   $query->execute([$id]);
   return $query->fetchAll();
   }
 }
