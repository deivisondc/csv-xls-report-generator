<?php

namespace CsvXlsReportGenerator;

use \Mockery;
use PHPUnit\Framework\TestCase;
use CsvXlsReportGenerator\ExportXlsHelper;
use Exception;

class ExportXlsHelperTest extends TestCase
{
    public $data = [
        [
            'column1' => 'data1',
            'column2' => 'data2'
        ]
    ];
    
    /**
     * @covers \CsvXlsReportGenerator\ExportXlsHelper::generateXlsFile
     */
    public function testGenerateXlsFileInvalidPath()
    {
        $this->expectException(Exception::class);
        $this->expectExceptionCode(422);
        $this->expectExceptionMessage('Path is required!');
        $helper = new ExportXlsHelper();
        $file = $helper->generateXlsFile($this->data, 'clientId', '');
    }

    /**
     * @covers \CsvXlsReportGenerator\ExportXlsHelper::generateXlsFile
     */
    public function testGenerateXlsFileInvalidData()
    {
        $this->expectException(Exception::class);
        $this->expectExceptionCode(422);
        $this->expectExceptionMessage('Data should not be empty!');
        $helper = new ExportXlsHelper();
        $file = $helper->generateXlsFile([], 'clientId', '/tmp');
    }

    /**
     * @covers \CsvXlsReportGenerator\ExportXlsHelper::setFilename
     * @covers \CsvXlsReportGenerator\ExportXlsHelper::addHeader
     * @covers \CsvXlsReportGenerator\ExportXlsHelper::addRow
     * @covers \CsvXlsReportGenerator\ExportXlsHelper::sendFile
     * @covers \CsvXlsReportGenerator\ExportXlsHelper::buildXls
     * @covers \CsvXlsReportGenerator\ExportXlsHelper::build
     * @covers \CsvXlsReportGenerator\ExportXlsHelper::textFormat
     * @covers \CsvXlsReportGenerator\ExportXlsHelper::numFormat
     * @covers \CsvXlsReportGenerator\ExportXlsHelper::generateXlsFile
     * @covers \CsvXlsReportGenerator\ExportXlsHelper::numericOrText
     * @covers \CsvXlsReportGenerator\ExportXlsHelper::startWithZero
     */
    public function testGenerateXlsFile()
    {
        $helper = new ExportXlsHelper();
        $file = $helper->generateXlsfile($this->data, 'clientId', '/tmp/');
        unlink($file);

        $this->assertInternalType('string', $file);
    }

    public function tearDown()
    {
        Mockery::close();
    }
}
