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
        //Tabella profiles (relazione uno a uno con users)
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');//pronto per diventare una Foreign Key
            $table->string('bio')->nullable();
            $table->string('address')->nullable();
            $table->timestamps();

            //relazione profiles.user_id -> users.id
            $table->foreign('user_id')//user_id della tabella profiles ora è una FK(Foreign key)
            ->references('id')//che si collegherà al campo id
            ->on('users')//presente nela tabella users
            ->onDelete('cascade');
        });

        //Tabella orders (relazione uno a molti con users)
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');//pronto per diventare una Foreign Key
            $table->string('status')->default('pending');
            $table->timestamps();

            //Relazione orders.user_id -> users.id
            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');
        });

        //Tabella product
         Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->decimal('price');
            $table->timestamps();
            //qui la relazione deve essere gestita dalla tabella pivot che vedi sotto
        });

        //tabella pivot per molti-a-molti tra orders e products
         Schema::create('order_product', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');//pronto per diventare una Foreign Key
            $table->unsignedBigInteger('product_id');//pronto per diventare una Foreign Key
            $table->integer('quantity')->default(1);
            $table->timestamps();

            //relazione order_products.order_id -> orders.id
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            //relazione order_products.product_id -> products.id
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_product');
        Schema::dropIfExists('products');
        Schema::dropIfExists('orders');
        Schema::dropIfExists('profiles');
    }
};
