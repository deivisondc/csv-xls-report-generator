<?php

namespace CsvXlsReportGenerator;

use CsvXlsReportGenerator\Helpers\ExportCsvHelper;
use CsvXlsReportGenerator\Helpers\ExportXlsHelper;
use Exception;

class CsvXlsReportGenerator
{
    public function generateFile(
        string $type,
        array $data,
        string $clientId,
        string $path
    ) {
        if (!$path) {
            throw new Exception('Path is required!', 422);
        }

        if (!$data) {
            throw new Exception('Data should not be empty!', 422);
        }

        if (substr($path, -1) != '/') {
            $path .= '/';
        }

        switch (strtolower($type)) {
            case 'csv':
                $exportCsv = new ExportCsvHelper();
                $fileName = $exportCsv->generateCsvFile($data, $clientId, $path);
                return $fileName;
            case 'xls':
                $exportXls = new ExportXlsHelper();
                $fileName = $exportXls->generateXlsFile($data, $clientId, $path);
                return $fileName;
            default:
                throw new Exception('Invalid type!', 422);
        }
    }
}
