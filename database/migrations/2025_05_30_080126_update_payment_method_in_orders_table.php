<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
class UpdatePaymentMethodInOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */


public function up()
{
    DB::statement("ALTER TABLE orders MODIFY payment_method ENUM('cash', 'gcash') NOT NULL");
}

public function down()
{
    DB::statement("ALTER TABLE orders MODIFY payment_method ENUM('cash') NOT NULL");
}

}
