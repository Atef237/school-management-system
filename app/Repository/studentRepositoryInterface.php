<?php

namespace App\Repository;


interface studentRepositoryInterface {


    public function create_student();

    public function get_schoole_years($id);

    public function get_Classrooms($id);

    public function saveStudent($request);

    public function get_students();

    public function edit_student($id);

    public function update_student($request);

    public function delete_student($id);

}
