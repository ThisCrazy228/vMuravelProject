<?php

namespace App\Http\Controllers;

use App\Models\PostsModel;
use App\Http\Requests\CreatePostsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

Class PostsController extends Controller {

    public function showPage($id, Request $request) {
        $posts = PostsModel::where('category_id', $id)->get();

        return view('posts.posts', ['posts' => $posts, 'category_id' => $id, 'browsers' => CategoriesController::getUsersCount()]);
    }

    public function showPostPage($ids) {
        $id = explode('_', $ids);
        $post = PostsModel::where('id', $id[1])->first();
        return view('posts.post', ['category_id' => $id[0], 'post' => $post, 'browsers' => CategoriesController::getUsersCount()]);
    }

    public function showCreatePage($category_id, Request $request) {
        return view('posts.create', ['category_id' => $category_id, 'browsers' => CategoriesController::getUsersCount()]);
    }

    public function showEditPage($id, Request $request) {
        $post = PostsModel::where('category_id', $id)->first();
        return view('posts.edit', ['post' => $post, 'category_id' => $id, 'browsers' => CategoriesController::getUsersCount()]);
    }

    public function createPost($category_id, CreatePostsRequest $request) {
        $name = $request->input('name');
        $content = $request->input('content');

        $model = new PostsModel();
        $model->category_id = $category_id;
        $model->name = $name;
        $model->content = $content;
        if ($request->file('file') !== NULL) {
            $path = Storage::disk('public')->putFile('', $request->file('file'));
            $url = Storage::url($path);
            $model->file = $url;
        }
        $model->save();
        return redirect()->route('posts-page', ['id' => $category_id, 'browsers' => CategoriesController::getUsersCount()])->with('success', 'Пост "' . $name . '" был успешно добавлен в категорию ID: ' . $category_id);
    }

    public function editPost($ids, CreatePostsRequest $request) {
        $name = $request->input('name');
        $content = $request->input('content');
        $id = explode('_', $ids);

        $post = PostsModel::where('id', $id[1])->first();

        $post->name = $name;
        $post->content = $content;
        if ($request->file('file') !== NULL) {
            $path = Storage::disk('public')->putFile('', $request->file('file'));
            $url = Storage::url($path);
            $post->file = $url;
        }
        $post->save();

        return redirect()->route('posts-page', ['id' => $id[0], 'browsers' => CategoriesController::getUsersCount()])->with('success', 'Пост №' . $id[1] . ' был успешно обновлён!');
    }

    public function deletePost($id, Request $request) {
        $post = PostsModel::where('id', $id)->first();
        $category_id = $post->category_id;
        $post->delete();

        return redirect()->route('posts-page', ['id' => $category_id, 'browsers' => CategoriesController::getUsersCount()])->with('success', 'Пост №' . $id . ' был успешно удалён!');
    }

}
