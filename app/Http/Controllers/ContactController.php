<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactController extends Controller {
    //

    public function Contact() {
        return view( 'main.contactus' );
    }

    public function ContactForm( Request $request ) {
        $data = array();
        $data[ 'name' ] = $request->name;
        $data[ 'email' ] = $request->email;
        $data[ 'phone' ] = $request->phone;
        $data[ 'msg' ] = $request->message;

        ContactUs::insert( $data );
        toastr()->success( 'Your Message Insert Successfully!', 'Congrats' );
        return redirect()->back();
    }

    public function AllMessage() {
        $message = 	ContactUs::get();
        return view( 'backend.contact.all_messages', compact( 'message' ) );
    }

}
