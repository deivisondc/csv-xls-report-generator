<?php

namespace CsvXlsReportGenerator\Helpers;

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
        string $clientId
    ) {
        $baseUrl = ROOT_PATH.'/report/';
        $fileName = '/tmp/' . date('dmYHis'). '-' . $clientId . '.csv';
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
