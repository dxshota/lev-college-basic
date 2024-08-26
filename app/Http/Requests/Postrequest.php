<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Postrequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'post.title' => 'required|string|max:100', //書式：'キー名' => 'ルール1|ルール2|ルール3'
            'post.body' => 'required|string|max:4000',  //キー名はHTML上Formのname属性。post[title]など入れ子になっている場合は.（ドット）で繋ぎます。
        ];
    }
}
