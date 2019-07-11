<?php

namespace CsvXlsReportGenerator;

use CsvXlsReportGenerator\CsvXlsReportGenerator;
use PHPUnit\Framework\TestCase;
use \Mockery;
use Exception;

class CsvXlsReportGeneratorTest extends TestCase
{
    public $data = [
        [
            'column1' => 'data1',
            'column2' => 'data2'
        ]
    ];

    /**
     * @covers \CsvXlsReportGenerator\CsvXlsReportGenerator::generateFile
     */
    public function testGenerateFileInvalidType()
    {
        $this->expectException(Exception::class);
        $this->expectExceptionCode(422);
        $this->expectExceptionMessage('Invalid type!');

        $csvXlsReportGenerator = new CsvXlsReportGenerator();
        $result = $csvXlsReportGenerator->generateFile('invalidType', $this->data, 'clientId', '/tmp');
        $this->assertNull($result);
    }

    /**
     * @covers \CsvXlsReportGenerator\CsvXlsReportGenerator::generateFile
     */
    public function testGenerateFileInvalidPath()
    {
        $this->expectException(Exception::class);
        $this->expectExceptionCode(422);
        $this->expectExceptionMessage('Path is required!');

        $csvXlsReportGenerator = new CsvXlsReportGenerator();
        $csvXlsReportGenerator->generateFile('csv', $this->data, 'clientId', '');
    }

    /**
     * @covers \CsvXlsReportGenerator\CsvXlsReportGenerator::generateFile
     */
    public function testGenerateFileInvalidData()
    {
        $this->expectException(Exception::class);
        $this->expectExceptionCode(422);
        $this->expectExceptionMessage('Data should not be empty!');

        $csvXlsReportGenerator = new CsvXlsReportGenerator();
        $csvXlsReportGenerator->generateFile('csv', [], 'clientId', '/tmp');
    }

    /**
     * @covers \CsvXlsReportGenerator\CsvXlsReportGenerator::generateFile
     */
    public function testGenerateFileTypeCsv()
    {
        $csvXlsReportGenerator = new CsvXlsReportGenerator();
        $result = $csvXlsReportGenerator->generateFile('csv', $this->data, 'clientId', '/tmp');
        $this->assertInternalType('string', $result);
    }

    /**
     * @covers \CsvXlsReportGenerator\CsvXlsReportGenerator::generateFile
     */
    public function testGenerateFileTypeXls()
    {
        $csvXlsReportGenerator = new CsvXlsReportGenerator();
        $result = $csvXlsReportGenerator->generateFile('xls', $this->data, 'clientId', '/tmp');
        $this->assertInternalType('string', $result);
    }

    public function tearDown()
    {
        Mockery::close();
    }
}