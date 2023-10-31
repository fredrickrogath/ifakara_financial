<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_accounts', function (Blueprint $table) {
            $table->id();
            $table->string('account_name');
            $table->integer('account_code')->unique();
            $table->decimal('price', 10, 2)->nullable();
            $table->foreignId('account_id')->nullable()->constrained('accounts');
            $table->foreignId('sub_account_id')->nullable()->constrained('sub_accounts');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_accounts');
    }
}
