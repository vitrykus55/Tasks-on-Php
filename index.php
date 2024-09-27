<?php

interface DataAdapterInterface
{
    public function getData();
}

class MySQL implements DataAdapterInterface
{
    public function getData()
    {
        return 'some data from db';
    }
}

class Controller
{
    private $db;

    public function __construct(DataAdapterInterface $db)
    {
        $this->db = $db;
    }

    public function getData()
    {
        return $this->db->getData();
    }
}

$mysql = new MySQL();
$controller = new Controller($mysql);
echo $controller->getData();

