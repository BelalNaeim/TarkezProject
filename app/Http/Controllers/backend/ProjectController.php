<?php

namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;
use App\Http\Traits\FileUploaderTrait;

class ProjectController extends Controller {
    use FileUploaderTrait;
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function index( Request $request ) {
        //
        $Projects = Project::when(
            $request->search,

            function ( $q ) use ( $request ) {
                return $q->where( 'title', 'like', '%' . $request->search . '%' )
                ->orWhere( 'description', 'like', '%' . $request->search . '%' );
            }
        )->latest()->paginate( 5 );
        return  view( 'backend.project.index', compact( 'Projects' ) );
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function create() {
        //
        return view( 'backend.project.create' );
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
            'image' =>'required|mimes:jpg,jpeg,png',

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
        if ( $image ) {
            $path = public_path( 'uploads/Projects' );
            $image_up = $this->uploadFile( $image, $path );
            $input[ 'image' ] = 'uploads/Projects/' . $image_up;

            $input[ 'user_id' ] = auth()->user()->id;

            Project::create( $input );
            toastr()->success( 'Project added successfully!', 'Congrats' );
            return redirect()->route( 'projects.index' );

        } else {
            return Redirect()->back();
        }
    }

    /**
    * Display the specified resource.
    *
    * @param  \App\Models\Project  $project
    * @return \Illuminate\Http\Response
    */

    public function show( Project $project ) {
        //
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\Project  $project
    * @return \Illuminate\Http\Response
    */

    public function edit( $id ) {
        //
        $project = Project::find( $id );
        return view( 'backend.project.edit', compact( 'project' ) );
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\Project  $project
    * @return \Illuminate\Http\Response
    */

    public function update( Request $request, $id ) {
        //

        $input = $this->validate( $request, [
            'title_ar' =>'required|string|max:255',
            'title_en' =>'required|string|max:255',
            'desc_ar' =>'required|string',
            'desc_en' =>'required|string',
            'image' =>'required|mimes:jpg,jpeg,png',

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
            $path = public_path( 'uploads/projects/' );
            $image_up = $this->uploadFile( $image, $path );
            $input[ 'image' ] = 'uploads/projects/' . $image_up;
            unlink( $oldimage );
            $project = Project::where( 'id', $id );
            $project->update( $input );
            toastr()->success( 'project Updated successfully!', 'Congrats' );
            return redirect()->route( 'projects.index' );
        } else {
            $project = Project::where( 'id', $id );
            $input[ 'image' ] = $oldimage;
            $project->where( 'id', $id )->update( $input );

            toastr()->success( 'project Updated successfully!', 'Congrats' );
            return redirect()->route( 'projects.index' );
        }
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Project  $project
    * @return \Illuminate\Http\Response
    */

    public function destroy( $id ) {
        //
        $project = Project::find( $id );
        $project->delete();
        toastr()->error( 'project Deleted successfully!', 'Congrats' );
        return redirect()->route( 'projects.index' );
    }
}
