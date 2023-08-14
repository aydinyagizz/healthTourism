<?php

namespace App\Imports;

use App\Models\Citiest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
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
    use Importable, SkipsFailures;

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */



    public function model(array $row)
    {

        $cityName = $row[1]; // Excel'den gelen şehir ismi

        $city = Citiest::where('name', $cityName)->first(); // Şehri veritabanında ara


        if ($city) {
            $phone = Str::of($row[5])->replaceMatches('/[^A-Za-z0-9]++/', '');

            $password = "123456";
            $companyName = $row[3]; // Excel'den gelen şirket ismi
            $firstWord = strtolower(strtok($companyName, ' '));
           // $randomNumber = rand(100, 999); // Rastgele bir sayı üret
            //$email = $firstWord . $randomNumber . '@gmail.com'; // E-posta oluştur
            $email = $firstWord . substr($phone, -4) . '@gmail.com'; // E-posta oluştur

            $existingUser = User::where('email', $email)->first();
            if ($existingUser) {
                return null; // Bu email zaten var, ekleme yapma
            }


            return new User([
                'name' => $firstWord,
                'email' => $email,
                'city' => $city->id, // Şehir ID'sini kullanıcıya atayın
                'user_role' => 1,
                'password' => Hash::make($password),
                'agency_name' => $row[2],
                'company_name' => $companyName,
                'address' => $row[4],
                'phone' => $phone,
                'featured' => 0,
                'status' => 1,
            ]);
        }
        else {
            return null;
            // Şehir veritabanında yoksa, yeni bir şehir eklemeyin ve burada gerekli işlemleri yapabilirsiniz
            // Örneğin hata mesajı gösterebilir veya bu satırı atlayabilirsiniz
        }


//        return new User([
//            'name' => $row[0],
//            'email'=>$row[1],
//            'user_role' => 1,
//            'password'=>Hash::make($row[2]),
//        ]);
    }

    public function rules(): array
    {


        return [
            '*.0' => 'required', // name alanı boş olamaz
            //'*.1' => [
            //    'required',
                //'unique:users',
               // 'email',
               // Rule::unique('users', 'email'), // email alanı users tablosunda unique olmalı
           // ],
          //  '*.2' => 'required|min:6', // password alanı en az 6 karakter olmalı
        ];
    }





}
