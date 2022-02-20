<?php


namespace App\Repository;


interface StudentGraduatedRepositoryInterface
{

    public function index();

    public function create();

    public function softDelete($request);

    public function student_retreat($request);

    public function finalDelete($request);


}
