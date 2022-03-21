<?php


namespace App\Interfaces;


interface AttendancesStudentRepositoryInterface
{

    public function index();

    public function show($id);

    public function store($request);

    public function edit($request);

    public function update($request);

    public function destroy($request);

}
