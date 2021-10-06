<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class AfiliateRequest extends FormRequest
{

    public function authorize(){

        return true;

    }

    public function rules(){


        $rules = [
            'name' => 'required|max:100'
        ];

        return $rules;

    }








}