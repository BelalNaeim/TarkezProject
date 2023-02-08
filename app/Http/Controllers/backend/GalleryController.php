<?php

namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;

use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Http\Traits\FileUploaderTrait;

class GalleryController extends Controller {
    use FileUploaderTrait;
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function index( Request $request ) {
        //
        $galleries = Gallery::when(
            $request->search,

            function ( $q ) use ( $request ) {
                return $q->where( 'title', 'like', '%' . $request->search . '%' )
                ->orWhere( 'description', 'like', '%' . $request->search . '%' );
            }
        )->latest()->paginate( 5 );
        return  view( 'backend.galleries.index', compact( 'galleries' ) );
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function create() {
        //
        return view( 'backend.galleries.create' );
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */

    public function store( Request $request ) {
        //
        $input = $this->validate( $request, [
            'title_ar' =>'required|string|max:255',
            'title_en' =>'required|string|max:255',
            'desc_ar' =>'required|string',
            'desc_en' =>'required|string',
            'photo' =>'required|mimes:jpg,jpeg,png',

        ] );
        $input = [
            'title' => [
                'en' =>$request->title_en,
                'ar' =>$request->title_ar,
            ],
            'description' => [
                'en' => $request->desc_en,
                'ar' => $request->desc_ar,

            ]
        ];
        $image = $request->photo;
        if ( $image ) {
            $path = public_path( 'uploads/gallery' );
            $image_up = $this->uploadFile( $image, $path );
            $input[ 'photo' ] = 'uploads/gallery/' . $image_up;

            $input[ 'user_id' ] = auth()->user()->id;

            Gallery::create( $input );
            toastr()->success( 'Galley Pgoto added successfully!', 'Congrats' );
            return redirect()->route( 'galleries.index' );

        } else {
            return Redirect()->back();
        }
    }

    /**
    * Display the specified resource.
    *
    * @param  \App\Models\Gallery  $gallery
    * @return \Illuminate\Http\Response
    */

    public function show( $id ) {
        //

    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\Gallery  $gallery
    * @return \Illuminate\Http\Response
    */

    public function edit( $id ) {
        //
        $gallery = Gallery::find( $id );
        return view( 'backend.galleries.edit', compact( 'gallery' ) );
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\Gallery  $gallery
    * @return \Illuminate\Http\Response
    */

    public function update( Request $request, $id ) {
        //
        $input = $this->validate( $request, [
            'title_ar' =>'required|string|max:255',
            'title_en' =>'required|string|max:255',
            'desc_ar' =>'required|string',
            'desc_en' =>'required|string',
            'photo' =>'required|mimes:jpg,jpeg,png',

        ] );
        $input = [
            'title' => [
                'en' =>$request->title_en,
                'ar' =>$request->title_ar,
            ],
            'description' => [
                'en' => $request->desc_en,
                'ar' => $request->desc_ar,

            ]
        ];
        $image = $request->photo;
        $oldimage = $request->oldimage;
        if ( $image ) {
            $path = public_path( 'uploads/gallery/' );
            $image_up = $this->uploadFile( $image, $path );
            $input[ 'photo' ] = 'uploads/gallery/' . $image_up;
            unlink( $oldimage );
            $gallery = Gallery::where( 'id', $id );
            $gallery->update( $input );
            toastr()->success( 'Gallery photo Updated successfully!', 'Congrats' );
            return redirect()->route( 'galleries.index' );
        } else {
            $gallery = Gallery::where( 'id', $id );
            $input[ 'photo' ] = $oldimage;
            $gallery->where( 'id', $id )->update( $input );

            toastr()->success( 'About Us section Updated successfully!', 'Congrats' );
            return redirect()->route( 'galleries.index' );
        }
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Gallery  $gallery
    * @return \Illuminate\Http\Response
    */

    public function destroy( $id ) {
        //
        $gallery = Gallery::find( $id );
        $gallery->delete();
        toastr()->error( 'About Us section Deleted successfully!', 'Congrats' );
        return redirect()->route( 'galleries.index' );
    }
}
