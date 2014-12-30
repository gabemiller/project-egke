<?php

namespace Site;

use Divide\CMS\Gallery;
use View;
use Request;
use Image;
use URL;
use Response;

class GalleryController extends \BaseController
{

    protected $layout = '_frontend.master';

    /**
     * Display a listing of the resource.
     * GET /site\gallery
     *
     * @return Response
     */
    public function index()
    {

        View::share('title', 'Galériák');

        $gallery = Gallery::orderBy('updated_at', 'desc')->select(['id', 'name', 'description', 'updated_at'])->paginate(10);

        $this->layout->content = View::make('site.gallery.index')->with('galleries', $gallery);
    }

    /**
     * Display the specified resource.
     * GET /site\gallery/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {

        View::share('title', 'Galériák');

        $this->layout->content = View::make('site.gallery.show')->with('gallery', Gallery::find($id))->with('url', Request::url());
    }


    /**
     * @param $id
     * @param $width
     * @param $height
     * @param $name
     * @param string $image
     * @return mixed
     */
    public function resize($id, $width, $height, $name)
    {
        $img = Image::make(URL::to('/img/gallery/' . $id . '/' . $name))->fit($width, $height);

        $response = Response::make($img->encode('jpg'));

        $response->header('Content-Type', 'image/jpg');

        return $response;
    }

}
