<?php


class General_Config
{
    /**
     * Zwraca konfigurację połączenia do bazy danych
     *
     * @return array|string[]
     */
    public static function getDBConnect(): array
    {
        $dbconfig = file_get_contents("dbconfig.txt");
        var_dump($dbconfig);
        $dbconfig = explode(PHP_EOL, $dbconfig);
        return [
            'adress' => $dbconfig[0],
            'user' => $dbconfig[1],
            'password' => $dbconfig[2],
            'nameDataBase' => $dbconfig[3]
        ];
    }
}