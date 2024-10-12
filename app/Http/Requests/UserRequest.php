<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255', 'min:3'],
            'email' => ['required', 'email', 'max:255', 'unique:users'],
            'nid' => ['required', 'string', 'max:20', 'min:10', 'unique:users', 'regex:/^[0-9]+$/'],
            'venue_id' => ['required', 'integer', 'exists:venues,id'],
        ];
    }

    /**
     * Get the custom validation messages.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Please enter your name',
            'name.max' => 'Name must within 255 characters',
            'name.min' => 'Name at least 3 characters',

            'email.required' => 'Please enter your email address.',
            'email.email' => 'The email address is invalid.',
            'email.unique' => 'The email address is already registered.',
            
            'nid.required' => 'The NID is required.',
            'nid.unique' => 'The NID is already registered.',
            'nid.max' => 'The NID is should be maximum 20 characters long.',
            'nid.min' => 'The NID is must be at least 10 characters long.',
            'nid.regex' => 'Your NID must contain 0 to 9',

           'venue_id.required' => 'The Venue is required. Please select your venue.',
           'venue_id.exists' => 'Your Venue is not in our system.',
        ];
    }
}
