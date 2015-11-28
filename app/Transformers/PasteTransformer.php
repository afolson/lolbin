<?php namespace App\Transformers;

use App\Paste;
use League\Fractal\TransformerAbstract;

class PasteTransformer extends TransformerAbstract
{

    /**
     * @param Paste $paste
     * @return array
     */
    public function transform(Paste $paste)
    {
        return [
            'id'           => $paste->id,
            'title'        => $paste->title,
            'body'         => $paste->body,
            'language'     => $paste->language,
        ];
    }

}