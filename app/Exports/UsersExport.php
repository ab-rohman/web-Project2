<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;

class UsersExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $user = User::select('name', 'nik','jk','tempat_lahir')->where('id', '!=', '1')->get();
        // if($user[8] != 'KELAS1'){
        //     $user[8] = 'KELAS1';
        // }
        return $user;
    }
}
