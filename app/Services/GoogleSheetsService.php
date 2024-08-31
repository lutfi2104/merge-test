<?php

namespace App\Services;

use Google_Client;
use Google_Service_Sheets;

class GoogleSheetsService
{
    protected $client;
    protected $service;

    public function __construct()
    {
        $this->client = new Google_Client();
        $this->client->setApplicationName('Google Sheets API with Laravel');
        $this->client->setScopes([Google_Service_Sheets::SPREADSHEETS]);
        $this->client->setAuthConfig(storage_path('app/labbcn.json')); // Sesuaikan jalur ini
        $this->client->setAccessType('offline');

        $this->service = new Google_Service_Sheets($this->client);
    }

    public function readSheet($spreadsheetId, $range)
    {
        $response = $this->service->spreadsheets_values->get($spreadsheetId, $range);
        return $response->getValues();
    }

    public function writeSheet($spreadsheetId, $range, $values)
    {
        $body = new \Google_Service_Sheets_ValueRange([
            'values' => $values
        ]);
        $params = [
            'valueInputOption' => 'RAW'
        ];
        return $this->service->spreadsheets_values->update($spreadsheetId, $range, $body, $params);
    }
}
