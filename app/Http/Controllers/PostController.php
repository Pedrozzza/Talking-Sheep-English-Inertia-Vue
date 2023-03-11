<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Models\Folder;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class PostController extends Controller
{
    public function index() {

        return Inertia::render('Posts/Index', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'posts' => PostResource::collection(Post::latest()->simplePaginate(20)),
        ]);
    }

    public function create() {

        $folders = Folder::all();

        return Inertia::render('Posts/Create', [
            'folders' => $folders,
        ]);
    }

    public function store(Request $request) {

        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'color' => 'required',
            'folder' => 'required',
            'file_upload' => 'nullable',
            'file_upload1' => 'nullable',
            'file_upload2' => 'nullable',
            'file_upload3' => 'nullable',
            'file_upload4' => 'nullable',
            'file_upload5' => 'nullable',
            'file_upload6' => 'nullable',
            'file_upload7' => 'nullable',
            'file_upload8' => 'nullable',
            'file_upload9' => 'nullable',
            'file_homework' => 'nullable',
            'file_homework1' => 'nullable',
            'file_homework2' => 'nullable',
            'file_homework3' => 'nullable',
            'file_homework4' => 'nullable',
            'file_homework5' => 'nullable',
            'file_homework6' => 'nullable',
            'file_homework7' => 'nullable',
            'file_homework8' => 'nullable',
            'file_homework9' => 'nullable',
            'file_conversation' => 'nullable',
        ]);

        if ($request->hasFile('file_upload'))
        {
            $fileNameWithExt = $request->file('file_upload')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('file_upload')->getClientOriginalExtension();
            $fileNameToStore = $fileName . '.' . rand(1, 999) . '.' . $extension;
            $path = $request->file('file_upload')->storeAs('public/file_upload', $fileNameToStore);
        } else {
            $fileNameToStore = '';
        }

        if ($request->hasFile('file_upload1'))
        {
            $fileNameWithExt = $request->file('file_upload1')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('file_upload1')->getClientOriginalExtension();
            $fileNameToStore1 = $fileName . '.' . rand(1, 999) . '.' . $extension;
            $path = $request->file('file_upload1')->storeAs('public/file_upload', $fileNameToStore1);
        } else {
            $fileNameToStore1 = '';
        }

        if ($request->hasFile('file_upload2'))
        {
            $fileNameWithExt = $request->file('file_upload2')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('file_upload2')->getClientOriginalExtension();
            $fileNameToStore2 = $fileName . '.' . rand(1, 999) . '.' . $extension;
            $path = $request->file('file_upload2')->storeAs('public/file_upload', $fileNameToStore2);
        } else {
            $fileNameToStore2 = '';
        }

        if ($request->hasFile('file_upload3'))
        {
            $fileNameWithExt = $request->file('file_upload3')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('file_upload3')->getClientOriginalExtension();
            $fileNameToStore3 = $fileName . '.' . rand(1, 999) . '.' . $extension;
            $path = $request->file('file_upload3')->storeAs('public/file_upload', $fileNameToStore3);
        } else {
            $fileNameToStore3 = '';
        }

        if ($request->hasFile('file_upload4'))
        {
            $fileNameWithExt = $request->file('file_upload4')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('file_upload4')->getClientOriginalExtension();
            $fileNameToStore4 = $fileName . '.' . rand(1, 999) . '.' . $extension;
            $path = $request->file('file_upload4')->storeAs('public/file_upload', $fileNameToStore4);
        } else {
            $fileNameToStore4 = '';
        }

        if ($request->hasFile('file_upload5'))
        {
            $fileNameWithExt = $request->file('file_upload5')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('file_upload5')->getClientOriginalExtension();
            $fileNameToStore5 = $fileName . '.' . rand(1, 999) . '.' . $extension;
            $path = $request->file('file_upload5')->storeAs('public/file_upload', $fileNameToStore5);
        } else {
            $fileNameToStore5 = '';
        }

        if ($request->hasFile('file_upload6'))
        {
            $fileNameWithExt = $request->file('file_upload6')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('file_upload6')->getClientOriginalExtension();
            $fileNameToStore6 = $fileName . '.' . rand(1, 999) . '.' . $extension;
            $path = $request->file('file_upload6')->storeAs('public/file_upload', $fileNameToStore6);
        } else {
            $fileNameToStore6 = '';
        }

        if ($request->hasFile('file_upload7'))
        {
            $fileNameWithExt = $request->file('file_upload7')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('file_upload7')->getClientOriginalExtension();
            $fileNameToStore7 = $fileName . '.' . rand(1, 999) . '.' . $extension;
            $path = $request->file('file_upload7')->storeAs('public/file_upload', $fileNameToStore7);
        } else {
            $fileNameToStore7 = '';
        }

        if ($request->hasFile('file_upload8'))
        {
            $fileNameWithExt = $request->file('file_upload8')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('file_upload8')->getClientOriginalExtension();
            $fileNameToStore8 = $fileName . '.' . rand(1, 999) . '.' . $extension;
            $path = $request->file('file_upload8')->storeAs('public/file_upload', $fileNameToStore8);
        } else {
            $fileNameToStore8 = '';
        }

        if ($request->hasFile('file_upload9'))
        {
            $fileNameWithExt = $request->file('file_upload9')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('file_upload9')->getClientOriginalExtension();
            $fileNameToStore9 = $fileName . '.' . rand(1, 999) . '.' . $extension;
            $path = $request->file('file_upload9')->storeAs('public/file_upload', $fileNameToStore9);
        } else {
            $fileNameToStore9 = '';
        }

        if ($request->hasFile('file_homework'))
        {
            $fileNameWithExt = $request->file('file_homework')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('file_homework')->getClientOriginalExtension();
            $fileNameToStoreH = $fileName . '.' . rand(1, 999) . '.' . $extension;
            $path = $request->file('file_homework')->storeAs('public/file_upload', $fileNameToStoreH);
        } else {
            $fileNameToStoreH = '';
        }

        if ($request->hasFile('file_homework1'))
        {
            $fileNameWithExt = $request->file('file_homework1')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('file_homework1')->getClientOriginalExtension();
            $fileNameToStoreH1 = $fileName . '.' . rand(1, 999) . '.' . $extension;
            $path = $request->file('file_homework1')->storeAs('public/file_upload', $fileNameToStoreH1);
        } else {
            $fileNameToStoreH1 = '';
        }

        if ($request->hasFile('file_homework2'))
        {
            $fileNameWithExt = $request->file('file_homework2')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('file_homework2')->getClientOriginalExtension();
            $fileNameToStoreH2 = $fileName . '.' . rand(1, 999) . '.' . $extension;
            $path = $request->file('file_homework2')->storeAs('public/file_upload', $fileNameToStoreH2);
        } else {
            $fileNameToStoreH2 = '';
        }

        if ($request->hasFile('file_homework3'))
        {
            $fileNameWithExt = $request->file('file_homework3')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('file_homework3')->getClientOriginalExtension();
            $fileNameToStoreH3 = $fileName . '.' . rand(1, 999) . '.' . $extension;
            $path = $request->file('file_homework3')->storeAs('public/file_upload', $fileNameToStoreH3);
        } else {
            $fileNameToStoreH3 = '';
        }

        if ($request->hasFile('file_homework4'))
        {
            $fileNameWithExt = $request->file('file_homework4')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('file_homework4')->getClientOriginalExtension();
            $fileNameToStoreH4 = $fileName . '.' . rand(1, 999) . '.' . $extension;
            $path = $request->file('file_homework4')->storeAs('public/file_upload', $fileNameToStoreH4);
        } else {
            $fileNameToStoreH4 = '';
        }

        if ($request->hasFile('file_homework5'))
        {
            $fileNameWithExt = $request->file('file_homework5')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('file_homework5')->getClientOriginalExtension();
            $fileNameToStoreH5 = $fileName . '.' . rand(1, 999) . '.' . $extension;
            $path = $request->file('file_homework5')->storeAs('public/file_upload', $fileNameToStoreH5);
        } else {
            $fileNameToStoreH5 = '';
        }

        if ($request->hasFile('file_homework6'))
        {
            $fileNameWithExt = $request->file('file_homework6')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('file_homework6')->getClientOriginalExtension();
            $fileNameToStoreH6 = $fileName . '.' . rand(1, 999) . '.' . $extension;
            $path = $request->file('file_homework6')->storeAs('public/file_upload', $fileNameToStoreH6);
        } else {
            $fileNameToStoreH6 = '';
        }

        if ($request->hasFile('file_homework7'))
        {
            $fileNameWithExt = $request->file('file_homework7')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('file_homework7')->getClientOriginalExtension();
            $fileNameToStoreH7 = $fileName . '.' . rand(1, 999) . '.' . $extension;
            $path = $request->file('file_homework7')->storeAs('public/file_upload', $fileNameToStoreH7);
        } else {
            $fileNameToStoreH7 = '';
        }

        if ($request->hasFile('file_homework8'))
        {
            $fileNameWithExt = $request->file('file_homework8')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('file_homework8')->getClientOriginalExtension();
            $fileNameToStoreH8 = $fileName . '.' . rand(1, 999) . '.' . $extension;
            $path = $request->file('file_homework8')->storeAs('public/file_upload', $fileNameToStoreH8);
        } else {
            $fileNameToStoreH8 = '';
        }

        if ($request->hasFile('file_homework9'))
        {
            $fileNameWithExt = $request->file('file_homework9')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('file_homework9')->getClientOriginalExtension();
            $fileNameToStoreH9 = $fileName . '.' . rand(1, 999) . '.' . $extension;
            $path = $request->file('file_homework9')->storeAs('public/file_upload', $fileNameToStoreH9);
        } else {
            $fileNameToStoreH9 = '';
        }

        if ($request->hasFile('file_conversation'))
        {
            $fileNameWithExt = $request->file('file_conversation')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('file_conversation')->getClientOriginalExtension();
            $fileNameToStoreC = $fileName . '.' . rand(1, 999) . '.' . $extension;
            $path = $request->file('file_conversation')->storeAs('public/file_upload', $fileNameToStoreC);
        } else {
            $fileNameToStoreC = '';
        }

        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->folder_id = $request->input('folder');
        $post->user_id = auth()->user()->id;
        $post->file_upload = $fileNameToStore;
        $post->file_upload1 = $fileNameToStore1;
        $post->file_upload2 = $fileNameToStore2;
        $post->file_upload3 = $fileNameToStore3;
        $post->file_upload4 = $fileNameToStore4;
        $post->file_upload5 = $fileNameToStore5;
        $post->file_upload6 = $fileNameToStore6;
        $post->file_upload7 = $fileNameToStore7;
        $post->file_upload8 = $fileNameToStore8;
        $post->file_upload9 = $fileNameToStore9;
        $post->file_homework = $fileNameToStoreH;
        $post->file_homework1 = $fileNameToStoreH1;
        $post->file_homework2 = $fileNameToStoreH2;
        $post->file_homework3 = $fileNameToStoreH3;
        $post->file_homework4 = $fileNameToStoreH4;
        $post->file_homework5 = $fileNameToStoreH5;
        $post->file_homework6 = $fileNameToStoreH6;
        $post->file_homework7 = $fileNameToStoreH7;
        $post->file_homework8 = $fileNameToStoreH8;
        $post->file_homework9 = $fileNameToStoreH9;
        $post->file_conversation = $fileNameToStoreC;
        $post->color = $request->input('color');
        $post->save();

        return redirect()->route('posts.index');
    }

    public function edit(Post $post) {

        $folders = Folder::all();

        return Inertia::render('Posts/Edit', [
            'post' => new PostResource($post),
            'folders' => $folders,
        ]);
    }

    public function update(Request $request, Post $post) {

        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'color' => 'required',
            'folder' => 'required',
            'file_upload' => 'nullable',
            'file_upload1' => 'nullable',
            'file_upload2' => 'nullable',
            'file_upload3' => 'nullable',
            'file_upload4' => 'nullable',
            'file_upload5' => 'nullable',
            'file_upload6' => 'nullable',
            'file_upload7' => 'nullable',
            'file_upload8' => 'nullable',
            'file_upload9' => 'nullable',
            'file_homework' => 'nullable',
            'file_homework1' => 'nullable',
            'file_homework2' => 'nullable',
            'file_homework3' => 'nullable',
            'file_homework4' => 'nullable',
            'file_homework5' => 'nullable',
            'file_homework6' => 'nullable',
            'file_homework7' => 'nullable',
            'file_homework8' => 'nullable',
            'file_homework9' => 'nullable',
            'file_conversation' => 'nullable',
        ]);

        if ($request->hasFile('file_upload'))
        {
            $fileNameWithExt = $request->file('file_upload')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('file_upload')->getClientOriginalExtension();
            $fileNameToStore = $fileName . '.' . rand(1, 999) . '.' . $extension;
            $path = $request->file('file_upload')->storeAs('public/file_upload', $fileNameToStore);
        } else {
            $fileNameToStore = '';
        }

        if ($request->hasFile('file_upload1'))
        {
            $fileNameWithExt = $request->file('file_upload1')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('file_upload1')->getClientOriginalExtension();
            $fileNameToStore1 = $fileName . '.' . rand(1, 999) . '.' . $extension;
            $path = $request->file('file_upload1')->storeAs('public/file_upload', $fileNameToStore1);
        } else {
            $fileNameToStore1 = '';
        }

        if ($request->hasFile('file_upload2'))
        {
            $fileNameWithExt = $request->file('file_upload2')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('file_upload2')->getClientOriginalExtension();
            $fileNameToStore2 = $fileName . '.' . rand(1, 999) . '.' . $extension;
            $path = $request->file('file_upload2')->storeAs('public/file_upload', $fileNameToStore2);
        } else {
            $fileNameToStore2 = '';
        }

        if ($request->hasFile('file_upload3'))
        {
            $fileNameWithExt = $request->file('file_upload3')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('file_upload3')->getClientOriginalExtension();
            $fileNameToStore3 = $fileName . '.' . rand(1, 999) . '.' . $extension;
            $path = $request->file('file_upload3')->storeAs('public/file_upload', $fileNameToStore3);
        } else {
            $fileNameToStore3 = '';
        }

        if ($request->hasFile('file_upload4'))
        {
            $fileNameWithExt = $request->file('file_upload4')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('file_upload4')->getClientOriginalExtension();
            $fileNameToStore4 = $fileName . '.' . rand(1, 999) . '.' . $extension;
            $path = $request->file('file_upload4')->storeAs('public/file_upload', $fileNameToStore4);
        } else {
            $fileNameToStore4 = '';
        }

        if ($request->hasFile('file_upload5'))
        {
            $fileNameWithExt = $request->file('file_upload5')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('file_upload5')->getClientOriginalExtension();
            $fileNameToStore5 = $fileName . '.' . rand(1, 999) . '.' . $extension;
            $path = $request->file('file_upload5')->storeAs('public/file_upload', $fileNameToStore5);
        } else {
            $fileNameToStore5 = '';
        }

        if ($request->hasFile('file_upload6'))
        {
            $fileNameWithExt = $request->file('file_upload6')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('file_upload6')->getClientOriginalExtension();
            $fileNameToStore6 = $fileName . '.' . rand(1, 999) . '.' . $extension;
            $path = $request->file('file_upload6')->storeAs('public/file_upload', $fileNameToStore6);
        } else {
            $fileNameToStore6 = '';
        }

        if ($request->hasFile('file_upload7'))
        {
            $fileNameWithExt = $request->file('file_upload7')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('file_upload7')->getClientOriginalExtension();
            $fileNameToStore7 = $fileName . '.' . rand(1, 999) . '.' . $extension;
            $path = $request->file('file_upload7')->storeAs('public/file_upload', $fileNameToStore7);
        } else {
            $fileNameToStore7 = '';
        }

        if ($request->hasFile('file_upload8'))
        {
            $fileNameWithExt = $request->file('file_upload8')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('file_upload8')->getClientOriginalExtension();
            $fileNameToStore8 = $fileName . '.' . rand(1, 999) . '.' . $extension;
            $path = $request->file('file_upload8')->storeAs('public/file_upload', $fileNameToStore8);
        } else {
            $fileNameToStore8 = '';
        }

        if ($request->hasFile('file_upload9'))
        {
            $fileNameWithExt = $request->file('file_upload9')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('file_upload9')->getClientOriginalExtension();
            $fileNameToStore9 = $fileName . '.' . rand(1, 999) . '.' . $extension;
            $path = $request->file('file_upload9')->storeAs('public/file_upload', $fileNameToStore9);
        } else {
            $fileNameToStore9 = '';
        }

        if ($request->hasFile('file_homework'))
        {
            $fileNameWithExt = $request->file('file_homework')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('file_homework')->getClientOriginalExtension();
            $fileNameToStoreH = $fileName . '.' . rand(1, 999) . '.' . $extension;
            $path = $request->file('file_homework')->storeAs('public/file_upload', $fileNameToStoreH);
        } else {
            $fileNameToStoreH = '';
        }

        if ($request->hasFile('file_homework1'))
        {
            $fileNameWithExt = $request->file('file_homework1')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('file_homework1')->getClientOriginalExtension();
            $fileNameToStoreH1 = $fileName . '.' . rand(1, 999) . '.' . $extension;
            $path = $request->file('file_homework1')->storeAs('public/file_upload', $fileNameToStoreH1);
        } else {
            $fileNameToStoreH1 = '';
        }

        if ($request->hasFile('file_homework2'))
        {
            $fileNameWithExt = $request->file('file_homework2')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('file_homework2')->getClientOriginalExtension();
            $fileNameToStoreH2 = $fileName . '.' . rand(1, 999) . '.' . $extension;
            $path = $request->file('file_homework2')->storeAs('public/file_upload', $fileNameToStoreH2);
        } else {
            $fileNameToStoreH2 = '';
        }

        if ($request->hasFile('file_homework3'))
        {
            $fileNameWithExt = $request->file('file_homework3')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('file_homework3')->getClientOriginalExtension();
            $fileNameToStoreH3 = $fileName . '.' . rand(1, 999) . '.' . $extension;
            $path = $request->file('file_homework3')->storeAs('public/file_upload', $fileNameToStoreH3);
        } else {
            $fileNameToStoreH3 = '';
        }

        if ($request->hasFile('file_homework4'))
        {
            $fileNameWithExt = $request->file('file_homework4')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('file_homework4')->getClientOriginalExtension();
            $fileNameToStoreH4 = $fileName . '.' . rand(1, 999) . '.' . $extension;
            $path = $request->file('file_homework4')->storeAs('public/file_upload', $fileNameToStoreH4);
        } else {
            $fileNameToStoreH4 = '';
        }

        if ($request->hasFile('file_homework5'))
        {
            $fileNameWithExt = $request->file('file_homework5')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('file_homework5')->getClientOriginalExtension();
            $fileNameToStoreH5 = $fileName . '.' . rand(1, 999) . '.' . $extension;
            $path = $request->file('file_homework5')->storeAs('public/file_upload', $fileNameToStoreH5);
        } else {
            $fileNameToStoreH5 = '';
        }

        if ($request->hasFile('file_homework6'))
        {
            $fileNameWithExt = $request->file('file_homework6')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('file_homework6')->getClientOriginalExtension();
            $fileNameToStoreH6 = $fileName . '.' . rand(1, 999) . '.' . $extension;
            $path = $request->file('file_homework6')->storeAs('public/file_upload', $fileNameToStoreH6);
        } else {
            $fileNameToStoreH6 = '';
        }

        if ($request->hasFile('file_homework7'))
        {
            $fileNameWithExt = $request->file('file_homework7')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('file_homework7')->getClientOriginalExtension();
            $fileNameToStoreH7 = $fileName . '.' . rand(1, 999) . '.' . $extension;
            $path = $request->file('file_homework7')->storeAs('public/file_upload', $fileNameToStoreH7);
        } else {
            $fileNameToStoreH7 = '';
        }

        if ($request->hasFile('file_homework8'))
        {
            $fileNameWithExt = $request->file('file_homework8')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('file_homework8')->getClientOriginalExtension();
            $fileNameToStoreH8 = $fileName . '.' . rand(1, 999) . '.' . $extension;
            $path = $request->file('file_homework8')->storeAs('public/file_upload', $fileNameToStoreH8);
        } else {
            $fileNameToStoreH8 = '';
        }

        if ($request->hasFile('file_homework9'))
        {
            $fileNameWithExt = $request->file('file_homework9')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('file_homework9')->getClientOriginalExtension();
            $fileNameToStoreH9 = $fileName . '.' . rand(1, 999) . '.' . $extension;
            $path = $request->file('file_homework9')->storeAs('public/file_upload', $fileNameToStoreH9);
        } else {
            $fileNameToStoreH9 = '';
        }

        if ($request->hasFile('file_conversation'))
        {
            $fileNameWithExt = $request->file('file_conversation')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('file_conversation')->getClientOriginalExtension();
            $fileNameToStoreC = $fileName . '.' . rand(1, 999) . '.' . $extension;
            $path = $request->file('file_conversation')->storeAs('public/file_upload', $fileNameToStoreC);
        } else {
            $fileNameToStoreC = '';
        }

        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->folder_id = $request->input('folder');
        $post->user_id = auth()->user()->id;
        if($request->hasFile('file_upload')){
            Storage::delete('public/file_upload/' . $post->file_upload);
            $post->file_upload = $fileNameToStore;
        }
        if($request->hasFile('file_upload1')){
            Storage::delete('public/file_upload/' . $post->file_upload1);
            $post->file_upload1 = $fileNameToStore1;
        }
        if($request->hasFile('file_upload2')){
            Storage::delete('public/file_upload/' . $post->file_upload2);
            $post->file_upload2 = $fileNameToStore2;
        }
        if($request->hasFile('file_upload3')){
            Storage::delete('public/file_upload/' . $post->file_upload3);
            $post->file_upload3 = $fileNameToStore3;
        }
        if($request->hasFile('file_upload4')){
            Storage::delete('public/file_upload/' . $post->file_upload4);
            $post->file_upload4 = $fileNameToStore4;
        }
        if($request->hasFile('file_upload5')){
            Storage::delete('public/file_upload/' . $post->file_upload5);
            $post->file_upload5 = $fileNameToStore5;
        }
        if($request->hasFile('file_upload6')){
            Storage::delete('public/file_upload/' . $post->file_upload6);
            $post->file_upload6 = $fileNameToStore6;
        }
        if($request->hasFile('file_upload7')){
            Storage::delete('public/file_upload/' . $post->file_upload7);
            $post->file_upload7 = $fileNameToStore7;
        }
        if($request->hasFile('file_upload8')){
            Storage::delete('public/file_upload/' . $post->file_upload8);
            $post->file_upload8 = $fileNameToStore8;
        }
        if($request->hasFile('file_upload9')){
            Storage::delete('public/file_upload/' . $post->file_upload9);
            $post->file_upload9 = $fileNameToStore9;
        }
        if($request->hasFile('file_homework')){
            Storage::delete('public/file_upload/' . $post->file_homework);
            $post->file_homework = $fileNameToStoreH;
        }
        if($request->hasFile('file_homework1')){
            Storage::delete('public/file_upload/' . $post->file_homework1);
            $post->file_homework1 = $fileNameToStoreH1;
        }
        if($request->hasFile('file_homework2')){
            Storage::delete('public/file_upload/' . $post->file_homework2);
            $post->file_homework2 = $fileNameToStoreH2;
        }
        if($request->hasFile('file_homework3')){
            Storage::delete('public/file_upload/' . $post->file_homework3);
            $post->file_homework3 = $fileNameToStoreH3;
        }
        if($request->hasFile('file_homework4')){
            Storage::delete('public/file_upload/' . $post->file_homework4);
            $post->file_homework4 = $fileNameToStoreH4;
        }
        if($request->hasFile('file_homework5')){
            Storage::delete('public/file_upload/' . $post->file_homework5);
            $post->file_homework5 = $fileNameToStoreH5;
        }
        if($request->hasFile('file_homework6')){
            Storage::delete('public/file_upload/' . $post->file_homework6);
            $post->file_homework6 = $fileNameToStoreH6;
        }
        if($request->hasFile('file_homework7')){
            Storage::delete('public/file_upload/' . $post->file_homework7);
            $post->file_homework7 = $fileNameToStoreH7;
        }
        if($request->hasFile('file_homework8')){
            Storage::delete('public/file_upload/' . $post->file_homework8);
            $post->file_homework8 = $fileNameToStoreH8;
        }
        if($request->hasFile('file_homework9')){
            Storage::delete('public/file_upload/' . $post->file_homework9);
            $post->file_homework9 = $fileNameToStoreH9;
        }
        if($request->hasFile('file_conversation')){
            Storage::delete('public/file_upload/' . $post->file_conversation);
            $post->file_conversation = $fileNameToStoreC;
        }
        $post->color = $request->input('color');
        $post->save();

        return redirect()->route('posts.index');
    }

    public function delete(Post $post) {


        if ($post->file_upload) {
            Storage::delete('public/file_upload/' . $post->file_upload);
        }
        if ($post->file_upload1) {
            Storage::delete('public/file_upload/' . $post->file_upload1);
        }
        if ($post->file_upload2) {
            Storage::delete('public/file_upload/' . $post->file_upload2);
        }
        if ($post->file_upload3) {
            Storage::delete('public/file_upload/' . $post->file_upload3);
        }
        if ($post->file_upload4) {
            Storage::delete('public/file_upload/' . $post->file_upload4);
        }
        if ($post->file_upload5) {
            Storage::delete('public/file_upload/' . $post->file_upload5);
        }
        if ($post->file_upload6) {
            Storage::delete('public/file_upload/' . $post->file_upload6);
        }
        if ($post->file_upload7) {
            Storage::delete('public/file_upload/' . $post->file_upload7);
        }
        if ($post->file_upload8) {
            Storage::delete('public/file_upload/' . $post->file_upload8);
        }
        if ($post->file_upload9) {
            Storage::delete('public/file_upload/' . $post->file_upload9);
        }
        if ($post->file_homework) {
            Storage::delete('public/file_upload/' . $post->file_homework);
        }
        if ($post->file_homework1) {
            Storage::delete('public/file_upload/' . $post->file_homework1);
        }
        if ($post->file_homework2) {
            Storage::delete('public/file_upload/' . $post->file_homework2);
        }
        if ($post->file_homework3) {
            Storage::delete('public/file_upload/' . $post->file_homework3);
        }
        if ($post->file_homework4) {
            Storage::delete('public/file_upload/' . $post->file_homework4);
        }
        if ($post->file_homework5) {
            Storage::delete('public/file_upload/' . $post->file_homework5);
        }
        if ($post->file_homework6) {
            Storage::delete('public/file_upload/' . $post->file_homework6);
        }
        if ($post->file_homework7) {
            Storage::delete('public/file_upload/' . $post->file_homework7);
        }
        if ($post->file_homework8) {
            Storage::delete('public/file_upload/' . $post->file_homework8);
        }
        if ($post->file_homework9) {
            Storage::delete('public/file_upload/' . $post->file_homework9);
        }
        if ($post->file_conversation) {
            Storage::delete('public/file_upload/' . $post->file_conversation);
        }

        $post->delete();

        return redirect()->route('posts.index');
    }

    public function deleteFromFolders(Post $post) {
        if ($post->file_upload) {
            Storage::delete('public/file_upload/' . $post->file_upload);
        }
        if ($post->file_upload1) {
            Storage::delete('public/file_upload/' . $post->file_upload1);
        }
        if ($post->file_upload2) {
            Storage::delete('public/file_upload/' . $post->file_upload2);
        }
        if ($post->file_upload3) {
            Storage::delete('public/file_upload/' . $post->file_upload3);
        }
        if ($post->file_upload4) {
            Storage::delete('public/file_upload/' . $post->file_upload4);
        }
        if ($post->file_upload5) {
            Storage::delete('public/file_upload/' . $post->file_upload5);
        }
        if ($post->file_upload6) {
            Storage::delete('public/file_upload/' . $post->file_upload6);
        }
        if ($post->file_upload7) {
            Storage::delete('public/file_upload/' . $post->file_upload7);
        }
        if ($post->file_upload8) {
            Storage::delete('public/file_upload/' . $post->file_upload8);
        }
        if ($post->file_upload9) {
            Storage::delete('public/file_upload/' . $post->file_upload9);
        }
        if ($post->file_homework) {
            Storage::delete('public/file_upload/' . $post->file_homework);
        }
        if ($post->file_homework1) {
            Storage::delete('public/file_upload/' . $post->file_homework1);
        }
        if ($post->file_homework2) {
            Storage::delete('public/file_upload/' . $post->file_homework2);
        }
        if ($post->file_homework3) {
            Storage::delete('public/file_upload/' . $post->file_homework3);
        }
        if ($post->file_homework4) {
            Storage::delete('public/file_upload/' . $post->file_homework4);
        }
        if ($post->file_homework5) {
            Storage::delete('public/file_upload/' . $post->file_homework5);
        }
        if ($post->file_homework6) {
            Storage::delete('public/file_upload/' . $post->file_homework6);
        }
        if ($post->file_homework7) {
            Storage::delete('public/file_upload/' . $post->file_homework7);
        }
        if ($post->file_homework8) {
            Storage::delete('public/file_upload/' . $post->file_homework8);
        }
        if ($post->file_homework9) {
            Storage::delete('public/file_upload/' . $post->file_homework9);
        }
        if ($post->file_conversation) {
            Storage::delete('public/file_upload/' . $post->file_conversation);
        }

        $post->delete();

        return redirect()->route('folders.index');
    }
}
