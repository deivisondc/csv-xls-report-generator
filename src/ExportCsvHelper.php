<?php

namespace CsvXlsReportGenerator;

use Exception;

class ExportCsvHelper
{
    /**
     * Generate CSV File
     * @param array $data array with the report data
     * @param string $clientId id of the client
     * @return string
     */
    public function generateCsvFile(
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

        $fileName = $path . date('dmYHis'). '-' . $clientId . '.csv';
        $file = fopen($fileName, 'w');
        foreach ($data[0] as $key => $value) {
            $header[] = $key;
        }
        fputcsv($file, $header);
        foreach ($data as $value) {
            fputcsv($file, $value);
        }
        fclose($file);
        return $fileName;
    }
}
