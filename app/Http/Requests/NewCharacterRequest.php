<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\IAmHuman;

class NewCharacterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'username' => 'required|string',
            'age' => 'required|string',
            'origin' => 'required|string',
            'job' => 'required|string,'
            'personality' => 'required|string',
            'description' => 'required|string',
            'history' => 'required|string',
            'powers' => 'required|string',
            'channeler' => 'required|boolean',
            'op_strength' => 'required_if:channeler,1|integer|min:1|max:42',
            'experience' => 'required_if:channeler,1|in:new,adept,expert,master',
            'reborn_god' => 'nullable|string',
            'series_author_name' => ['required', IAmHuman]
        ];
    }
}
