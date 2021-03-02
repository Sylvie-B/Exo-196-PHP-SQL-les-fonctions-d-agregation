<?php
class DB2 {

    private string $server;
    private string $db;
    private string $user;
    private string $pwd;
    private ?PDO $dbLink;

    /**
     * DB constructor.
     * @param $serv
     * @param $db
     * @param $user
     * @param $pwd
     */
    public function __construct($serv, $db, $user, $pwd) {
        $this->server = $serv;
        $this->db = $db;
        $this->user = $user;
        $this->pwd = $pwd;
        $this->dbLink = $this->connect();
    }

    /**
     * @return PDO|null
     */
    private function connect(): ?PDO {
        try {
            $bdd = new PDO("mysql:host=$this->server;dbname=$this->db;charset=utf8", $this->user,$this->pwd);
            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        }
        catch (PDOException $exception){
            return null;
        }
        return $bdd;
    }

    /**
     * retourne l'objet PDO
     */
    /**
     * @return PDO|null
     */
    public function getDbLink(): ?PDO {
        if(is_null($this->dbLink)) {
            $this->dbLink = $this->connect();
        }
        return $this->dbLink;
    }
}
