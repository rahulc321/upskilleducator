<?php

use App\Utils\AppConstant;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHomepageContentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homepage_content', function (Blueprint $table) {
            $table->increments('id');
            $table->string('homepage_banner')->nullable();
            $table->string('homepage_text1_picture')->nullable();
            $table->string('homepage_text1')->nullable();
            $table->string('homepage_secondary_text1')->nullable();
            $table->string('homepage_text2_picture')->nullable();
            $table->string('homepage_text2')->nullable();
            $table->string('homepage_secondary_text2')->nullable();
            $table->string('homepage_text3_picture')->nullable();
            $table->string('homepage_text3')->nullable();
            $table->string('homepage_secondary_text3')->nullable();
            $table->tinyInteger('status')->default(AppConstant::STATUS_ACTIVE);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('homepage_content');
    }
}
