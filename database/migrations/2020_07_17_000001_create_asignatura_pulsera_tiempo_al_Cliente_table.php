<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsignaturaPulseraTiempoAlClienteTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'asignatura_pulsera_tiempo_al_Cliente';

    /**
     * Run the migrations.
     * @table asignatura_pulsera_tiempo_al_Cliente
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->integer('id_pulsera')->nullable()->default(null)->unsigned();
            $table->integer('id_tiempo')->nullable()->default(null)->unsigned();
            $table->integer('id_usuarios')->unsigned();

            $table->index(["id_tiempo"], 'fk_id_tiempo');

            $table->index(["id_pulsera"], 'id_pulsera');

            $table->index(["id_usuarios"], 'fk_asignatura_pulsera_tiempo_al_Cliente_usuarios1_idx');


            $table->foreign('id_pulsera', 'id_pulsera')
                ->references('id')->on('pulsera')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('id_tiempo', 'fk_id_tiempo')
                ->references('id')->on('tiempo')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('id_usuarios', 'fk_asignatura_pulsera_tiempo_al_Cliente_usuarios1_idx')
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
