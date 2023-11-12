<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->json('animal')->nullable()->comment('animal information');
            $table->longText('payment_id')->nullable();
            $table->text('card_number')->nullable();
            $table->string('amount')->nullable();
            $table->string('name')->nullable()->comment('customer name');
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('city')->nullable();
            $table->string('post_code')->nullable();
            $table->string('shipping_address')->nullable();
            $table->string('subtotal')->nullable();
            $table->string('total')->nullable();
            $table->string('payment_type')->nullable();
            $table->string('status')->default(App\Enums\OrderStatusEnum::PENDING);
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
        Schema::dropIfExists('orders');
    }
};
