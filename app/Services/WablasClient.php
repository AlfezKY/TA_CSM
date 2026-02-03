<?php

namespace App\Services;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use RuntimeException;

class WablasClient
{
    public function __construct(
        private ?string $baseUrl = null,
        private ?string $token = null,
        private ?string $deviceId = null,
        private int $timeoutSeconds = 15,
    ) {
        $this->baseUrl = $this->baseUrl ?? (string) config('services.wablas.base_url');
        $this->token = $this->token ?? config('services.wablas.token');
        $this->deviceId = $this->deviceId ?? config('services.wablas.device_id');
        $this->timeoutSeconds = $this->timeoutSeconds ?: (int) config('services.wablas.timeout_seconds', 15);
    }

    public function sendMessage(string $phone, string $message): array
    {
        if (!$this->token) {
            throw new RuntimeException('WABLAS_TOKEN belum diset.');
        }

        $to = self::normalizePhoneId($phone);

        $payload = [
            'phone' => $to,
            'message' => $message,
        ];

        // Beberapa setup Wablas butuh device_id.
        if (!empty($this->deviceId)) {
            $payload['device_id'] = $this->deviceId;
        }

        // Endpoint paling umum di Wablas: /api/send-message
        // Jika provider Anda beda, kita tinggal sesuaikan base_url atau path.
        $response = $this->request()
            ->post(rtrim($this->baseUrl, '/') . '/api/send-message', $payload);

        if (!$response->successful()) {
            throw new RuntimeException('Gagal kirim WhatsApp via Wablas: HTTP ' . $response->status() . ' ' . $response->body());
        }

        return $response->json() ?? ['ok' => true];
    }

    private function request(): PendingRequest
    {
        return Http::timeout($this->timeoutSeconds)
            ->acceptJson()
            ->asJson()
            ->withHeaders([
                // Wablas umumnya memakai Authorization: <token>
                'Authorization' => $this->token,
            ]);
    }

    public static function normalizePhoneId(string $raw): string
    {
        $v = trim($raw);
        $v = str_replace([' ', '-', '(', ')'], '', $v);

        // buang leading +
        $v = ltrim($v, '+');

        // jika 08xxx -> 628xxx
        if (Str::startsWith($v, '08')) {
            $v = '62' . substr($v, 1);
        }

        // jika 8xxx (tanpa 0) -> 628xxx
        if (Str::startsWith($v, '8')) {
            $v = '62' . $v;
        }

        return $v;
    }
}

