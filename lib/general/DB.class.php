<?php


class General_DB
{
    /**
     * @var string
     */
    private $adesss;

    /**
     * @var string
     */
    private $user;

    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     */
    private $nameDataBase;

    /**
     * @var false|mysqli
     */
    private $connect;

    /**
     * W konstruktorze ładowane są dane do połączenia z bazą danych oraz ustawiane połaczenie
     *
     * General_DB constructor.
     */
    public function __construct()
    {
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
           $res = mysqli_query($this->connect, $query);
           if (gettype($res) != 'boolean') {
               if (mysqli_num_rows($res) > 0) {
                   while ($row = mysqli_fetch_assoc($res)) {
                       $results[] = $row;
                   }
               }
           } else {
               return $res;
           }

            return $results;
        } catch (Exception $e) {
            return false;
        }
    }
}