<?php
/**
 * Pastes controller
 */
namespace App\Http\Controllers;

use App\Transformers\PasteTransformer;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use Illuminate\Http\Request;
use League\Fractal\Resource\Item;
use App\Paste;

class PasteController extends ApiController {

    protected $paste;

    function __construct(Paste $paste)
    {
        $this->paste = $paste;
    }

     public function index(Manager $fractal, PasteTransformer $pasteTransformer)
     {
         $pastes = $this->paste->take(10)->get();
         $collection = new Collection($pastes, $pasteTransformer);
         $data = $fractal->createData($collection)->toArray();
         return $this->respondWithCORS($data);
     }

    public function create(Request $request)
    {
        $this->paste->title = $request->get('title');
        $this->paste->body = $request->get('body');
        $this->paste->language = $request->get('language');
        $this->paste->save();
        return $this->respondCreated('Paste was created');
    }

    /**
     * @param Manager $fractal
     * @param PasteTransformer $pasteTransformer
     * @param $pasteId
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Manager $fractal, PasteTransformer $pasteTransformer, $pasteId)
    {
        $paste = $this->paste->find($pasteId);

        if (!$paste) {
            return $this->respondNotFound('Not found.');
        }
        else {
            $item = new Item($paste, $pasteTransformer);
            $data = $fractal->createData($item)->toArray();
            return $this->respond($data);
        }
    }

    /**
     * @param $pasteId
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($pasteId)
    {
        $paste = $this->paste->findOrFail($pasteId);
        $paste->delete();
        return $this->respondOk('Paste was deleted');
    }

}
