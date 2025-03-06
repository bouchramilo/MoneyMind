<?php
namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class GeminiService
{
    protected $client;
    protected $apiKey;

    public function __construct()
    {
        $this->client = new Client();
        $this->apiKey = env('GEMINI_API_KEY');
    }

    public function getSuggestions($depenses, $depensesRecurrentes, $budget)
    {

        // dd($depenses, $depensesRecurrentes);
        $prompt = "J'ai un budget mensuel de {$budget} MAD.
                    Voici mes dépenses ponctuelles : " . json_encode($depenses) . ".
                    Et voici mes dépenses récurrentes : " . json_encode($depensesRecurrentes) . ".
                    donner moi 3 conseils concrets pour réduire mes dépenses inutiles
                    et optimiser ma gestion financière (dans 4 phrases au maximum, et je veux les consiels sous comme :  'Wow, 600 DH en Divertissement? Essaye des alternatives gratuites pour économiser. les conseils doivent être basées sur les dépenses et les dépenses réccurentes' ?";

        try {
            $response = $this->client->post("https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent?key=AIzaSyDWBJ27icmJgEyzSiK6ds1JYibJBPko4sM", [
                'json'    => [
                    'contents' => [
                        ['parts' => [['text' => $prompt]]],
                    ],
                ],
                // 'query' => ['key' => $this->apiKey],
                'headers' => ['Content-Type' => 'application/json'],
            ]);

            $data = json_decode($response->getBody(), true);

            return $data['candidates'][0]['content']['parts'][0]['text'] ?? 'Pas de suggestion disponible.';
        } catch (\Exception $e) {
            Log::error('Erreur Gemini API : ' . $e->getMessage());
            return 'Une erreur est survenue lors de la génération des suggestions.';
        }
    }
}
