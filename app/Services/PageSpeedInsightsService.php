<?php

namespace App\Services;

class PageSpeedInsightsService
{
    public function getScore($url, $strategy)
    {
        $gpsi_key = config('nexus.gpsi_key');

        $curl = curl_init();

        $query = [
            'url' => $url,
            'strategy' => $strategy,
            'key' => $gpsi_key,
        ];

        $url = 'https://www.googleapis.com/pagespeedonline/v5/runPagespeed?category=PERFORMANCE&category=ACCESSIBILITY&category=SEO&category=BEST_PRACTICES&category=PWA&' . http_build_query($query);

        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
        ]);

        $response = curl_exec($curl);

        curl_close($curl);

        $data = json_decode($response, true);

        return $data;
    }
}
