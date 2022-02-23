<?php


namespace App\Interfaces;


interface FeeInvoicesRepositoryInterface
{
    public function index();

    public function show($id);

    public function store($request);

    public function edit($id);

    public function update($request);

    public function destroy($request);



}
