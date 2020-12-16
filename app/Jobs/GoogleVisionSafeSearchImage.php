<?php

namespace App\Jobs;

use App\Models\PostImage;
use Faker\Provider\Image;
use Google\Cloud\Vision\V1\ImageAnnotatorClient;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class GoogleVisionSafeSearchImage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $post_image_id;

    public function __construct($post_image_id)
    {
        $this->post_image_id = $post_image_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $i = PostImage::find($this->post_image_id);
        if (!$i){
            return;
        }
        $image = file_get_contents(storage_path('/app/'. $i->file));
        putenv('GOOGLE_APPLICATION_CREDENTIALS='. base_path('google-presto-verification.json'));
        $imageAnnotator = new ImageAnnotatorClient();
        $response = $imageAnnotator->safeSearchDetection($image);
        $imageAnnotator->close();
        $safe = $response->getSafeSearchAnnotation();

        $adult = $safe->getAdult();
        $medical = $safe->getMedical();
        $spoof = $safe->getSpoof();
        $violence = $safe->getViolence();
        $racy = $safe->getRacy();

        //echo json_encode([$adult , $medical , $spoof , $violence , $racy]);
        /* $likelihoodName = [
            'UNKNOWN' , 'VERY_UNLIKELY' , 'UNLIKELY' , 'POSSIBLE' , 'LIKELY' , 'VERY_LIKELY'
        ]; */

        $likelihoodName = [
            'UNKNOWN' , '10' , '25' , '50' , '75' , '100'
        ];

        $i->adult = $likelihoodName[$adult];
        $i->medical = $likelihoodName[$medical];
        $i->spoof = $likelihoodName[$spoof];
        $i->violence = $likelihoodName[$violence];
        $i->racy = $likelihoodName[$racy];

        $i->save();

    }
}
