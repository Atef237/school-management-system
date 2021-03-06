<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    {{trans('school_year.add_class') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form class=" row mb-30" action="{{route('school_year.store')}}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="repeater">
                            <div data-repeater-list="ListSchoolYears">
                                <div data-repeater-item>
                                    <div class="row">

                                        <div class="col">
                                            <label for="Name"
                                                   class="mr-sm-2">{{trans('school_year.year_name_ar') }}
                                                :</label>
                                            <input value="{{old('name')}}" class="form-control" type="text" name="name" />
                                        </div>


                                        <div class="col">
                                            <label for="Name"
                                                   class="mr-sm-2">{{trans('school_year.year_name_en') }}
                                                :</label>
                                            <input value="{{old('name_en')}}" class="form-control" type="text" name="name_en" />
                                        </div>


                                        <div class="col">
                                            <label for="Name_en"
                                                   class="mr-sm-2">{{ trans('Grades_list.name') }}
                                                :</label>

                                            <div class="box">
                                                <select class="fancyselect" name="Grade_id">
                                                    @foreach ($grades as $grade)
                                                        <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                        </div>

                                        <div class="col">
                                            <label for="Name_en"
                                                   class="mr-sm-2">{{trans('school_year.action') }}
                                                :</label>
                                            <input class="btn btn-danger btn-block" data-repeater-delete
                                                   type="button" value="{{trans('school_year.delete') }}" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-20">
                                <div class="col-12">
                                    <input class="button" data-repeater-create type="button" value="{{trans('school_year.add_school_year') }}"/>
                                </div>

                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal">{{trans('school_year.Close') }}</button>
                                <button type="submit"
                                        class="btn btn-success">{{trans('school_year.submit') }}</button>
                            </div>


                        </div>
                    </div>
                </form>
            </div>


        </div>

    </div>
</div>
