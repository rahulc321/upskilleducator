<?php


use App\Utils\AppConstant;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('uuid');
            $table->integer('category_id')->unsigned();
            $table->integer('type')->comment("1:On-going, 2:On-demand, 3:Live");
            $table->string('url_name');
            $table->string('title');
            $table->string('speaker_name');
            $table->string('speaker_picture');
            $table->string('picture');
            $table->float('price');
            $table->dateTime('webinar_date_time');
            $table->string('duration');
            $table->longText('overview')->nullable();
            $table->longText('speaker')->nullable();
            $table->longText('ceus')->nullable();
            $table->tinyInteger('status')->default(AppConstant::STATUS_ACTIVE);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('category_id')->references('id')->on('category')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
}
