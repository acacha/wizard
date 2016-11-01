<?php

use Illuminate\Database\Seeder;

class WizardTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\Acacha\Wizard\Wizard::class, 3)
            ->create()
            ->each(function ($wizard) {
                $wizard->steps()->saveMany(
                    factory(\Acacha\Wizard\Step::class,4)->make()
                );
            });
    }
}


