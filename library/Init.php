<?php

/**
 * Class Init
 */
final class Init
{

    const RESULT_NORMAL  = 1;

    const RESULT_ILLEGAL = 2;

    const RESULT_FAILED  = 3;

    const RESULT_SUCCESS = 4;

    /**
     * @var array
     */
    protected static $resultChoices = [
        self::RESULT_NORMAL  => 'normal',
        self::RESULT_ILLEGAL => 'illegal',
        self::RESULT_FAILED  => 'failed',
        self::RESULT_SUCCESS => 'success',
    ];

    /**
     * @var PDO
     */
    protected $dbh;

    /**
     * Init constructor.
     *
     * @param PDO $dbh
     */
    public function __construct(PDO $dbh)
    {
        $this->dbh = $dbh;

        $this->create();
        $this->fill();
    }

    /**
     * @return void
     */
    private function create()
    {
        $sql = 'CREATE TABLE test (
           id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
           script_name VARCHAR(25) NOT NULL,
           start_time INT NOT NULL,
           end_time INT NOT NULL,
           result ENUM(\'normal\', \'illegal\', \'failed\', \'success\') NOT NULL 
        )';

        $this->dbh->exec($sql);
    }

    /**
     * @param int $countRows
     *
     * @return void
     */
    private function fill(int $countRows = 1000)
    {
        $sql = 'INSERT INTO `test` (`script_name`, `start_time`, `end_time`, `result`) 
                VALUES (:script_name, :start_time, :end_time, :result)';

        for ($i = 0; $i < $countRows; $i++) {
            $startTime = rand(0, 99999);

            $stmt = $this->dbh->prepare($sql);
            $stmt->bindValue(':script_name', uniqid('script_'));
            $stmt->bindValue(':start_time', $startTime);
            $stmt->bindValue(':end_time', $startTime + rand(0, 99999));
            $stmt->bindValue(':result', array_rand(self::$resultChoices));

            $stmt->execute();
        }
    }

    /**
     * @return array
     */
    public function get()
    {
        $sql = 'SELECT * FROM `test` WHERE `result` IN (1, 4)';

        return $this->dbh->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
}