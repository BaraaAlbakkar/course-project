<a class="btn btn-sm btn-clean btn-icon btn-icon-md" href="{{route('panel.lectures.edit',$instance->id)}}"
   title="@lang('constants.edit')"><i class="flaticon2-edit"></i> </a>

<a class="btn btn-sm btn-clean btn-icon btn-icon-md"
   href="{{ $instance->video_url }}"
   title="@lang('constants.view_lectures')" target="_blank">
    <i class="fas fa-chalkboard-teacher"></i>
</a>


<a class="btn btn-sm btn-clean btn-icon btn-icon-md delete" href=""
   data-url="{{route('panel.lectures.destroy',$instance->id)}}" title="@lang('constants.delete')"><i
        class="flaticon2-delete"></i> </a>
