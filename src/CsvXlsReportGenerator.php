<?php

namespace CsvXlsReportGenerator;

use CsvXlsReportGenerator\Helpers\ExportCsvHelper;
use CsvXlsReportGenerator\Helpers\ExportXlsHelper;

define('ROOT_PATH', dirname(__FILE__));

class CsvXlsReportGenerator
{
    public function generateFile(
        string $type,
        array $data,
        string $clientId
    ) {
        switch (strtolower($type)) {
            case 'csv':
                $exportCsv = new ExportCsvHelper();
                $fileName = $exportCsv->generateCsvFile($data, $clientId);
                return $fileName;
            case 'xls':
                $exportXls = new ExportXlsHelper();
                $fileName = $exportXls->generateXlsFile($data, $clientId);
                return $fileName;
            default:
                return null;
        }
    }
}
