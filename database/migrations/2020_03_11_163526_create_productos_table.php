<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->unsignedbigInteger('category_id');
            $table->bigInteger('cantidad')->unsigned()->default(0);
            $table->decimal('precio_actual',12,2)->default(0);
            $table->decimal('precio_anterior',12,2)->default(0);
            $table->Integer('descuento')->unsigned()->default(0);
            $table->text('descripcion');
            $table->text('especificaciones');
            $table->unsignedbigInteger('visitas')->default(0);
            $table->unsignedbigInteger('ventas')->default(0);
            $table->string('estado');
            $table->char('activo',2);
            $table->string('Foto');
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
