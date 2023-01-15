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
        Schema::create('package_masters', function (Blueprint $table) {
            $table->id();
            $table->string('plan_name');
            $table->integer('duration');
            $table->integer('discount');
            $table->string('amount');
            $table->string('currency');
            $table->string('tax');
            $table->timestamps();
            $table->tinyInteger('status')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $data = DB::table('package_masters')->select('*')->get()->toArray();
        if(count($data) > 0){

            $dataquery = '
            -- Package Master 
            
            ';
            [$keys, $valuess] = Arr::divide(json_decode(json_encode($data[0]),true));
            
            $query1 = "INSERT INTO `package_masters` (" . implode(', ', $keys) . ") ";
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

        Schema::dropIfExists('package_masters');
    }
};