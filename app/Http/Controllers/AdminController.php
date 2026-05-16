<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Message;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function addpost(){
        return view('admin.add_post');
    }
    public function createpost(Request $request){
        $post = new Post();
        $post->title = $request->title;
        $post->description = $request->description;
        $image=$request->image; 
        if($image=$request->image){
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $post->image=$imagename;
        }

        $post->user_name = Auth::User()->name;
        $post->user_id=Auth::User()->id;
        if($image=$request->image && $post->save()){
            $request->image->move('img', $imagename);
           
        }
         return redirect()->route('admin.allpost')->with('status', 'Updated Successfully!');;
    }
    public function allpost(){
        $post = Post::all();
        return view('admin.allpost', compact('post'));
    }
    public function updatePost($id){
        $post = Post::findOrFail($id);
        return view('admin.updatepost', compact('post'));
    }
    public function postupdate(Request $request, $id){
    $post = Post::findOrFail($id);
    $post->title = $request->title;
    $post->description = $request->description;
    $image=$request->image; 
    if($image=$request->image){
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $post->image=$imagename;
    }

    

    $post->user_name = Auth::User()->name;
    $post->user_id = Auth::User()->id;
    if($image=$request->image && $post->save()){
        $request->image->move('img', $imagename);
    }

    return redirect()->route('admin.allpost')->with('status', 'Updated Successfully!');
}
public function deletePost($id){
    $post = Post::findOrFail($id);
    return view('admin.postdelete', compact('post'));
}
public function postDelete(Request $request, $id){
    $post = Post::findOrFail($id);
    if($request->id == $post->id){
        $post->delete();
        return redirect()->route('admin.allpost')->with('danger', 'Deleted Successfully!');
    }
    else{
        return redirect()->route('admin.allpost');
    }
    
}
public function kontak(Request $request)
{
    return view('contact');
}

public function send(Request $request)
{
    // 1. Validasi input dari user
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'subject' => 'required|string',
        'message' => 'required|string',
    ]);

    // 2. Simpan ke database
    Message::create([
        'name' => $request->name,
        'email' => $request->email,
        'subject' => $request->subject,
        'message' => $request->message,
    ]);

    // 3. Kembalikan dengan pesan sukses
    return redirect()->back()->with('success', 'Pesan Anda berhasil dikirim!');
}

}
