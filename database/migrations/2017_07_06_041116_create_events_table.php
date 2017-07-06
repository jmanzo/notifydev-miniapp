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

            $table->integer('asm_group_id');

            $table->string('sg_message_id');

            $table->string('response', 100);

            $table->string('sg_event_id', 100);

            $table->string('status', 10);

            $table->string('event', 50);

            $table->string('email', 50);

            $table->string('smtp-id', 100);

            $table->string('ip', 100);

            $table->boolean('tls');

            $table->boolean('cert_err');

            $table->string('useragent', 100);

            $table->string('url', 100);

            $table->string('reason');

            $table->string('type', 50);

            $table->integer('attempt');

            $table->timestamp('send_at');

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
