<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

Class CreatePostsRequest extends FormRequest {

    public function authorize()
    {
        return true;
    }
    public function rules() {
        return [
            'name' => 'required',
            'content' => 'required',
            'file' => 'max:2000',
        ];
        //Ограничение на размер файла стоит, но, почему-то, валидация SUCCESS при её нарушении :/
    }

    public function messages() {
        return [
            'name.required' => 'Поле с названием должно быть заполнено!',
            'content.required' => 'Поле с описанием категории должно быть заполнено!',
            'file.max' => 'Размер файла не должен превышать 2 Мб!'
        ];
    }
}
