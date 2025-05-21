<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

class Lecture extends Model
{
    use SoftDeletes, Translatable;

    public $translationModel = LectureTranslation::class;
    public $translatedAttributes = ['title', 'description'];
    protected $fillable = [
        'course_id',
        'is_active',
        'type',
        'video_url',
        'file_path',
        'order',
    ];

    public function createTranslation(Request $request)
    {
        foreach (locales() as $key => $language) {
            foreach ($this->translatedAttributes as $attribute) {
                if ($request->get($attribute . '_' . $key) != null && !empty($request->$attribute . $key)) {
                    $this->{$attribute . ':' . $key} = $request->get($attribute . '_' . $key);
                }
            }
            $this->save();
        }
        return $this;
    }

    public function scopeFilter($q)
    {
        $request = request();
        $query = $request->get('query', []);

        if (isset($query['generalSearch'])) {
            $q->whereTranslationLike('title', '%' . $query['generalSearch'] . '%')
                ->orwhereTranslationLike('description', '%' . $query['generalSearch'] . '%');
        }
    }

    public function course(){
        return $this->belongsTo(Course::class);
    }
}
