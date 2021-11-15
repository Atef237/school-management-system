<div class="modal fade" id="editModal{{ $School_year->id }}" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                    id="exampleModalLabel">
                    {{ trans('classroom.edit_class') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- edit_form -->
                <form action="{{route('school_year.update','test')}}" method="post">
                    {{ method_field('patch') }}
                    @csrf
                    <div class="row">
                        <div class="col">
                            <label for="Name"
                                   class="mr-sm-2">{{ trans('school_year.year_name_ar') }}
                                :</label>
                            <input id="Name" type="text" name="Name"
                                   class="form-control"
                                   value="{{ $School_year->getTranslation('name', 'ar') }}"
                                   required>
                            <input id="id" type="hidden" name="id" class="form-control"
                                   value="{{ $School_year->id }}">
                        </div>
                        <div class="col">
                            <label for="Name_en"
                                   class="mr-sm-2">{{ trans('school_year.year_name_en') }}
                                :</label>
                            <input type="text" class="form-control"
                                   value="{{ $School_year->getTranslation('name', 'en') }}"
                                   name="Name_en" required>
                        </div>
                    </div><br>
                    <div class="form-group">
                        <label
                            for="exampleFormControlTextarea1">{{ trans('Grades_list.name') }}
                            :</label>
                        <select class="form-control form-control-lg"
                                id="exampleFormControlSelect1" name="Grade_id">

                            @foreach ($grades as $grade)
                                <option value="{{ $grade->id }}" @if($grade->id == $School_year->grade->id ) selected @endif >
                                    {{ $grade->name }}
                                </option>
                            @endforeach
                        </select>

                    </div>
                    <br><br>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                                data-dismiss="modal">{{ trans('school_year.Close') }}</button>
                        <button type="submit"
                                class="btn btn-success">{{ trans('school_year.submit') }}</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
