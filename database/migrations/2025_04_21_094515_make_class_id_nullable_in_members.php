<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeClassIdNullableInMembers extends Migration
{
    public function up()
    {
        Schema::table('members', function (Blueprint $table) {
            $table->unsignedBigInteger('class_id')->nullable()->change();
        });
    }

    public function down()
    {

    }
}
