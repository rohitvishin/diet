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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->string('doc_id');
            $table->string('client');
            $table->string('date');
            $table->string('start_time');
            $table->string('end_time');
            $table->tinyInteger('status')->comment("0=created,1=done,2=cancelled")->default(0);
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $data = DB::table('appointments')->select('*')->get()->toArray();
        if(count($data) > 0){

            $dataquery = '
            -- Appointment Master
            
            ';
            [$keys, $valuess] = Arr::divide(json_decode(json_encode($data[0]),true));
            
            $query1 = "INSERT INTO `appointments` (" . implode(', ', $keys) . ") ";
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

        Schema::dropIfExists('appointments');
    }
};