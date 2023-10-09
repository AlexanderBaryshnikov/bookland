<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('isbn', 25);
            $table->string('name', 255);
            $table->string('slug', 255);
            $table->text('description')
                ->nullable();
            $table->float('price', 10, 2);
            $table->unsignedMediumInteger('quantity');
            $table->foreignId('author_id')
                ->nullable()
                ->constrained();
            $table->foreignId('publisher_id')
                ->nullable()
                ->constrained();
            $table->timestamps();
            $table->softDeletes();

            $table->unique('isbn');
            $table->unique('slug');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
