<?php

namespace App\Http\Controllers\Panel;

use App\Constants\StatusCodes;
use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\AdminRequest;
use App\Http\Requests\Panel\BlogRequest;
use App\Http\Requests\Panel\CourseRequest;
use App\Http\Requests\Panel\LectureRequest;
use App\Http\Resources\Panel\AdminResource;
use App\Http\Resources\Panel\BlogResource;
use App\Http\Resources\Panel\CourseResource;
use App\Http\Resources\Panel\FaqResource;
use App\Http\Resources\Panel\LectureResource;
use App\Models\Admin;
use App\Models\Blog;
use App\Models\Course;
use App\Models\Faq;
use App\Models\Lecture;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class LectureController extends Controller
{
    public function index($course_id)
    {
        $course = Course::find($course_id);
        return view('panel.lectures.index', compact('course'));
    }

    public function datatable($id)
    {
        $lectures = Lecture::with(['translation'])
        ->where('course_id', $id)
        ->latest()
        ->filter();

        return filterDataTable($lectures, LectureResource::class, request());
    }

    public function create($id)
    {
        $course = Course::findOrFail($id);
        return view('panel.lectures.create',compact('course'));
    }

    public function store(LectureRequest $request,$id)
    {

        $data = $request->all();
        $data['course_id'] = $id;
        Lecture::query()->create($data)->createTranslation($request);
        return response()->json([
            'status' => true,
            'message' => __('messages.done_successfully')
        ]);
    }


    public function edit($id)
    {
        $data['item'] = Lecture::query()->findOrFail($id);
        return view('panel.lectures.edit', $data);

    }

    public function update($id, LectureRequest $request)
    {
        $item = Lecture::query()->find($id);
        if (!$item) {
            return response()->json([
                'status' => false,
                'message' => __('messages.not_found')
            ], 404);
        }
        $data = $request->all();

        $item->update($data);
        $item->createTranslation($request);

        return response()->json([
            'status' => true,
            'message' => __('messages.done_successfully')
        ]);

    }

    public function destroy($id)
    {
        $item = Lecture::query()->find($id);

        if (isset($item) && $item->delete()) {
            return response()->json([
                'status' => true,
                'message' => __('messages.deleted_successfully')
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => __('messages.error')
            ], 500);
        }
    }


    public function operation($id)
    {
        $item = Lecture::query()->find($id);
        if (isset($item)) {
            $item->is_active = !$item->is_active;
            $item->save();
            return response()->json([
                'status' => true,
                'message' => __('messages.done_successfully')
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => __('messages.error')
            ], 500);
        }
    }
}
