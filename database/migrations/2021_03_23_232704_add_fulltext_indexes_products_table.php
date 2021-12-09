<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class AddFulltextIndexesProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->text('virtual_options')->after('season')->storedAs('CONCAT_WS(" ", color->"$[*]", size->"$[*]", material->"$[*]", direction->"$[*]", sex->"$[*]", season->"$[*]")')->nullable();
        });
        DB::statement('ALTER TABLE products ADD FULLTEXT products_search(article, name, details, virtual_options)');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function($table) {
            $table->dropIndex('products_search');
            $table->dropColumn('virtual_options');
        });
    }
}
