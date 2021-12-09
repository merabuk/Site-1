<?php

namespace App\Http\Controllers\Backend\API;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Http\Resources\ImageResource;
use Illuminate\Http\Request;
use App\Http\Requests\StoreImageRequest;
use App\Http\Requests\UpdateImageRequest;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = Image::all();
        return response([ 'images' => ImageResource::collection($images), 'message' => 'Images retrieved successfully'], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreImageRequest $request)
    {
        $validatedRequest = $request->validated();
        $image = Image::create($validatedRequest);
        return response(['image' => new ImageResource($image), 'message' => 'Image created successfully'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateImageRequest $request, Image $image)
    {
        $validatedRequest = $request->validated();
        if (isset($validatedRequest['pathToSave'])) {
            $image->updateImage($validatedRequest, $validatedRequest['pathToSave']);
        } else {
            $image->updateImage($validatedRequest);
        }
        return response(['image' => new ImageResource($image), 'message' => 'Image updated successfully'], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image)
    {
        $image->deleteImage();
        return response(['message' => 'Image deleted successfully'], 201);

    }
}
