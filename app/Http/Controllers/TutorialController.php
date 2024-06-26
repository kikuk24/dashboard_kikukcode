<?php

namespace App\Http\Controllers;

use App\Models\Topics;
use App\Models\Tutorial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TutorialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tutorials = Tutorial::with('topics')->latest()->paginate(6);
        return response()->json([
            'status' => true,
            'message' => 'success',
            'data' => $tutorials
        ], 200);
    }

    public function getTutorial()
    {
        $tutorials = Tutorial::with('topics')->latest()->paginate(6);
        $topics = Topics::all();
        $data = [
            'tutorials' => $tutorials,
            'topic' => $topics
        ];
        return view('clients.tutorial', $data);
    }

    public function showtutorial($slug)
    {
        $tutorial = Tutorial::with('user', 'topics')->where('slug', $slug)->first();
        $related = Tutorial::with('topics')->where('topics_id', $tutorial->topics_id)->where('id', '!=', $tutorial->id)->latest()->limit(4)->get();
        $data = [
            'tutorial' => $tutorial,
            'related' => $related
        ];
        $tutorial->increment('views');
        return view('clients.showtutorial', $data);
    }

    public function tutorialsByTopics($slug)
    {
        $topic = Topics::where('slug', $slug)->first();
        $tutorials = Tutorial::with('topics')->where('topics_id', $topic->id)->latest()->paginate(6);
        $data = [
            'topic' => $topic,
            'tutorials' => $tutorials
        ];

        return view('clients.tutorial', $data);
    }

    public function tutorialsByTopic($slug)
    {
        $topic = Topics::where('slug', $slug)->first();
        $tutorials = Tutorial::with('topics')->where('topics_id', $topic->id)->latest()->paginate(6);
        return response()->json([
            'status' => true,
            'message' => 'success',
            'data' => $tutorials
        ], 200);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = auth()->user();
        if(!$user){
            return redirect('/login');
        }
        $topic = Topics::all();
        $data = [
            'title' => 'Dashboard',
            'user' => $user,
            'topic' => $topic
        ];
        return view('admin.addtutorial',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $slug = \Str::slug($request->title);
        $fileName = $slug . '.' . $request->file('image')->getClientOriginalExtension();
        
        $path =  '/tutorial/'. $fileName;
        Storage::disk('public')->put($path, file_get_contents($request->file('image')));
        Tutorial::create([
            'title' => $request->title,
            'slug' => $slug,
            'topics_id' => $request->topic_id,
            'body' => $request->body,
            'user_id' => auth()->user()->id,
            'image' => $path,
            'keywords' => $request->keywords,
            'description' => $request->description
        ]);
        return redirect()->route('dashboard.tutorial')->with('success', 'Tutorial created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $tutorial = Tutorial::with('user', 'topics')->where('slug', $slug)->first();
        if (!$tutorial) {
            return response()->json([
                'status' => false,
                'message' => 'Tutorial not found'
            ], 404);
        }
        $tutorial->increment('views');
        return response()->json([
            'status' => true,
            'message' => 'success',
            'data' => $tutorial
        ], 200);


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tutorial = Tutorial::with('topics')->findOrFail($id);
        $topic = Topics::all();
        $data = [
            'title' => 'Dashboard',
            'tutorial' => $tutorial,
            'topic' => $topic
        ];
        return view('admin.update_tutorial', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'topic_id' => 'required',
        ]);
        
        $tutorial = Tutorial::findOrFail($id);
        $slug = \Str::slug($request->title);
        $image = $request->file('image');
        
        if ($image) {
            Storage::disk('public')->exists($tutorial->image);
            Storage::disk('public')->delete($tutorial->image);

            $extension = $image->getClientOriginalExtension();
            $fileName = $slug . '.' . $extension;
            $path =  '/tutorial/' . $fileName;
            Storage::disk('public')->put($path, file_get_contents($request->file('image')));

            $tutorial->update([
                'title' => $request->title,
                'slug' => $slug,
                'body' => $request->body,
                'image' => $path,
                'keywords' => $request->keywords,
                'description' => $request->description,
                'topics_id' => $request->topic_id
            ]);
        } else {
            $tutorial->update([
                'title' => $request->title,
                'slug' => $slug,
                'body' => $request->body,
                'keywords' => $request->keywords,
                'description' => $request->description,
                'topics_id' => $request->topic_id
            ]);
        }
        return redirect()->route('dashboard.tutorial')->with('success', 'Tutorial updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tutorial = Tutorial::findOrFail($id);
        $path = $tutorial->image;
        if(Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }
        $tutorial->delete();
        return redirect()->route('dashboard.tutorial')->with('success', 'Tutorial deleted successfully');
    }

    public function destroy_all(){
        $tutorials = Tutorial::all();
        foreach ($tutorials as $tutorial) {
            $path = $tutorial->image;
            if (Storage::disk('public')->exists($path)) {
                Storage::disk('public')->delete($path);
            }
            $tutorial->delete();
        }

        return redirect()->back()->with('success', 'All tutorials deleted successfully');
        

    }
}
