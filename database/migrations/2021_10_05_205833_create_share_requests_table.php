<?php

use App\Models\Property;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShareRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('share_requests', function (Blueprint $table) {
            $table->id();
            $table->integer('can_buy');
            $table->string('have_currency');
            $table->string('name');
            $table->string('email');

            $table->enum('type', array_keys(Property::$types))->default(Property::TYPE_REQUEST);
            $table->text('message')->nullable();
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
        Schema::dropIfExists('share_requests');
    }
}
