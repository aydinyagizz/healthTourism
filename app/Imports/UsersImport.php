<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use PHPUnit\Event\Code\Throwable;

class UsersImport implements ToModel, WithValidation
{
  //  use Importable, SkipsFailures;

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */



    public function model(array $row)
    {
        return new User([
            'name' => $row[0],
            'email'=>$row[1],
            'user_role' => 1,
            'password'=>Hash::make($row[2]),
        ]);
    }

    public function rules(): array
    {
//        return [
//            '*.0' => 'required', // name alanı boş olamaz
//            '*.1' => 'required|email|unique:users,email', // email alanı geçerli bir e-posta olmalı ve users tablosunda unique olmalı
//            '*.2' => 'required|min:6', // password alanı en az 6 karakter olmalı
//        ];

        return [
            '*.0' => 'required', // name alanı boş olamaz
            '*.1' => [
                'required',
                'email',
                Rule::unique('users', 'email'), // email alanı users tablosunda unique olmalı
            ],
            '*.2' => 'required|min:6', // password alanı en az 6 karakter olmalı
        ];
    }





}
