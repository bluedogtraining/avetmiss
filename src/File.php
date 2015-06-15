<?php namespace Bdt\Avetmiss;

use Bdt\Avetmiss\Row;


class File
{

    protected $rows = [];
    protected $time;


    public function __construct()
    {
        $this->time = time();
    }


    /**
     *  Add a row to the file
     */
    public function addRow(Row $row)
    {
        if(!$row->isValid())
        {
            throw new \Exception('Cant add invalid row');
        }

        $this->rows[] = $row;
    }


    /**
     *  Exports the rows to a file
     */
    public function export($name)
    {
        $file = fopen($name, 'w');

        foreach($this->rows as $row)
        {
            fwrite($file, $row ."\r\n");
        }

        fclose($file);
    }


    public function getTime()
    {
        return time() - $this->time;
    }
}