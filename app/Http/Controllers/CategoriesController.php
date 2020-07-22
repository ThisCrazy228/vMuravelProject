<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCategoriesRequest;
use App\Models\CategoriesModel;
use App\Models\UsersModel;
use Illuminate\Http\Request;

Class CategoriesController extends Controller {

    //Функция подсчитывает кол-во уникальных пользователей (по IP), посетивших сайт.
    public static function getUsersCount() {
        $users = UsersModel::all();
        $count = [
            'Chrome' => 0,
            'Firefox' => 0,
            'Internet Explorer' => 0,
            'Opera' => 0,
            'Edge' => 0,
            'Safari' => 0
        ];
        foreach ($users as $user) {
            if (array_key_exists($user->browser, $count)) {
                $count[$user->browser]++;
            }
        }
        return $count;
    }

    public function showPage(Request $request) {
        $categories = CategoriesModel::all();
        //Код ниже сохраняет IP и browser-name пользователя, если он впервые посетил сайт.
        $user = UsersModel::where('ip', $request->getClientIp())->first();
        if ($user == NULL) {
            $user = new UsersModel();
            $user->ip = $request->getClientIp();
            $user->browser = get_browser($request->header('User-Agent'))->browser;
            $user->save();
        }

        return view('categories.categories', ['categories' => $categories, 'browsers' => $this->getUsersCount()]);
    }

    public function showCreatePage() {
        return view('categories.create', ['browsers' => $this->getUsersCount()]);
    }

    public function showEditPage($id, Request $request) {
        $category = CategoriesModel::where('id', $id)->first();
        return view('categories.edit', ['category' => $category, 'browsers' => $this->getUsersCount()]);
    }

    public function createCategory(CreateCategoriesRequest $request) {
        $name = $request->input('name');
        $description = $request->input('description');

        $model = new CategoriesModel();
        $model->name = $name;
        $model->description = $description;
        $model->save();
        return redirect()->route('categories-page', ['browsers' => $this->getUsersCount()])->with('success', 'Категория "' . $name . '" была успешно создана!');
    }

    public function editCategory($id, CreateCategoriesRequest $request) {
        $name = $request->input('name');
        $description = $request->input('description');

        $category = CategoriesModel::where('id', $id)->first();

        $category->name = $name;
        $category->description = $description;
        $category->save();

        return redirect()->route('categories-page', ['browsers' => $this->getUsersCount()])->with('success', 'Категория №' . $id . ' была успешно обновлена!');
    }

    public function deleteCategory($id, Request $request) {
        $category = CategoriesModel::where('id', $id);
        $category->delete();

        return redirect()->route('categories-page', ['browsers' => $this->getUsersCount()])->with('success', 'Категория №' . $id . ' была успешно удалена!');
    }

}
