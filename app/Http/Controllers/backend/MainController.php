<?php

namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use App\Models\Main;
use Illuminate\Http\Request;
use App\Http\Traits\FileUploaderTrait;
use Illuminate\Support\Facades\Validator;

class MainController extends Controller {
    use FileUploaderTrait;
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function index( Request $request ) {
        //
        $MainService = Main::when(
            $request->search,

            function ( $q ) use ( $request ) {
                return $q->where( 'title', 'like', '%' . $request->search . '%' )
                ->orWhere( 'description', 'like', '%' . $request->search . '%' );
            }
        )->latest()->paginate( 5 );
        return  view( 'backend.mains.index', compact( 'MainService' ) );
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function create() {
        //
        return view( 'backend.mains.create' );
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */

    public function store( Request $request ) {
        //
        $validator = Validator::make( $request->all(), [
            'title_ar' =>'required|string|max:255',
            'title_en' =>'required|string|max:255',
            'desc_ar' =>'required|string',
            'desc_en' =>'required|string',
            'cover' =>'required|mimes:jpg,jpeg,png',
        ] );
        $validator = [
            'title' => [
                'en' =>$request->title_en,
                'ar' =>$request->title_ar,
            ],
            'description' => [
                'en' => $request->desc_en,
                'ar' => $request->desc_ar,

            ]
        ];
        $image = $request->cover;
        if ( $image ) {
            $path = public_path( 'uploads/mains' );
            $image_up = $this->uploadFile( $image, $path );
            $validator[ 'cover' ] = 'uploads/mains/' . $image_up;

            $validator[ 'user_id' ] = auth()->user()->id;

            Main::create( $validator );
            toastr()->success( 'Main service added successfully!', 'Congrats' );
            return redirect()->route( 'mains.index' );

        } else {
            return Redirect()->back();
        }
    }

    /**
    * Display the specified resource.
    *
    * @param  \App\Models\Main  $Main
    * @return \Illuminate\Http\Response
    */

    public function show( Main $Main ) {
        //
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\Main  $Main
    * @return \Illuminate\Http\Response
    */

    public function edit( $id ) {
        //
        $mainservice = Main::find( $id );
        return view( 'backend.mains.edit', compact( 'mainservice' ) );
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\Main  $Main
    * @return \Illuminate\Http\Response
    */

    public function update( Request $request, $id ) {
        //

        $input = $this->validate( $request, [
            'title_ar' =>'required|string|max:255',
            'title_en' =>'required|string|max:255',
            'desc_ar' =>'required|string',
            'desc_en' =>'required|string',
            'cover' =>'required|mimes:jpg,jpeg,png',

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
        $image = $request->image;
        $oldimage = $request->oldimage;
        if ( $image ) {
            $path = public_path( 'uploads/mains/' );
            $image_up = $this->uploadFile( $image, $path );
            $input[ 'image' ] = 'uploads/mains/' . $image_up;
            unlink( $oldimage );
            $service = Main::where( 'id', $id );
            $service->update( $input );
            toastr()->success( 'Main service Updated successfully!', 'Congrats' );
            return redirect()->route( 'mains.index' );
        } else {
            $Main = Main::where( 'id', $id );
            $input[ 'image' ] = $oldimage;
            $Main->where( 'id', $id )->update( $input );

            toastr()->success( 'Main service Updated successfully!', 'Congrats' );
            return redirect()->route( 'mains.index' );
        }
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Main  $Main
    * @return \Illuminate\Http\Response
    */

    public function destroy( $id ) {
        //
        $Main = Main::find( $id );
        $Main->delete();
        toastr()->error( 'Main service Deleted successfully!', 'Congrats' );
        return redirect()->route( 'mains.index' );
    }
}
