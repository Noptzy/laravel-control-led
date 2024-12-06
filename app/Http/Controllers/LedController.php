<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LedController extends Controller
{
    private $nodeMcuEndpoint = 'http://192.168.100.32'; // Ganti dengan IP NodeMCU

    public function getLedState($room)
    {
        try {
            // Kirim permintaan GET ke NodeMCU
            $response = file_get_contents("{$this->nodeMcuEndpoint}/{$room}");
            return response()->json(['status' => $response], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to fetch LED state'], 500);
        }
    }

    public function setLedState($room)
    {
        try {
            // Kirim permintaan POST ke NodeMCU
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "{$this->nodeMcuEndpoint}/{$room}");
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
            curl_close($ch);

            return response()->json(['status' => $response], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to set LED state'], 500);
        }
    }
}
