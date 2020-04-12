<?php

namespace App\Http\Controllers;
use Aws\Comprehend\ComprehendClient;
use Illuminate\Http\Request;

class AnalyzeController extends Controller
{
    private $text;

    public function __construct()
    {

    }

    public function analyze(Request $request)
    {
        $this->text = $request->post('text');

        $comprehend = new ComprehendClient([
            'region' => env('AWS_DEFAULT_REGION'),
            'version' => '2017-11-27',
            'credentials' => [
                'key' => env('AWS_ACCESS_KEY_ID'),
                'secret' => env('AWS_SECRET_ACCESS_KEY'),
            ],
        ]);

        $dominantLanguage = $comprehend->detectDominantLanguage([
            'Text' => $this->text,
        ]);

        $sentiment = $comprehend->detectSentiment([
            'LanguageCode' => $dominantLanguage['Languages'][0]['LanguageCode'],
            'Text' => $this->text,
        ]);

        return response()->json([
            'lang' => $dominantLanguage['Languages'][0],
            'sentiment' => $sentiment['SentimentScore'],
        ]);

    }
}
