<?php


namespace App\Interfaces;


interface PaymentRepositoryInterface
{

    public function index();

    public function show($id);

    public function story($request);

    public function edit($id);

    public function update($request);

    public function destroy($request);

}
