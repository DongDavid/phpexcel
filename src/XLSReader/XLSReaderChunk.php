<?php


namespace Dongdavid\Excel\XLSReader;


use PhpOffice\PhpSpreadsheet\Reader\IReadFilter;

class XLSReaderChunk implements IReadFilter
{

    private $startRow = 0;
    private $endRow   = 0;

    /**  Set the list of rows that we want to read  */
    public function setRows($startRow, $chunkSize) {
        $this->startRow = $startRow;
        $this->endRow   = $startRow + $chunkSize;
    }

    public function readCell($column, $row, $worksheetName = '') {
        //  Only read the heading row, and the configured rows
        if (($row >= $this->startRow && $row < $this->endRow)) {
            return true;
        }
        return false;
    }
}