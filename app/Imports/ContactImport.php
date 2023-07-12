<?php

namespace App\Imports;

use App\Models\backend\Contact;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class ContactImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
            return new Contact([
                'name' => $row[0],
                'email' => $row[1],
                'phone' => $row[2],
                'topic' => $row[3],
                'message' => $row[4],
            ]);
    }
}
