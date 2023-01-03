<?php


namespace App\Repository;


interface StudentGraduatedRepositoryInterface
{

    public function index();

    public function create();

    // update Students to SoftDelete
    public function SoftDelete($request);

    public function SoftDeleteForOneStudent($request);

    // ReturnData Students
    public function ReturnData($request);

    // destroy Students
    public function destroy($request);


}