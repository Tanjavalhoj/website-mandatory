<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_histories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->integer('userId');
            $table->timestamps();
        });

        DB::unprepared('CREATE TRIGGER tr_users_histories BEFORE UPDATE ON website_db.users FOR EACH ROW
            BEGIN
                INSERT INTO website_db.users_histories (name, email, userId, created_at, updated_at) 
                VALUES (OLD.name, OLD.email, OLD.id, OLD.created_at, NOW());
            END
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER tr_users_histories');
        Schema::dropIfExists('users_histories');

    }
}
