<a class="btn btn-sm btn-clean btn-icon btn-icon-md" href="{{route('panel.courses.edit',$instance->id)}}"
    title="@lang('constants.edit')"><i class="flaticon2-edit"></i> </a>

<a class="btn btn-sm btn-clean btn-icon btn-icon-md"
    href="{{ route('panel.lectures.index', ['course_id' => $instance->id]) }}"
    title="@lang('constants.lectures')">
    <i class="fas fa-chalkboard-teacher"></i>
</a>

<a class="btn btn-sm btn-clean btn-icon btn-icon-md delete" href=""
    data-url="{{route('panel.courses.destroy',$instance->id)}}" title="@lang('constants.delete')"><i
        class="flaticon2-delete"></i> </a>
