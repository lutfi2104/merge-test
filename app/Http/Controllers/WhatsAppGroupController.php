<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class WhatsAppGroupController extends Controller
{
    public function fetchGroup()
    {
        $client = new Client();

        try {
            // Mengirimkan request ke API untuk mendapatkan ID group WhatsApp
            $response = $client->request('POST', 'https://api.fonnte.com/fetch-group', [
                'headers' => [
                    'Authorization' => 'cdtDVf2oj4Y@ENPH!VaS' // Ganti dengan token API Fonnte yang valid
                ],
            ]);

            // Mendapatkan response dari API
            $body = $response->getBody();
            $data = json_decode($body, true);

            // Menampilkan data
            return response()->json($data);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Something went wrong: ' . $e->getMessage()], 500);
        }
    }

    public function getWhatsAppGroup()
    {
        $client = new Client();

        try {
            // Mengirimkan request ke API untuk mendapatkan ID group WhatsApp
            $response = $client->request('POST', 'https://api.fonnte.com/get-whatsapp-group', [
                'headers' => [
                    'Authorization' => 'cdtDVf2oj4Y@ENPH!VaS' // Ganti dengan token API Fonnte yang valid
                ],
            ]);

            // Mendapatkan response dari API
            $body = $response->getBody();
            $data = json_decode($body, true);

            // Menampilkan data
            return response()->json($data);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Something went wrong: ' . $e->getMessage()], 500);
        }
    }
}
