<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class SolicitudRequest extends FormRequest
{

    public function authorize(){

        return true;

    }

    public function rules(){


        $rules = [
           
        ];

        return $rules;

    }








}