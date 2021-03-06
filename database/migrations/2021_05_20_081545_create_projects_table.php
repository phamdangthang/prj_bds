<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->text('description');
            $table->integer('category_id')->nullable()->comment('Danh mục du an');
            $table->integer('city_id');
            $table->string('address');
            $table->string('price');
            $table->text('guide')->nullable();
            $table->string('usage_status', 20)->comment('tình trạng sử dụng');
            $table->string('status', 20)->comment('trạng thái duyệt');
            $table->string('acreage', 20)->comment('diện tích');
            $table->integer('number_of_bedrooms');
            $table->integer('number_of_toilets');
            $table->string('door_direction')->comment('hướng cửa');
            $table->string('balcony_direction')->comment('hướng ban công');
            $table->string('floor')->comment('số tầng');
            $table->string('apartment_number')->comment('số căn hộ');
            $table->integer('user_id')->nullable();
            $table->integer('admin_id')->nullable();
            $table->text('note')->nullable();
            $table->date('date_of_delivery')->nullable();
            $table->string('images')->nullable();
            $table->timestamp('created_at')->nullable(false)->default(\Illuminate\Support\Facades\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->nullable(false)->default(\Illuminate\Support\Facades\DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
