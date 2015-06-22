<?php

namespace Bdt\Avetmiss;

class File
{
    protected $fieldset;
    protected $rows = [];
    protected $time;

    public function __construct(Fieldset $fieldset)
    {
        $this->fieldset = $fieldset;
        $this->time = time();
    }

    public function createRow()
    {
        return new Row($this->fieldset);
    }

    /**
     *  Add a row to the file
     */
    public function addRow(Row $row)
    {
        if (!$row->isValid()) {
            throw new \Exception('Cant add invalid row');
        }

        if ($row->getFieldset() != $this->fieldset) {
            throw new \Exception('Cant add row with different fieldset');
        }

        $this->rows[] = $row;
    }


    /**
     *  Exports the rows to a file
     */
    public function export($name)
    {
        $file = fopen($name, 'w');

        foreach ($this->rows as $row) {
            fwrite($file, $row ."\r\n");
        }

        fclose($file);
    }


    public function getTime()
    {
        return time() - $this->time;
    }
}
