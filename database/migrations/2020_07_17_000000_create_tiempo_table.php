<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTiempoTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'tiempo';

    /**
     * Run the migrations.
     * @table tiempo
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->timeTZ('hora_salida');
            $table->integer('id_usuario')->unsigned();
            $table->timestamps();

            $table->index(["id_usuario"], 'fk_tiempo_usuario');

            $table->foreign('id_usuario', 'fk_tiempo_usuario')
                ->references('id')->on('usuarios')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists($this->tableName);
     }
}
