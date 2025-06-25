<?php

namespace App\Services;

use App\Models\SmsSetting;
use Illuminate\Support\Facades\Log;

class SmsService
{
    public function getActiveSetting()
    {
        return SmsSetting::where('is_active', true)->first();
    }

    public function sendOrderConfirmationSMS($mobile, $order)
    {
        $setting = SmsSetting::where('is_active', true)->first();

        if (!$setting) {
            Log::error('No active SMS setting found.');
            return false;
        }

        $message = str_replace(['{ORDER_ID}', '{CUSTOMER_NAME}'], [$order->order_id, $order->first_name], $setting->default_message);

        $data = [
            'api_key' => $setting->api_key,
            'api_secret' => $setting->api_secret,
            'request_type' => $setting->request_type,
            'message_type' => $setting->message_type,
            'mobile' => $mobile,
            'message_body' => $message,
        ];

        if (!empty($setting->sender_id)) {
            $data['sender_id'] = $setting->sender_id;
        }

        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_URL => $setting->api_url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $data,
        ]);

        $response = curl_exec($curl);
        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);

        $decoded = json_decode($response, true);

        if ($httpCode == 200 && is_array($decoded) && ($decoded['api_response_code'] ?? null) == 200) {
            Log::info('SMS sent successfully: ' . json_encode($decoded));
            return true;
        } else {
            Log::error('SMS sending failed: ' . json_encode($decoded));
            return false;
        }
    }
}
