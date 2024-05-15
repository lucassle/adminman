<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest {
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules() {
        return [
            'project_id'    => 'required|exists:projects,id',
            'person_id'     => 'required|exists:people,id',
            'start_time'    => 'required|date',
            'end_time'      => 'required|date|after_or_equal:start_time',
            'priority'      => 'nullable|integer|between:1,3',
            'name'          => 'required|string|max:255',
            'description'   => 'nullable|string',
            'status'        => 'nullable|integer|between:1,4',
        ];
    }
}
