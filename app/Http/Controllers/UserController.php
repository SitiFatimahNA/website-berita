<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class UserController extends Controller
{
    public function showDataInHome(){
       $post = Post::all();
       return view ('home', compact('post'));
    }
    public function showDataInBlog(){
       $post = Post::all();
       $categories = [
        'politik', 'ekonomi', 'teknologi', 'pendidikan',
        'olahraga', 'otomotif', 'hiburan', 'kesehatan',
        'internasional', 'nasional'
    ];

    return view ('blog', compact('post', 'categories'));
       
    }
    public function showFullPost($id){
        $post = Post::findOrFail($id);
        $categories = [
            'politik', 'ekonomi', 'teknologi', 'pendidikan',
            'olahraga', 'otomotif', 'hiburan', 'kesehatan',
            'internasional', 'nasional'
        ];
        return view('fullpost', compact('post', 'categories'));
    }
    public function home(Request $request){
        if($request->user()->usertype=='user'){
            return view('dashboard');
        }
        else{
            return redirect()->route('admin.dashboard');
        }
    }
    public function index(Request $request){
        if($request->user()->usertype=='admin'){
            $messages = \App\Models\Contact::all();
            return view('admin.dashboard', compact('messages'));
        }
        else{
            return redirect()->route('dashboard');
        }
    }   
    public function byCategory($category)
{
    $post = Post::where('category', $category)->latest()->paginate(9);

    $categories = [
        'politik', 'ekonomi', 'teknologi', 'pendidikan',
        'olahraga', 'otomotif', 'hiburan', 'kesehatan',
        'internasional', 'nasional'
    ];

    return view('category', compact('post', 'category', 'categories'));
}

public function search(Request $request)
{
    $q = $request->input('q');
    $post = Post::where('title', 'like', "%$q%")
                ->orWhere('description', 'like', "%$q%")
                ->latest()->get();

    return view('home', compact('post'));
}
public function about()
{
    return view('about');
}
public function contact()
{
    return view('contact');
}

public function send(Request $request)
{
    $request->validate([
        'nama'   => 'required|string|max:100',
        'email'  => 'required|email',
        'subjek' => 'required|string',
        'pesan'  => 'required|string|min:10',
        'setuju' => 'accepted',
    ], [
        'nama.required'   => 'Nama wajib diisi.',
        'email.required'  => 'Email wajib diisi.',
        'email.email'     => 'Format email tidak valid.',
        'subjek.required' => 'Silakan pilih subjek pesan.',
        'pesan.required'  => 'Pesan wajib diisi.',
        'pesan.min'       => 'Pesan minimal 10 karakter.',
        'setuju.accepted' => 'Anda harus menyetujui kebijakan privasi.',
    ]);

    Contact::create([
        'name'    => $request->nama,
        'email'   => $request->email,
        'subject' => $request->subjek,
        'message' => $request->pesan,
    ]);

    return back()->with(
        'success',
        'Pesan Anda berhasil dikirim! Kami akan membalas dalam 1–2 hari kerja.'
    );
}

}

