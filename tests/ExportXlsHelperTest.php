<?php

namespace CsvXlsReportGenerator;

use \Mockery;
use PHPUnit\Framework\TestCase;
use CsvXlsReportGenerator\Helpers\ExportXlsHelper;

if (!defined('ROOT_PATH')) {
    define('ROOT_PATH', dirname(__FILE__));
}

class ExportXlsHelperTest extends TestCase
{
    /**
     * @covers \CsvXlsReportGenerator\Helpers\ExportXlsHelper::setFilename
     * @covers \CsvXlsReportGenerator\Helpers\ExportXlsHelper::addHeader
     * @covers \CsvXlsReportGenerator\Helpers\ExportXlsHelper::addRow
     * @covers \CsvXlsReportGenerator\Helpers\ExportXlsHelper::sendFile
     * @covers \CsvXlsReportGenerator\Helpers\ExportXlsHelper::buildXls
     * @covers \CsvXlsReportGenerator\Helpers\ExportXlsHelper::build
     * @covers \CsvXlsReportGenerator\Helpers\ExportXlsHelper::textFormat
     * @covers \CsvXlsReportGenerator\Helpers\ExportXlsHelper::numFormat
     * @covers \CsvXlsReportGenerator\Helpers\ExportXlsHelper::generateXlsFile
     * @covers \CsvXlsReportGenerator\Helpers\ExportXlsHelper::numericOrText
     * @covers \CsvXlsReportGenerator\Helpers\ExportXlsHelper::startWithZero
     */
    public function testGenerateXlsFile()
    {
        $data = [
            [
                'field1' => 'data',
                'field2' => 1,
                'field3' => 123,
            ]
        ];
        $clientId = '1';

        $helper = new ExportXlsHelper();
        $file = $helper->generateXlsfile($data, $clientId, '/tmp/');
        unlink($file);

        $this->assertInternalType('string', $file);
    }

    public function tearDown()
    {
        Mockery::close();
    }
}
