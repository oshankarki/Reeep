<?php

namespace App\Exports;

use App\Models\Backend\Contact;
use DB;

use Maatwebsite\Excel\Concerns\FromCollection;

use Maatwebsite\Excel\Concerns\WithHeadings;



class ExportContacts implements FromCollection, WithHeadings {




    public function headings(): array {




        // according to users table




        return [

            "Contact Id",

            "Name",

            "Email Address",

            "Phone No.",

            "Topic",

            "Message",


        ];

    }




    public function collection(){

        $contactData = Contact::select('id', 'name', 'email', 'phone','topic','message')->get();


        return collect($contactData);

    }

}
