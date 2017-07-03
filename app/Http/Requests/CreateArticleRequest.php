<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

//use App\Article;

use Illuminate\Support\Facades\Auth;

class CreateArticleRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
//        /dd($this->route('article'));
        $articleId = $this->route('article')->user_id;
        if($articleId == Auth::id()){
            return true;
        }
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|min:6',
            'body' => 'required|min:10',
            'published_at' => 'required|date'
        ];
    }
}
