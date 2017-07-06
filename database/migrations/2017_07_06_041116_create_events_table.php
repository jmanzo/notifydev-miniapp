<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('provider_id')->unsigned();
            $table->foreign('provider_id')->references('id')->on('providers');

            $table->integer('asm_group_id')->nullable();

            $table->string('sg_message_id');

            $table->string('response', 100)->nullable();

            $table->string('sg_event_id', 100);

            $table->string('status', 10)->nullable();

            $table->string('event', 50);

            $table->string('email', 50);

            $table->string('smtp-id', 100)->nullable();

            $table->string('ip', 100)->nullable();

            $table->boolean('tls')->nullable();

            $table->boolean('cert_err')->nullable();

            $table->string('useragent', 255)->nullable();

            $table->string('url', 100)->nullable();

            $table->string('reason')->nullable();

            $table->string('type', 50)->nullable();

            $table->integer('attempt')->nullable();

            $table->timestamp('send_at')->nullable();

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
        Schema::dropIfExists('events');
    }
}
