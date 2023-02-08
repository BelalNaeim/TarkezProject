<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Social;
use Image;
use App\Models\Websitesetting;

class WebsiteSettingController extends Controller {
    //

    public function SocialSetting() {
        $social  = Social::first();
        return view( 'backend.setting.social', compact( 'social' ) );
    }

    public function SocialUpdate( Request $request, $id ) {
        $data = [];
        $data[ 'facebook' ] = $request->facebook;
        $data[ 'twitter' ] = $request->twitter;
        $data[ 'youtube' ] = $request->youtube;
        $data[ 'snapchat' ] = $request->snapchat;
        $data[ 'instagram' ] = $request->instgram;
        Social::where( 'id', $id )->update( $data );
        toastr()->success( 'Social Setting Updated Successfully!', 'Congrats' );
        return redirect()->route( 'social.setting' );
    }

    public function MainWebSetting() {
        $websitesetting = Websitesetting::first();
        return view( 'backend.setting.website', compact( 'websitesetting' ) );
    }

    public function UpdateWebSetting( Request $request, $id ) {

        $data = array();
        $data[ 'address_en' ] = $request->address_en;
        $data[ 'address_ar' ] = $request->address_ar;
        $data[ 'phone_en' ] = $request->phone_en;
        $data[ 'phone_ar' ] = $request->phone_ar;
        $data[ 'email' ] = $request->email;

        $oldimage = $request->oldlogo;

        $image = $request->logo;
        if ( $image ) {
            $image_one = uniqid().'.'.$image->getClientOriginalExtension();

            Image::make( $image )->resize( 320, 130 )->save( 'image/logo/'.$image_one );
            $data[ 'logo' ] = 'image/logo/'.$image_one;
            // image/postimg/343434.png
            Websitesetting::where( 'id', $id )->update( $data );
            unlink( $oldimage );

            toastr()->success( 'Website Updated Successfully!', 'Congrats' );

            return Redirect()->route( 'website.setting' );

        } else {
            $data[ 'logo' ] = $oldimage;
            Websitesetting::where( 'id', $id )->update( $data );

            toastr()->success( 'Website Updated Successfully!', 'Congrats' );

            return Redirect()->route( 'website.setting' );
        }
        // End Condition

    }
    // End Method
}
