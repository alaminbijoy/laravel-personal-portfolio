<?php

namespace App\Http\Controllers;



use App\Contact;
use App\MailSend;
use App\Portfolio;
use App\Role;
use App\Social_Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\Category;
use App\Media;
use App\User;
use Intervention\Image\Facades\Image;


class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        // Load your objects
        $count = Contact::where('status', 0)->count();
        $email_notifications = Contact::where('status', 0)->get();

        // Make it available to all views by sharing it
        view()->share(compact('email_notifications', 'count'));
    }

    public function adminDashboard()
    {
        return view('admin.admin_dashboard');
    }

    public function addNewCategory()
    {
//        $user_role = Auth::user()->user_role;
//        if($user_role == 1){
            return view('admin.add_category');
        //}
    }

    public function addNewPost()
    {
        $all_category = Category::all();
        return view('admin.add_post', compact('all_category'));
    }

    public function supperAdmin()
    {
        $sp_admin = User::find(1);
        return view('admin.supper_admin_profile', compact('sp_admin'));
    }

    public function manageCategory()
    {
        $categories = Category::all();
        $portfolios = Portfolio::all();
        return view('admin.manage_category', compact('categories', 'portfolios'));
    }

    public function socialIcon(){

        return view('admin.add_social_media');
    }

    public function manageSocialMedia()
    {
        $social_media = Social_Media::all();
        return view('admin.manage_social_media', compact('social_media'));
    }

    public function mailInbox()
    {
        //$messages = Contact::orderBy('created_at', 'desc')->get();
        $messages = Contact::all()->sortByDesc("created_at");
        return view('admin.mail_inbox', compact('messages'));
    }

    public function mailInboxRead($id)
    {
        $message = Contact::find($id);

        if($message->status == 0) {
            $message->status = 1;
            $message->save();
        }

        return view('admin.mail_read', compact('message'));
    }
    public function mailCompose()
    {
        return view('admin.mail_compose');
    }

    public function mailSend(Request $request)
    {
        $this->validate($request, [

            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',

        ]);

        $user_id = Auth::user()->id;
        $mail_send = new MailSend();

        $mail_send->user_id = $user_id;
        $mail_send->email = $request->email;
        $mail_send->subject = $request->subject;
        $mail_send->message = $request->message;

        $mail_send->save();

        $request->session()->flash('message', 'Email send successfully !');
        return Redirect::to('/mail-compose');
    }

    public function mailOutBox()
    {
        $messages = MailSend::all()->sortByDesc("created_at");
        return view('admin.mail_outbox', compact( 'messages'));
    }

    public function mailOutboxRead($id)
    {
        $message = MailSend::find($id);
        return view('admin.mail_read_outbox', compact('message'));
    }


    /**
     * @param Request $request
     * @return mixed
     */
    public function newCategory(Request $request)
    {
        $this->validate($request, [

            'category_name' => 'required',

        ]);

        $user_role = Auth::user()->user_role;
        if($user_role === 1){

            $user_id = Auth::user()->id;
            $category = new Category();

            $category->user_id = $user_id;
            $category->category_name = $request->category_name;
            $category->category_description = $request->category_description;

            $category->save();

            $request->session()->flash('message', 'Save Category information successfully !');

        }
        return Redirect::to('/add-new-category');
    }

    public function editCategory($id)
    {
        $edit_category = Category::find($id);

        return view('admin.edit_category', compact('edit_category'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function updateCategory(Request $request, $id)
    {
        $this->validate($request, [
            'category_name' => 'required',
        ]);

        $user_role = Auth::user()->user_role;
        if($user_role === 1) {

            $category = Category::find($id);

            $category->category_name = $request->category_name;
            $category->category_description = $request->category_description;

            $category->save();

            $request->session()->flash('message', 'Update Category information successfully !');
        }
        return Redirect::to('/manage-category');
    }

    public function deleteCategory(Request $request, $id)
    {
        $user_role = Auth::user()->user_role;
        if($user_role === 1) {

            $delete_category = Category::find($id);

            $delete_category->delete();

            $request->session()->flash('message', 'Delete Category information successfully !');

        }
        return Redirect::to('/manage-category');

    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function newPost(Request $request)
    {
        $this->validate($request, [

            'post_title' => 'required',
            'post_status' => 'required',
            'media_id' => 'image|mimes:jpeg,png,jpg,gif|max:2048',

        ]);

        $user_role = Auth::user()->user_role;
        if($user_role === 1) {

            $user_id = Auth::user()->id;
            $post = new Post;
            $image = new Media();

            $post_category = $request->input('category_name');
            if ($post_category) {
                $post_category = implode(',', $post_category);
            }

            $post->user_id = $user_id;
            $post->post_title = $request->post_title;
            $post->post_content = $request->post_content;
            $post->post_status = $request->post_status;
            $post->category_name = $post_category;
            $post->tag_id = $request->tag_id;

            $post_image = $request->file('media_id');
            if ($post_image) {
                $image_name = str_random(20);
                $extension = $post_image->getClientOriginalExtension();
                $input_image = $image_name . time() . '.' . $extension;
                $destinationPath = 'upload/images/';
                $move = $post_image->move($destinationPath, $input_image);

                if ($move) {

                    // start watermark
                    $img = Image::make($destinationPath . $input_image);

                    $img->insert('images/watermark.png', 'top', 100, 100);
                    $img->insert('images/watermark.png', 'bottom', 100, 100);
                    $img->insert('images/watermark.png', 'center');

                    $img->save($destinationPath . $input_image); //save created image (will override old image)
                    // end watermark

                    $image->image_name = $input_image;
                    $image->path = $destinationPath;

                    if ($image->save()) {
                        $post->media_id = $image->id;
                        if ($post->save()) {
                            $request->session()->flash('message', 'Save post information successfully !');
                        }
                    }
                } else {
                    $request->session()->flash('message', 'Upload failed !');
                }
            } else {
                if ($post->save()) {
                    $request->session()->flash('message', 'Save post information successfully !');
                }
            }
        }
        return Redirect::to('/add-new-post');

    }

    public function managePost()
    {
        $posts = Post::all();

        return view('admin.manage_post', compact('posts'));
    }

    public function editPost($id)
    {
        $edit_post = Post::find($id);
        $all_category = Category::all();

        return view('admin.edit_post', compact('edit_post', 'all_category'));
    }

    public function updatePost(Request $request, $id)
    {
        $this->validate($request, [

            'post_title' => 'required',
            'post_status' => 'required',
            'media_id' => 'image|mimes:jpeg,png,jpg,gif|max:2048',

        ]);

        $user_role = Auth::user()->user_role;
        if($user_role === 1) {

            $user_id = Auth::user()->id;
            $post = Post::find($id);
            $image = new Media();

            $post_category = $request->input('category_name');
            if ($post_category) {
                $post_category = implode(',', $post_category);
            }

            $post->user_id = $user_id;
            $post->post_title = $request->post_title;
            $post->post_content = $request->post_content;
            $post->post_status = $request->post_status;
            $post->category_name = $post_category;
            $post->tag_id = $request->tag_id;

            $post_image = $request->file('media_id');
            if ($post_image) {
                $image_name = str_random(20);
                $extension = $post_image->getClientOriginalExtension();
                $input_image = $image_name . time() . '.' . $extension;
                $destinationPath = 'upload/images/';
                $success = $post_image->move($destinationPath, $input_image);

                if ($success) {

                    // start watermark
                    $img = Image::make($destinationPath . $input_image);

                    $img->insert('images/watermark.png', 'top', 100, 100);
                    $img->insert('images/watermark.png', 'bottom', 100, 100);
                    $img->insert('images/watermark.png', 'center');

                    $img->save($destinationPath . $input_image); //save created image (will override old image)
                    // end watermark

                    $image->image_name = $input_image;
                    $image->path = $destinationPath;
                    if ($image->save()) {
                        $post->media_id = $image->id;
                        if ($post->save()) {
                            $request->session()->flash('message', 'Update post information successfully !');
                        }
                    }
                } else {
                    $request->session()->flash('message', 'Upload failed !');
                }
            } else {
                if ($post->save()) {
                    $request->session()->flash('message', 'Update post information successfully !');
                }
            }
        }
        return Redirect::to('/manage-post');

    }

    public function deletePost(Request $request, $id)
    {
        $user_role = Auth::user()->user_role;
        if($user_role === 1) {

            $delete_post = Post::find($id);

            $delete_post->delete();

            $request->session()->flash('message', 'Delete post information successfully !');
        }
        return Redirect::to('/manage-post');

    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function supperAdminUpdate(Request $request)
    {
        $this->validate($request, [

            'name' => 'required',
            'email' => 'required',
            'user_role' => 'required',
            'media_id' => 'image|mimes:jpeg,png,jpg,gif|max:2048',

        ]);

        $user_role = Auth::user()->user_role;
        if($user_role === 1) {

            $sp_admin = User::find(1);
            $image = new Media();

            $sp_admin->name = $request->name;
            $sp_admin->user_occupation = $request->user_occupation;
            $sp_admin->email = $request->email;
            $sp_admin->user_role = $request->user_role;


            $post_image = $request->file('media_id');
            if ($post_image) {
                $input_image = $post_image->getClientOriginalName();
                $destinationPath = 'upload/images/';
                $move = $post_image->move($destinationPath, $input_image);

                if ($move) {

                    $image->image_name = $input_image;
                    $image->path = $destinationPath;

                    if ($image->save()) {
                        $sp_admin->user_image = $image->id;
                        if ($sp_admin->save()) {
                            $request->session()->flash('message', 'Save information successfully !');
                        }
                    }
                } else {
                    $request->session()->flash('message', 'Upload failed !');
                }
            } else {
                if ($sp_admin->save()) {
                    $request->session()->flash('message', 'Save information successfully !');
                }
            }
        }
        return Redirect::to('/supper-admin');

    }

    public function addSocialMedia(Request $request)
    {
        $this->validate($request, [

            'social_media_name' => 'required',
            'social_media_url' => 'required',
            'icon' => 'required',

        ]);

        $user_role = Auth::user()->user_role;
        if($user_role === 1) {

            $social_media = new Social_Media();
            $image = new Media();

            $social_media->social_media_name = $request->social_media_name;
            $social_media->social_media_url = $request->social_media_url;
            $social_media->icon = $request->icon;

            $social_media_image = $request->file('media_id');
            if ($social_media_image) {
                $input_image = $social_media_image->getClientOriginalName();
                $destinationPath = 'upload/images/';
                $move = $social_media_image->move($destinationPath, $input_image);

                if ($move) {

                    $image->image_name = $input_image;
                    $image->path = $destinationPath;

                    if ($image->save()) {
                        $social_media->media_id = $image->id;
                        if ($social_media->save()) {
                            $request->session()->flash('message', 'Save social media information successfully !');
                        }
                    }
                } else {
                    $request->session()->flash('message', 'Upload failed !');
                }
            } else {
                if ($social_media->save()) {
                    $request->session()->flash('message', 'Save social media information successfully !');
                }
            }
        }

        return Redirect::to('/add-social-media');
    }

    public function socialMediaUpdate(Request $request, $id)
    {
        $this->validate($request, [

            'social_media_name' => 'required',
            'social_media_url' => 'required',
            'icon' => 'required',

        ]);

        $user_role = Auth::user()->user_role;
        if($user_role === 1) {

            $social_media = Social_Media::find($id);
            $image = new Media();

            $social_media->social_media_name = $request->social_media_name;
            $social_media->social_media_url = $request->social_media_url;
            $social_media->icon = $request->icon;

            $social_media_image = $request->file('media_id');
            if ($social_media_image) {
                $input_image = $social_media_image->getClientOriginalName();
                $destinationPath = 'upload/images/';
                $move = $social_media_image->move($destinationPath, $input_image);

                if ($move) {

                    $image->image_name = $input_image;
                    $image->path = $destinationPath;

                    if ($image->save()) {
                        $social_media->media_id = $image->id;
                        if ($social_media->save()) {
                            $request->session()->flash('message', 'Save social media information successfully !');
                        }
                    }
                } else {
                    $request->session()->flash('message', 'Upload failed !');
                }
            } else {
                if ($social_media->save()) {
                    $request->session()->flash('message', 'Save social media information successfully !');
                }
            }
        }

        return Redirect::to('/manage-social-media');
    }
    public function deleteSocialMediaImage($id){

        $user_role = Auth::user()->user_role;
        if($user_role === 1) {

            $social_media = Social_Media::find($id);
            $social_media->media_id = NULL;
            $social_media->save();

        }

        return back()->with('message', 'Removed social media image icon successfully !');
    }

    public function editSocialMedia($id)
    {
        $social_media = Social_Media::find($id);
        return view('admin.edit_social_media', compact('social_media', 'fa_icons'));
    }

    public function deleteSocialMedia(Request $request, $id)
    {
        $user_role = Auth::user()->user_role;
        if($user_role === 1) {

            $social_media = Social_Media::find($id);

            $social_media->delete();

            $request->session()->flash('message', 'Delete social media information successfully !');
        }
        return Redirect::to('/manage-social-media');

    }

    /**
     * Portfolio
     * @param Request $request
     * @return mixed
     *
     */

    public function addNewPortfolio()
    {
        $all_category = Category::all();
        return view('admin.add_portfolio', compact('all_category'));
    }

    public function newPortfolio(Request $request)
    {
        $this->validate($request, [

            'portfolio_title' => 'required',
            'status' => 'required',
            'media_id' => 'image|mimes:jpeg,png,jpg,gif|max:2048',

        ]);

        $user_role = Auth::user()->user_role;
        if($user_role === 1) {

            $user_id = Auth::user()->id;
            $portfolio = new Portfolio();
            $image = new Media();

            $category = $request->input('category_name');
            if ($category) {
                $portfolio_category = implode(',', $category);
            }

            $portfolio->user_id = $user_id;
            $portfolio->title = $request->portfolio_title;
            $portfolio->content = $request->portfolio_content;
            $portfolio->status = $request->status;
            $portfolio->category_name = $portfolio_category;
            $portfolio->tag_id = $request->tag_id;

            $portfolio_image = $request->file('media_id');
            if ($portfolio_image) {
                $image_name = str_random(20);
                $extension = $portfolio_image->getClientOriginalExtension();
                $input_image = $image_name . time() . '.' . $extension;
                $destinationPath = 'upload/images/';
                $move = $portfolio_image->move($destinationPath, $input_image);

                if ($move) {

                    // start watermark
                    $img = Image::make($destinationPath . $input_image);

                    $img->insert('images/watermark.png', 'top', 100, 100);
                    $img->insert('images/watermark.png', 'bottom', 100, 100);
                    $img->insert('images/watermark.png', 'center');

                    $img->save($destinationPath . $input_image); //save created image (will override old image)
                    // end watermark

                    $image->image_name = $input_image;
                    $image->path = $destinationPath;

                    if ($image->save()) {
                        $portfolio->media_id = $image->id;
                        if ($portfolio->save()) {
                            $request->session()->flash('message', 'Save information successfully !');
                        }
                    }
                } else {
                    $request->session()->flash('message', 'Upload failed !');
                }
            } else {
                if ($portfolio->save()) {
                    $request->session()->flash('message', 'Save information successfully !');
                }
            }
        }
        //return Redirect::to('/add-new-portfolio');
        return back();

    }


    public function managePortfolio()
    {
        $portfolio_items = Portfolio::all();

        return view('admin.manage_portfolio', compact('portfolio_items'));
    }

    public function updatePortfolio(Request $request, $id)
    {
        $this->validate($request, [

            'portfolio_title' => 'required',
            'status' => 'required',
            'media_id' => 'image|mimes:jpeg,png,jpg,gif|max:2048',

        ]);

        $user_role = Auth::user()->user_role;
        if($user_role === 1) {

            $user_id = Auth::user()->id;
            $portfolio = Portfolio::find($id);
            $image = new Media();

            $portfolio_category = $request->input('category_name');
            if ($portfolio_category) {
                $portfolio_category = implode(',', $portfolio_category);
            }

            $portfolio->user_id = $user_id;
            $portfolio->title = $request->portfolio_title;
            $portfolio->content = $request->portfolio_content;
            $portfolio->status = $request->status;
            $portfolio->category_name = $portfolio_category;
            $portfolio->tag_id = $request->tag_id;

            $portfolio_image = $request->file('media_id');
            if ($portfolio_image) {
                $image_name = str_random(20);
                $extension = $portfolio_image->getClientOriginalExtension();
                $input_image = $image_name . time() . '.' . $extension;
                $destinationPath = 'upload/images/';
                $success = $portfolio_image->move($destinationPath, $input_image);

                if ($success) {

                    // start watermark
                    $img = Image::make($destinationPath . $input_image);

                    $img->insert('images/watermark.png', 'top', 100, 100);
                    $img->insert('images/watermark.png', 'bottom', 100, 100);
                    $img->insert('images/watermark.png', 'center');

                    $img->save($destinationPath . $input_image); //save created image (will override old image)
                    // end watermark

                    $image->image_name = $input_image;
                    $image->path = $destinationPath;
                    if ($image->save()) {
                        $portfolio->media_id = $image->id;
                        if ($portfolio->save()) {
                            $request->session()->flash('message', 'Update portfolio information successfully !');
                        }
                    }
                } else {
                    $request->session()->flash('message', 'Upload failed !');
                }
            } else {
                if ($portfolio->save()) {
                    $request->session()->flash('message', 'Update portfolio information successfully !');
                }
            }
        }
        return back();

    }

    public function editPortfolio($id)
    {
        $edit_portfolio = Portfolio::find($id);
        $all_category = Category::all();

        return view('admin.edit_portfolio', compact('edit_portfolio', 'all_category'));
    }

    public function deletePortfolio(Request $request, $id)
    {
        $user_role = Auth::user()->user_role;
        if($user_role === 1) {

            $delete_portfolio = Portfolio::find($id);

            $delete_portfolio->delete();
        }

        return back()->with('message',  'Delete portfolio information successfully !');
    }



    public function manageUsers(){

        $user_role = Auth::user()->user_role;
        if($user_role === 1) {

            $users = User::all();

            return view('admin.manage_user', compact('users'));
        }else{
            return '<h2>Wrong try</h2>';
        }

    }

    public function updateUser(Request $request, $id)
    {
        $user_role = Auth::user()->user_role;
        if($user_role === 1) {

            $this->validate($request, [

                'user_name' => 'required',
                'user_email' => 'required',
                'user_role' => 'required',
                'status' => 'required',

            ]);

            $user = User::find($id);

            $user->name = $request->user_name;
            $user->email = $request->user_email;
            $user->user_occupation = $request->user_occupation;
            $user->user_role = $request->user_role;
            $user->status = $request->status;

            $user->save();

            $request->session()->flash('message', 'Update user information successfully!');

            return Redirect::to('/manage-users');
        }

    }

    public function editUser($id)
    {
        $user_role = Auth::user()->user_role;
        if($user_role === 1) {

            $user = User::find($id);
            $roles = Role::all();
            return view('admin.edit_user', compact('user', 'roles'));

        }else{
            return '<h2>Wrong try</h2>';
        }
    }

}
