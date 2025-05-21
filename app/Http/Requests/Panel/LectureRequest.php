<?php

namespace App\Http\Requests\Panel;

use Illuminate\Foundation\Http\FormRequest;

class LectureRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth('admin')->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $youtubeRule = function ($attribute, $value, $fail) {
        if (!preg_match('/^(https?\:\/\/)?(www\.youtube\.com|youtu\.?be)\/.+$/', $value)) {
                $fail(__('The video URL must be a valid YouTube link.'));
            }
        };

        $rules = [
        'course_id' => $this->isMethod('post') ? 'required|exists:courses,id' : 'nullable|exists:courses,id',
        'video_url' => [
            $this->isMethod('post') ? 'required' : 'nullable',
            'url',
            $youtubeRule,
        ],
    ];

    foreach (locales() as $key => $lang) {
        $rules['title_' . $key] = 'required|string|max:255';
        $rules['description_' . $key] = 'required|string';
    }

    return $rules;
    }

    public function attributes()
    {
        $attrs = [
            'video_url' => __('constants.video')
        ];
        foreach (locales() as $key=>$lang){
            $attrs['title_'.$key] = __('panel.title') . '('. $lang .')';
            $attrs['description_'.$key] = __('constants.description') . '('. $lang .')';
        }

        return  $attrs;
    }
}
