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

class GoogleVisionLabelImage implements ShouldQueue
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
        $response = $imageAnnotator->labelDetection($image);
        
        $labels = $response->getLabelAnnotations();

        if ($labels) {

            $result = [];
            foreach ($labels as $label) {
             
                $result[] = $label->getDescription();
            }

            //echo json_encode($result);
            $i->labels = $result;
            $i->save();
        }

        
        $imageAnnotator->close();
        

    }
}
