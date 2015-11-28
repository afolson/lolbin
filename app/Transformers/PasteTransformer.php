<?php namespace App\Transformers;

use App\Paste;
use League\Fractal\TransformerAbstract;

class PasteTransformer extends TransformerAbstract
{

    /**
     * Turn this item object into a generic array
     *
     * @return array
     */
    public function transform(Paste $paste)
    {
        return [
            'id'           => (int) $paste->id,
            'body'         => $paste->body,
        ];
    }

}