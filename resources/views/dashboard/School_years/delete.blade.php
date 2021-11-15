<div class="modal fade" id="delete{{ $School_year->id }}" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                    id="exampleModalLabel">
                    {{ trans('school_year.delete') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('school_year.destroy','test')}}"
                      method="post">
                    {{ method_field('Delete') }}
                    @csrf
                    {{ trans('school_year.Warning_year') }}
                    <input id="id" type="hidden" name="id" class="form-control"
                           value="{{ $School_year->id }}">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                                data-dismiss="modal">{{ trans('school_year.Close') }}</button>
                        <button type="submit"
                                class="btn btn-danger">{{ trans('school_year.delete') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
