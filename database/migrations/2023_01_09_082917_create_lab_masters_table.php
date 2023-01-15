<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lab_masters', function (Blueprint $table) {
            $table->id();
            $table->string('test_type');
            $table->string('test_name');
            $table->string('range_ref_type')->comment('0:gender, 1:age, -1:none');
            $table->string('range_ref_action')->comment('0:less than, 1:greater than, 2:between, -1:none');
            $table->string('range_ref_value')->comment('value of reference');
            $table->float('low_range');
            $table->float('high_range');
            $table->string('range_match_action')->comment('0:less, 1:high, 2:between, 3:upto');
            $table->string('unit');
            $table->timestamps();
            $table->integer('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        $data = DB::table('lab_masters')->select('*')->get()->toArray();
        if(count($data) > 0){

            $dataquery = '
            -- Lab Master
            
            ';
            [$keys, $valuess] = Arr::divide(json_decode(json_encode($data[0]),true));
            
            $query1 = "INSERT INTO `lab_masters` (" . implode(', ', $keys) . ") ";
            $query2 = 'VALUES ';
            if(count($data) > 0){
                foreach($data as $key => $singleData){
                    // dd($singleData);
                    [$keyss, $values] = Arr::divide(json_decode(json_encode($singleData),true));
                    $query2 .= " ('" . implode("', '", $values) . "')". (array_key_last($data) == $key ? ';' : ',');
                }
            }else{
                $query2 = " 
                ('" . implode("', '", $valuess) . "')";
            }
                        
            $dataquery .= $query1.$query2;
            $disk = Storage::build([
                'driver' => 'local',
                'root' => 'db_queries/',
            ]);
            $disk->append('all_queries.txt', $dataquery);
        }
        Schema::dropIfExists('lab_masters');
    }
};