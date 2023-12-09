<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('expense_items', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('boardOwner');
            $table->foreignId('boardOwner')
                    ->references('id')
                    ->on('expense_boards');
            $table->char('itemName', 80);
            $table->string('itemDesc', 800);
            $table->integer('itemPrice');
            $table->boolean('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('expense_items', function($table)
        {
            $table->dropForeign('boardOwner');
            $table->foreign('boardOwner')->references('id')->on('expenseBoards');
        });
        Schema::dropIfExists('expense_items');
    }
};
