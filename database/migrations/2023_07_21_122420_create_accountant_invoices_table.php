<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountantInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accountant_invoices', function (Blueprint $table) {
            $table->id();
            $table->integer('total');
            $table->boolean('starred')->default(false);
            $table->boolean('status_from_accountant')->default(false);
            $table->boolean('status_from_financial_bishop')->default(false);
            $table->boolean('status_from_financial_secretary')->default(false);
            $table->boolean('status_from_financial_internalAuditor')->default(false);
            $table->softDeletes('deleted_at');
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
        Schema::dropIfExists('accountant_invoices');
    }
}
