<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventoTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'evento';

    /**
     * Run the migrations.
     * @table evento
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('cantidad_personas', 45);
            $table->timestamp('fecha_reservacion');
            $table->integer('id_users')->unsigned();
            $table->integer('id_tipo_evento')->unsigned();

            $table->index(["id_users"], 'fk_evento_users');
            $table->index(["id_tipo_evento"], 'fk_evento_tipoDeEvento');

            $table->foreign('id_users', 'fk_evento_users')
                ->references('id')->on('users')
                ->onDelete('no action')
                ->onUpdate('no action');

                $table->foreign('id_tipo_evento', 'fk_evento_tipoDeEvento')
                ->references('id')->on('tipo_evento')
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
