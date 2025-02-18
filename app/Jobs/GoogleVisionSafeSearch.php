<?php

namespace App\Jobs;

use App\Models\Image;

use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Google\Cloud\Vision\V1\ImageAnnotatorClient;

class GoogleVisionSafeSearch implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    private $article_image_id;

    public function __construct($article_image_id)
    {
        $this->article_image_id = $article_image_id;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // Use Google Vision API to detect safe search
        // and update the article's is_safe_search column
        //...
        $i = Image::find($this->article_image_id);
        if (!$i) {
            return;
        }

        $image = file_get_contents(storage_path('app/public/' . $i->path));
        putenv('GOOGLE_APPLICATION_CREDENTIALS=' . base_path('google_credential.json'));

        $imageAnnotator = new ImageAnnotatorClient();
        $response = $imageAnnotator->safeSearchDetection($image);
        $imageAnnotator->close();

        $safe = $response->getSafeSearchAnnotation();


        $adult = $safe->getAdult();
        $medical = $safe->getMedical();
        $spoof = $safe->getSpoof();
        $violence = $safe->getViolence();
        $racy = $safe->getRacy();

        $likelihoodName = [
            'text-success fs-3 bi bi-circle-fill',
            'text-success fs-3 bi bi-check-circle-fill',
            'text-success fs-3 bi bi-check-circle-fill',
            'text-danger fs-3 bi bi-exclamation-circle-fill',
            'text-danger fs-3 bi bi-exclamation-circle-fill',
            'text-warning fs-3 bi bi-dash-circle-fill',
        ];

        $i->adult = $likelihoodName[$adult];
        $i->spoof = $likelihoodName[$spoof];
        $i->racy = $likelihoodName[$racy];
        $i->medical = $likelihoodName[$medical];
        $i->violence = $likelihoodName[$violence];

        $i->save();
    }
}
