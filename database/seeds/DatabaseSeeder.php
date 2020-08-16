<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $companyStatuses = [
            ['name' => 'Active'],
            ['name' => 'Lost'],
            ['name' => 'Suspended'],
            ['name' => 'Prospect'],
        ];

        foreach ($companyStatuses as $status) {
            App\Models\CompanyStatus::create($status);
        }

        $companyTypes = [
            ['name' => 'Distributor'],
            ['name' => 'Agent'],
            ['name' => 'Reseller'],
            ['name' => 'Supplier'],
        ];

        foreach ($companyTypes as $companyType) {
            App\Models\CompanyType::create($companyType);
        }

        $contactRoles = [
            ['name' => 'Director'],
            ['name' => 'Owner'],
            ['name' => 'Manager'],
            ['name' => 'Staff'],
        ];

        foreach ($contactRoles as $role) {
            App\Models\ContactRole::create($role);
        }

        \Illuminate\Support\Facades\DB::beginTransaction();

        factory(App\Models\Company::class, 250)->create()->each(function ($c) {
            $contacts = factory(App\Models\Contact::class, rand(1, 5))->make();
            $c->contacts()->saveMany($contacts);
            $contacts->each(function ($contact) {
                $addresses = factory(App\Models\Address::class, rand(1, 5))->make();
                $contact->addresses()->saveMany($addresses);
            });
        });

        \Illuminate\Support\Facades\DB::commit();
    }
}
