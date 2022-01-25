<?php

namespace App\Repository;


interface TeacherRepositoryInterface {

    public function getAllTeacher();

    public function GetSpecialization();

    public function GetGender();

    public function SaveTeacher($request);

    public function editTeacher($id);

    public function updateTeacher($id);

    public function DeleteTeacher($id);

}
