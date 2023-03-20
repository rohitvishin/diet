<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

<style>
@media screen and (max-width:480px) {
    .patient_row {
        max-height: 150px;
        overflow-y: auto;
    }

    .patient_col {
        border-bottom: 1px solid #eee;
        margin-bottom: 15px;
        padding-bottom: 15px
    }
}

.patient_row {
    font-family: 'Poppins', sans-serif;
}
</style>

<div class="row">
    <div class="col-12 col-md-12 col-sm-12 col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row patient_row">
                    <div class="col-md-2 patient_col" style="border-right:1px solid #eee">
                        @if(!empty($patient_details['user_details']['name']))
                        <h4>{{ $patient_details['user_details']['name'] ?? '---' }}</h4>
                        @endif

                        @if(!empty($patient_details['user_details']['age']))
                        Age: {{ $patient_details['user_details']['age'] ?? 0 }}yrs,
                        @endif

                        @if(!empty($patient_details['user_details']['gender']))
                        {{ $patient_details['user_details']['gender'] ?? '---' }}
                        @endif
                    </div>

                    <div class="col-md-2 patient_col" style="border-right:1px solid #eee">
                        @if(!empty($patient_details['anthro']['anthro_date']))
                        (as per date {{ date('d, M Y', strtotime($patient_details['anthro']['anthro_date'])) }})
                        @endif

                        @if(!empty($patient_details['anthro']['weight']))
                        <h6>Weight : {{ $patient_details['anthro']['weight'] ?? 0 }}Kg</h6>
                        @endif

                        @if(!empty($patient_details['anthro']['height']))
                        <h6>Height : {{ $patient_details['anthro']['height'] ?? 0 }}Ft</h6>
                        @endif
                    </div>

                    <div class="col-md-4 patient_col" style="border-right:1px solid #eee">
                        <h4>Medical Info </h4>
                        @php
                        $meddata = [];

                        if(isset($patient_details['medical_info']['chronic_diseases']) &&
                        !empty($patient_details['medical_info']['chronic_diseases']))
                        array_push($meddata, explode(',' , $patient_details['medical_info']['chronic_diseases']) );

                        if(isset($patient_details['medical_info']['bone_health']) &&
                        !empty($patient_details['medical_info']['bone_health']))
                        array_push($meddata, explode(',' ,$patient_details['medical_info']['bone_health']) );

                        if(isset($patient_details['medical_info']['gastro_instestinal']) &&
                        !empty($patient_details['medical_info']['gastro_instestinal']))
                        array_push($meddata, explode(',' ,$patient_details['medical_info']['gastro_instestinal']) );

                        if(isset($patient_details['medical_info']['others']) &&
                        !empty($patient_details['medical_info']['others']))
                        array_push($meddata, explode(',' ,$patient_details['medical_info']['others']) );

                        @endphp

                        @if(!empty($meddata) && count($meddata) > 0)
                        @foreach($meddata as $singleMedData)
                        @if(count($singleMedData) > 0)
                        @foreach($singleMedData as $textMedData)
                        <label>◉ {{ $textMedData }}</label>
                        @endforeach
                        @endif
                        @endforeach
                        @else
                        ---
                        @endif
                    </div>

                    <div class="col-md-4 patient_col">
                        <h4>Purpose</h4>
                        @if(!empty($patient_details['user_details']['purpose']) &&
                        $patient_details['user_details']['purpose'] != 'other')
                        <label>{{ $patient_details['user_details']['purpose'] }}</label>
                        @elseif(!empty($patient_details['user_details']['purpose_other']))
                        {{ $patient_details['user_details']['purpose_other'] }}
                        @else
                        ---
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>