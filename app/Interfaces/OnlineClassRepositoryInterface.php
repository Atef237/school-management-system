<?php

namespace App\Interfaces;

interface OnlineClassRepositoryInterface
{

    public function index();

    public function create();

    public function store($request);

    public function destroy($request);

}
