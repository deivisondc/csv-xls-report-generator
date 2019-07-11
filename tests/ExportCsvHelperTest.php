<?php

namespace CsvXlsReportGenerator;

use \Mockery;
use PHPUnit\Framework\TestCase;
use CsvXlsReportGenerator\Helpers\ExportCsvHelper;

if (!defined('ROOT_PATH')) {
    define('ROOT_PATH', dirname(__FILE__));
}

class ExportCsvHelperTest extends TestCase
{
    /**
     * @covers \CsvXlsReportGenerator\Helpers\ExportCsvHelper::generateCsvFile
     */
    public function testGenerateCsvFile()
    {
        $data = [
            [
                'field' => 'data',
            ]
        ];
        $clientId = '1';

        $helper = new ExportCsvHelper();
        $file = $helper->generateCsvFile($data, $clientId, '/tmp/');
        unlink($file);

        $this->assertInternalType('string', $file);
    }

    public function tearDown()
    {
        Mockery::close();
    }
}
