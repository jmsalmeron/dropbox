<?php

use App\Plan;
use Illuminate\Database\Seeder;

class PlansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Plan::create([
           'plan_name' => 'Mensual',
           'plan_description' => '<li><i class="fas fa-dollar-sign"></i> <del>Descuento</del></li><li><i class="fas fa-user-circle"></i> Múltiples inicios de sesión</li><li><i class="far fa-hdd"></i> 20 GB de almacenamiento</li><li><i class="fas fa-headset"></i> Soporte técnico</li>',
           'plan_price' => '9,99',
           'plan_type' => 'Suscripcion-mensual',
           'name' => 'AspergerBox',
           'description' => 'Suscripcion mensual',
           'plan_duration' => '1 mes',
           'amount' => 999,
           'btn_label' => 'Seleccionar plan'
       ]);
        Plan::create([
            'plan_name' => 'Trimestral',
            'plan_description' => '<li><i class="fas fa-dollar-sign"></i> <del>Descuento</del></li><li><i class="fas fa-user-circle"></i> Múltiples inicios de sesión</li><li><i class="far fa-hdd"></i> 20 GB de almacenamiento</li><li><i class="fas fa-headset"></i> Soporte técnico</li>',
            'plan_price' => '24,99',
            'plan_type' => 'Suscripcion-trimestral',
            'name' => 'AspergerBox',
            'description' => 'Suscripcion trimestral',
            'plan_duration' => '3 mes',
            'amount' => 2499,
            'btn_label' => 'Seleccionar plan'
        ]);
    }
}


