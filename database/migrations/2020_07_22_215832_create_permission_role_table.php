<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permission_role', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('role_id')->unsigned();
            $table->index(["role_id"], 'fk_roles');
            $table->foreign('role_id', 'fk_roles')
            ->references('id')->on('roles')
            ->onDelete('cascade');

            $table->integer('permission_id')->unsigned();
            $table->index(["permission_id"], 'fk_permissions');
            $table->foreign('permission_id', 'fk_permissions')
            ->references('id')->on('permissions')
            ->onDelete('cascade');

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
        Schema::dropIfExists('permission_role');
    }
}
