<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class SteadfastCourierService
{
    protected $baseUrl;
    protected $apiKey;
    protected $secretKey;

    public function __construct()
    {
        $this->baseUrl = config('services.steadfast.base_url');
        $this->apiKey = config('services.steadfast.api_key');
        $this->secretKey = config('services.steadfast.secret_key');
    }

    public function createOrder(array $data)
    {
        $response = Http::withHeaders([
            'Api-Key' => $this->apiKey,
            'Secret-Key' => $this->secretKey,
        ])->post("{$this->baseUrl}/create_order", $data);

        return $response->json();
    }

    public function createBulkOrder(array $orders)
    {
        $response = Http::withHeaders([
            'Api-Key' => $this->apiKey,
            'Secret-Key' => $this->secretKey,
        ])->post("{$this->baseUrl}/create_order/bulk-order", [
            'data' => $orders,
        ]);

        return $response->json();
    }
}
