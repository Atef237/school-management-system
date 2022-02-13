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

    public function show($id);

    public function Upload_attachment($request);

    public function Download_attachement($studentName, $fileName);

    public function delete_attachment($request);


}
