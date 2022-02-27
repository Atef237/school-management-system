<?php


namespace App\Interfaces;


interface ProcessingFeeRepositoryInterface
{


    public function index();

    public function edit($id);

    public function show($id);

    public function store($request);

    public function update($request);

    public function destroy($request);

}
