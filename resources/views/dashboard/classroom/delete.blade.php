<!-- delete_modal_Grade -->
<div class="modal fade" id="delete{{ $classroom->id }}" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                    id="exampleModalLabel">
                    {{ trans('classroom.delete_class') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form
                    action="{{ route('classroom.destroy', 'test') }}"
                    method="post">
                    {{ method_field('Delete') }}
                    {{ csrf_field() }}>

                    {{ trans('classroom.Warning_class') }}
                    <label >{{ $classroom->name }}</label>

                    <input id="id" type="hidden" name="id" value="{{ $classroom->id }}">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                                data-dismiss="modal">{{ trans('classroom.Close') }}</button>
                        <button type="submit"
                                class="btn btn-danger">{{ trans('classroom.delete') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
