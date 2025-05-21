
<span class="switch switch-icon">
		<label>
			<input type="checkbox"
                   {{$instance->is_active?'checked':''}}
                   data-url="{{ route('panel.lectures.operation' , ['id'=>$instance->id]) }}"
                   class="operation">
			<span></span>
		</label>
</span>



