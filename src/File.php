<?php

namespace Bdt\Avetmiss;

/**
 * A File represents a collection of Rows.
 */
class File
{
    /**
     * @var Fieldset
     */
    protected $fieldset;
    /**
     * @var array
     */
    protected $rows = [];
    /**
     * @var integer
     */
    protected $time;

    /**
     * Create a new File with a Fieldset definition
     * 
     * @param Fieldset $fieldset
     */
    public function __construct(Fieldset $fieldset)
    {
        $this->fieldset = $fieldset;
        $this->time = time();
    }

    /**
     * Create a Row with the same Fieldset definition as the File.
     *
     * @return Row
     */
    public function createRow()
    {
        return new Row($this->fieldset);
    }

    /**
     * Add a Row to the File. The Fieldset of the Row must match the 
     *
     * @param Row $row
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
     *
     * @param string $name
     */
    public function export($name)
    {
        $file = fopen($name, 'w');

        foreach ($this->rows as $row) {
            fwrite($file, $row ."\r\n");
        }

        fclose($file);
    }


    /**
     * Calculate the time between initialisation of the file and now.
     *
     * @return integer
     */
    public function getTime()
    {
        return time() - $this->time;
    }
}
