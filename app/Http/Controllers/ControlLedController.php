<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControlLedController extends Controller
{
    /**
     * Load the control-led index view.
     *
     * @return \Illuminate\View\View
     */
    private $nodeMcuEndpoint = 'http://192.168.100.32'; // Ganti dengan IP NodeMCU

    public function index()
    {
        return view('control_led.index');
    }

    /**
     * Get LED state.
     */
    // public function getLedState($room)
    // {
    //     try {
    //         $endpoint = 'http://192.168.100.32';
    //         $response = file_get_contents("{$endpoint}/{$room}");
    //         return response()->json(['status' => $response], 200);
    //     } catch (\Exception $e) {
    //         return response()->json(['error' => 'Failed to fetch LED state'], 500);
    //     }
    // }

    // /**
    //  * Set LED state.
    //  */
    // public function setLedState($room)
    // {
    //     try {
    //         $endpoint = 'http://192.168.100.32';
    //         $ch = curl_init();
    //         curl_setopt($ch, CURLOPT_URL, "{$endpoint}/{$room}");
    //         curl_setopt($ch, CURLOPT_POST, true);
    //         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //         $response = curl_exec($ch);
    //         curl_close($ch);

    //         return response()->json(['status' => $response], 200);
    //     } catch (\Exception $e) {
    //         return response()->json(['error' => 'Failed to set LED state'], 500);
    //     }
    // }

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

            // Pastikan respon JSON sesuai
            return response()->json(['success' => true, 'status' => $response, 'message' => 'Lampu menyala'], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Gagal menyalakan lampu'], 500);
        }
    }

}
