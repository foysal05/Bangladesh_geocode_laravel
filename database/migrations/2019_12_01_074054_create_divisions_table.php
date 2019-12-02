<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
// use DB;
class CreateDivisionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       
        Schema::create('divisions', function (Blueprint $table) {
            $table->integer('id');
            $table->string('name');
            $table->string('bn_name');
            $table->string('url');
            $table->timestamps();
        });

       $query=" INSERT INTO `divisions` (`id`, `name`, `bn_name`, `url`) VALUES
        (1, 'Chattagram', 'চট্টগ্রাম', 'www.chittagongdiv.gov.bd'),
        (2, 'Rajshahi', 'রাজশাহী', 'www.rajshahidiv.gov.bd'),
        (3, 'Khulna', 'খুলনা', 'www.khulnadiv.gov.bd'),
        (4, 'Barisal', 'বরিশাল', 'www.barisaldiv.gov.bd'),
        (5, 'Sylhet', 'সিলেট', 'www.sylhetdiv.gov.bd'),
        (6, 'Dhaka', 'ঢাকা', 'www.dhakadiv.gov.bd'),
        (7, 'Rangpur', 'রংপুর', 'www.rangpurdiv.gov.bd'),
        (8, 'Mymensingh', 'ময়মনসিংহ', 'www.mymensinghdiv.gov.bd')";

        $results = DB::insert( DB::raw($query) );
        // $division=DB::insert( $query);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('divisions');
    }
}
