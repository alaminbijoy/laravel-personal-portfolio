<?php

namespace App\Http\Controllers;

use App\Category;
use App\Contact;
use App\Mail\ContactMail;
use App\Post;
use App\Social_Media;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class WebController extends Controller
{
    public function __construct()
    {
        // Load your objects
        $social_media = Social_Media::all();

        // Make it available to all views by sharing it
        view()->share('social_media', $social_media);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sp_admin = User::find(1);
        $post = Post::all()->sortByDesc("created_at");
        $categorys = Category::all();
        return view('index', compact('sp_admin', 'post', 'categorys'));
    }

    public function contactSend(Request $request)
    {
        $this->validate($request, [

            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',

        ]);

        $contact = new Contact();

        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        $contact->phone = $request->phone;

       $contact->save();


        Mail::to(env('ADMIN_MAIL'))->send(new ContactMail($contact));

        return back()->with('status', 'Message send successfully ');
    }

}
