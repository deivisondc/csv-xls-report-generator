<?php

namespace CsvXlsReportGenerator;

use \Mockery;
use PHPUnit\Framework\TestCase;
use Exception;

class ExportCsvHelperTest extends TestCase
{
    public $data = [
        [
            'column1' => 'data1',
            'column2' => 'data2'
        ]
    ];
    
    /**
     * @covers \CsvXlsReportGenerator\ExportCsvHelper::generateCsvFile
     */
    public function testGenerateCsvFileInvalidPath()
    {
        $this->expectException(Exception::class);
        $this->expectExceptionCode(422);
        $this->expectExceptionMessage('Path is required!');
        $helper = new ExportCsvHelper();
        $file = $helper->generateCsvFile($this->data, 'clientId', '');
    }
    
    /**
     * @covers \CsvXlsReportGenerator\ExportCsvHelper::generateCsvFile
     */
    public function testGenerateCsvFileInvalidData()
    {
        $this->expectException(Exception::class);
        $this->expectExceptionCode(422);
        $this->expectExceptionMessage('Data should not be empty!');
        $helper = new ExportCsvHelper();
        $file = $helper->generateCsvFile([], 'clientId', '/tmp');
    }

    /**
     * @covers \CsvXlsReportGenerator\ExportCsvHelper::generateCsvFile
     */
    public function testGenerateCsvFile()
    {
        $helper = new ExportCsvHelper();
        $file = $helper->generateCsvFile($this->data, 'clientId', '/tmp/');
        unlink($file);

        $this->assertInternalType('string', $file);
    }

    public function tearDown()
    {
        Mockery::close();
    }
}
