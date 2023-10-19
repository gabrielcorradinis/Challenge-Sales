<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('modified');
            $table->string('ean');
            $table->boolean('is_kit');
            $table->string('slug');
            $table->string('ncm');
            $table->date('activation_date')->nullable();
            $table->date('deactivation_date')->nullable();
            $table->string('name');
            $table->decimal('price', 8, 2);
            $table->decimal('cost_price', 8, 2);
            $table->decimal('dollar_cost_price', 8, 2);
            $table->decimal('promotional_price', 8, 2);
            $table->date('start_promotion')->nullable();
            $table->date('end_promotion')->nullable();
            $table->string('brand');
            $table->string('brand_id');
            $table->string('model');
            $table->integer('weight');
            $table->integer('length');
            $table->integer('width');
            $table->integer('height');
            $table->integer('stock');
            $table->integer('category_id');
            $table->boolean('available');
            $table->string('availability');
            $table->string('reference');
            $table->boolean('hot');
            $table->boolean('release');
            $table->boolean('additional_button');
            $table->boolean('has_variation');
            $table->integer('rating');
            $table->integer('count_rating');
            $table->integer('quantity_sold');
            $table->string('payment_option')->nullable();
            $table->text('payment_option_details')->nullable();
            $table->date('release_date')->nullable();
            $table->string('shortcut')->nullable();
            $table->boolean('virtual_product')->nullable();
            $table->integer('minimum_stock')->nullable();
            $table->integer('minimum_stock_alert')->nullable();
            $table->boolean('free_shipping')->nullable();
            $table->string('video')->nullable();
            $table->text('metatag')->nullable();
            $table->text('payment_option_html')->nullable();
            $table->boolean('upon_request')->nullable();
            $table->boolean('available_for_purchase')->nullable();
            $table->boolean('all_categories')->nullable();
            $table->text('related_categories')->nullable();
            $table->text('ProductImage')->nullable();
            $table->text('Variant')->nullable();
            $table->text('AdditionalInfos')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
}
