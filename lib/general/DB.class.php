<?php


class General_DB
{
    private $adesss;

    private $user;

    private $password;

    private $nameDataBase;

    private $connect;

    /**
     * W konstruktorze ładowane są dane do połączenia z bazą danych oraz ustawiane połaczenie
     *
     * General_DB constructor.
     */
    public function __construct()
    {
//        $config = General_Config::getDBConnect();
//        $this->adesss = $config['address'];
//        $this->user = $config['user'];
//        $this->password = $config['password'];
//        $this->nameDataBase = $config['nameDataBase'];
        $this->adesss = 'localhost';
        $this->user = 'root';
        $this->password = '';
        $this->nameDataBase = 'io';
        $this->connect = mysqli_connect(
            $this->adesss,
            $this->user,
            $this->password,
            $this->nameDataBase
        );
    }

    /**
     * Wykonuje ządanie do bazy danych, jest zabezpieczona przed sql injection
     * TODO JESZCZE NIE TESTOWALEM
     *
     * @param string $query
     * @param array $params
     * @return array|bool
     */
    public function query(string $query, array $params = [])
    {
        foreach ($params as $key => $param) {
            if (strpos($query, '[int:' . $key . ']')) {
                $query = str_replace('[int:' . $key . ']', $param, $query);
            }
            if (strpos($query, '[str:' . $key . ']')) {
                $query = str_replace('[str:' . $key . ']', '"' . $param . '"', $query);
            }
            if (strpos($query, '[a_int:' . $key . ']')) {
                $query = str_replace('[a_int:' . $key . ']', implode(', ', $param), $query);
            }
            if (strpos($query, '[a_str:' . $key . ']')) {
                $query = str_replace('[a_str:' . $key . ']', implode(', ', '"' . $param . '"'), $query);
            }
        }
        $results = [];
        try {
        $query = mysqli_real_escape_string($this->connect, $query);
           $res = mysqli_query($this->connect, $query);
            if (mysqli_num_rows($res) > 0) {
                while ($row = mysqli_fetch_assoc($res)) {
                    $results[] = $row;
                }
            }

            return $results;
        } catch (Exception $e) {
            return false;
        }
    }
}