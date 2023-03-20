<!-- Main Content -->

@include('dev.include.header')
<style>
.select2-container {
    display: unset !important;
}

.select2-dropdown--above {
    width: max-content !important;
}

.select2-dropdown--below {
    width: max-content !important;
}

.followUpAnthroCard {
    max-height: 550px;
    overflow-x: auto;
}

.followUpAnthro ul {
    list-style: none;
    padding-inline-start: 5px
}

.followUpAnthro ul li {
    list-style: none;
    border: 1px solid #eee;
    padding-inline-start: 5px
}

.nav .nav-item {
    display: grid;
    justify-content: center;
    align-content: center;
}

.nav .nav-item .nav-link i {
    display: none;
}

.nav .nav-item .nav-link span {
    display: inline;
}

.nav-pills .nav-item .nav-link {
    box-shadow: 0 2px 6px #acb5f6;
    color: #fff;
    background-color: #5db3f7;
    margin: 5px;
}

@media screen and (max-width:480px) {
    .nav {
        flex-wrap: unset !important;
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
    }

    .nav .nav-item .nav-link span {
        display: none;
    }

    .nav .nav-item .nav-link .tab-icon {
        display: inline;
    }

    .card .card-header,
    .card .card-body,
    .card .card-footer {
        padding: 20px 10px !important;
    }
}

.nav-pills .nav-item .nav-link.active {
    background-color: #660b95 !important;
}

.nav-pills .nav-item .nav-link:hover {
    background-color: #660b95 !important;
}

.hover-text-black:hover {
    color: black !important
}
</style>


<!-- fullcalender -->
<link rel="stylesheet" href="{{ asset('assets/modules/codemirror/lib/codemirror.css') }}">
<script src="{{ asset('assets/modules/codemirror/theme/duotone-dark.css') }}"></script>
@include('dev.include.sidebar')


<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="features-settings.html" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Start Appointment</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item active"><a href="#">Settings</a></div>
                <div class="breadcrumb-item">Appointment</div>
                <div class="breadcrumb-item">{{ ucwords($url) }}</div>
            </div>
        </div>

        <div class="section-body">
            <div id="output-status"></div>
            <div class="row">
                <div class="col-12 col-sm-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Client {{ ucwords($url) }}</h4>
                        </div>
                        <div class="card-body">
                            @include('dev.consultant.components.patient_details')
                            <ul class="nav nav-pills" id="myTab3" role="tablist">
                                @include('dev.consultant.components.nav_bar')
                            </ul>
                            <div class="tab-content" id="myTabContent2">
                                <!-- Documents -->
                                <div class="tab-pane fade show active" id="diet_recall" role="tabpanel"
                                    aria-labelledby="contact-tab3">
                                    <button class="btn btn-primary btn-sm"
                                        onclick="show_diet_recall_modal('','add')">Add
                                        New
                                        Diet Recall</button>
                                    <div class="card followUpAnthroCard">
                                        <div class="card-body">
                                            <div class="row flex-row flex-nowrap">

                                                @if(count($user_data) > 0)
                                                @foreach($user_data as $single_data)
                                                <div class="col-md-6 followUpAnthro">
                                                    <ul>
                                                        <table class="table table-sm table-bordered">
                                                            <th colspan='4' class="bg-primary text-white text-center">
                                                                {{ $single_data['diet_recall_date'] }}
                                                            </th>
                                                            <tr>
                                                                <td class="bg-primary text-white">#</td>
                                                                <td class="bg-primary text-white">In a week</td>
                                                                <td class="bg-primary text-white">How much you Consume
                                                                </td>
                                                                <td class="bg-primary text-white">What you consume</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="bg-primary text-white">Meal Out Freq</td>
                                                                <td>{{ $single_data['meal_out']['in_week'] }}</td>
                                                                <td>{{ $single_data['meal_out']['you_consume'] }}</td>
                                                                <td>{{ $single_data['meal_out']['what_you_consume'] }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="bg-primary text-white">Water Intake</td>
                                                                <td>{{ $single_data['water_intake']['in_week'] }}</td>
                                                                <td>{{ $single_data['water_intake']['you_consume'] }}
                                                                </td>
                                                                <td>{{ $single_data['water_intake']['what_you_consume'] }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="bg-primary text-white">Fried Food</td>
                                                                <td>{{ $single_data['fried_food']['in_week'] }}</td>
                                                                <td>{{ $single_data['fried_food']['you_consume'] }}</td>
                                                                <td>{{ $single_data['fried_food']['what_you_consume'] }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="bg-primary text-white">
                                                                    Choclate/Desserts/Methai</td>
                                                                <td>{{ $single_data['choclate']['in_week'] }}</td>
                                                                <td>{{ $single_data['choclate']['you_consume'] }}</td>
                                                                <td>{{ $single_data['choclate']['what_you_consume'] }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="bg-primary text-white">Juices/Canned
                                                                    food/Coldrinks</td>
                                                                <td>{{ $single_data['juices']['in_week'] }}</td>
                                                                <td>{{ $single_data['juices']['you_consume'] }}</td>
                                                                <td>{{ $single_data['juices']['what_you_consume'] }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="bg-primary text-white">Junk food / Chats</td>
                                                                <td>{{ $single_data['junk_foods']['in_week'] }}</td>
                                                                <td>{{ $single_data['junk_foods']['you_consume'] }}</td>
                                                                <td>{{ $single_data['junk_foods']['what_you_consume'] }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="bg-primary text-white">Breads</td>
                                                                <td>{{ $single_data['bread']['in_week'] }}</td>
                                                                <td>{{ $single_data['bread']['you_consume'] }}</td>
                                                                <td>{{ $single_data['bread']['what_you_consume'] }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="bg-primary text-white">Potatoes</td>
                                                                <td>{{ $single_data['potato']['in_week'] }}</td>
                                                                <td>{{ $single_data['potato']['you_consume'] }}</td>
                                                                <td>{{ $single_data['potato']['what_you_consume'] }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="bg-primary text-white">Chesse</td>
                                                                <td>{{ $single_data['chesse']['in_week'] }}</td>
                                                                <td>{{ $single_data['chesse']['you_consume'] }}</td>
                                                                <td>{{ $single_data['chesse']['what_you_consume'] }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="bg-primary text-white">Oil</td>
                                                                <td>{{ $single_data['oil']['in_week'] }}</td>
                                                                <td>{{ $single_data['oil']['you_consume'] }}</td>
                                                                <td>{{ $single_data['oil']['what_you_consume'] }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="bg-primary text-white">Ghee/Butter</td>
                                                                <td>{{ $single_data['ghee']['in_week'] }}</td>
                                                                <td>{{ $single_data['ghee']['you_consume'] }}</td>
                                                                <td>{{ $single_data['ghee']['what_you_consume'] }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="bg-primary text-white">Alcohol</td>
                                                                <td>{{ $single_data['alcohol']['in_week'] }}</td>
                                                                <td>{{ $single_data['alcohol']['you_consume'] }}</td>
                                                                <td>{{ $single_data['alcohol']['what_you_consume'] }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="bg-primary text-white">Smoking</td>
                                                                <td>{{ $single_data['smoking']['in_week'] }}</td>
                                                                <td>{{ $single_data['smoking']['you_consume'] }}</td>
                                                                <td>{{ $single_data['smoking']['what_you_consume'] }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="bg-primary text-white">Crabs</td>
                                                                <td>{{ $single_data['crabs']['in_week'] }}</td>
                                                                <td>{{ $single_data['crabs']['you_consume'] }}</td>
                                                                <td>{{ $single_data['crabs']['what_you_consume'] }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="bg-primary text-white">Protiens</td>
                                                                <td>{{ $single_data['protien']['in_week'] }}</td>
                                                                <td>{{ $single_data['protien']['you_consume'] }}</td>
                                                                <td>{{ $single_data['protien']['what_you_consume'] }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="bg-primary text-white">Milk</td>
                                                                <td>{{ $single_data['milk']['in_week'] }}</td>
                                                                <td>{{ $single_data['milk']['you_consume'] }}</td>
                                                                <td>{{ $single_data['milk']['what_you_consume'] }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="bg-primary text-white">Veg</td>
                                                                <td>{{ $single_data['veg']['in_week'] }}</td>
                                                                <td>{{ $single_data['veg']['you_consume'] }}</td>
                                                                <td>{{ $single_data['veg']['what_you_consume'] }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="bg-primary text-white">Fruits</td>
                                                                <td>{{ $single_data['fruits']['in_week'] }}</td>
                                                                <td>{{ $single_data['fruits']['you_consume'] }}</td>
                                                                <td>{{ $single_data['fruits']['what_you_consume'] }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="bg-primary text-white">Protien Powder</td>
                                                                <td>{{ $single_data['protien_powder']['in_week'] }}</td>
                                                                <td>{{ $single_data['protien_powder']['you_consume'] }}
                                                                </td>
                                                                <td>{{ $single_data['protien_powder']['what_you_consume'] }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="bg-primary text-white">Nuts</td>
                                                                <td>{{ $single_data['nuts']['in_week'] }}</td>
                                                                <td>{{ $single_data['nuts']['you_consume'] }}</td>
                                                                <td>{{ $single_data['nuts']['what_you_consume'] }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2"><button class="btn btn-danger"
                                                                        onclick="delete_diet_recall('{{ $single_data['id'] }}','{{ $single_data['client_id'] }}')">Delete</button>
                                                                </td>
                                                                <td colspan="2"><button class="btn btn-primary"
                                                                        onclick="show_diet_recall_modal('{{ $single_data }}', 'edit')">Edit</button>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </ul>
                                                </div>
                                                @endforeach
                                                @else
                                                <p>No Data found!!</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Modal  -->
<!-- Add New Document -->
<div class="modal diet_recall" id="exampleModalCenter" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add New Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="diet_recall_form">
                <div class="modal-body" style="height:550px;overflow:auto;">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Enter Date</label>
                            <input type="date" name="diet_recall_date" id="diet_recall_date" class="form-control"
                                required>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered">
                                <thead>
                                    <th>Name</th>
                                    <th>How often in a week</th>
                                    <th>How much you consume</th>
                                    <th>What do you consume</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Meal Out Freq</td>
                                        <td><input type="text" class="form-control" id='meal_out.in_week'
                                                name="meal_out[in_week]"></td>
                                        <td><input type="text" class="form-control" id='meal_out.you_consume'
                                                name="meal_out[you_consume]"></td>
                                        <td><input type="text" class="form-control" id='meal_out.what_you_consume'
                                                name="meal_out[what_you_consume]"></td>
                                    </tr>
                                    <tr>
                                        <td>Water Intake</td>
                                        <td><input type="text" class="form-control" id='water_intake.in_week'
                                                name="water_intake[in_week]"></td>
                                        <td><input type="text" class="form-control" id='water_intake.you_consume'
                                                name="water_intake[you_consume]"></td>
                                        <td><input type="text" class="form-control" id='water_intake.what_you_consume'
                                                name="water_intake[what_you_consume]"></td>
                                    </tr>
                                    <tr>
                                        <td>Fried Food</td>
                                        <td><input type="text" class="form-control" id='fried_food.in_week'
                                                name="fried_food[in_week]"></td>
                                        <td><input type="text" class="form-control" id='fried_food.you_consume'
                                                name="fried_food[you_consume]"></td>
                                        <td><input type="text" class="form-control" id='fried_food.what_you_consume'
                                                name="fried_food[what_you_consume]"></td>
                                    </tr>
                                    <tr>
                                        <td>Choclate/Desserts/Methai</td>
                                        <td><input type="text" class="form-control" id='choclate.in_week'
                                                name="choclate[in_week]"></td>
                                        <td><input type="text" class="form-control" id='choclate.you_consume'
                                                name="choclate[you_consume]"></td>
                                        <td><input type="text" class="form-control" id='choclate.what_you_consume'
                                                name="choclate[what_you_consume]"></td>
                                    </tr>
                                    <tr>
                                        <td>Juices/Canned food/Coldrinks</td>
                                        <td><input type="text" class="form-control" id='juices.in_week'
                                                name="juices[in_week]"></td>
                                        <td><input type="text" class="form-control" id='juices.you_consume'
                                                name="juices[you_consume]"></td>
                                        <td><input type="text" class="form-control" id='juices.what_you_consume'
                                                name="juices[what_you_consume]"></td>
                                    </tr>
                                    <tr>
                                        <td>Junk food / Chats</td>
                                        <td><input type="text" class="form-control" id='junk_foods.in_week'
                                                name="junk_foods[in_week]"></td>
                                        <td><input type="text" class="form-control" id='junk_foods.you_consume'
                                                name="junk_foods[you_consume]"></td>
                                        <td><input type="text" class="form-control" id='junk_foods.what_you_consume'
                                                name="junk_foods[what_you_consume]"></td>
                                    </tr>
                                    <tr>
                                        <td>Breads</td>
                                        <td><input type="text" class="form-control" id='bread.in_week'
                                                name="bread[in_week]">
                                        </td>
                                        <td><input type="text" class="form-control" id='bread.you_consume'
                                                name="bread[you_consume]"></td>
                                        <td><input type="text" class="form-control" id='bread.what_you_consume'
                                                name="bread[what_you_consume]"></td>
                                    </tr>
                                    <tr>
                                        <td>Potatoes</td>
                                        <td><input type="text" class="form-control" id='potato.in_week'
                                                name="potato[in_week]"></td>
                                        <td><input type="text" class="form-control" id='potato.you_consume'
                                                name="potato[you_consume]"></td>
                                        <td><input type="text" class="form-control" id='potato.what_you_consume'
                                                name="potato[what_you_consume]"></td>
                                    </tr>
                                    <tr>
                                        <td>Chesse</td>
                                        <td><input type="text" class="form-control" id='chesse.in_week'
                                                name="chesse[in_week]"></td>
                                        <td><input type="text" class="form-control" id='chesse.you_consume'
                                                name="chesse[you_consume]"></td>
                                        <td><input type="text" class="form-control" id='chesse.what_you_consume'
                                                name="chesse[what_you_consume]"></td>
                                    </tr>
                                    <tr>
                                        <td>Oil</td>
                                        <td><input type="text" class="form-control" id='oil.in_week'
                                                name="oil[in_week]">
                                        </td>
                                        <td><input type="text" class="form-control" id='oil.you_consume'
                                                name="oil[you_consume]"></td>
                                        <td><input type="text" class="form-control" id='oil.what_you_consume'
                                                name="oil[what_you_consume]"></td>
                                    </tr>
                                    <tr>
                                        <td>Ghee/Butter</td>
                                        <td><input type="text" class="form-control" id='ghee.in_week'
                                                name="ghee[in_week]">
                                        </td>
                                        <td><input type="text" class="form-control" id='ghee.you_consume'
                                                name="ghee[you_consume]"></td>
                                        <td><input type="text" class="form-control" id='ghee.what_you_consume'
                                                name="ghee[what_you_consume]"></td>
                                    </tr>
                                    <tr>
                                        <td>Alcohol</td>
                                        <td><input type="text" class="form-control" id='alcohol.in_week'
                                                name="alcohol[in_week]"></td>
                                        <td><input type="text" class="form-control" id='alcohol.you_consume'
                                                name="alcohol[you_consume]"></td>
                                        <td><input type="text" class="form-control" id='alcohol.what_you_consume'
                                                name="alcohol[what_you_consume]"></td>
                                    </tr>
                                    <tr>
                                        <td>Smoking</td>
                                        <td><input type="text" class="form-control" id='smoking.in_week'
                                                name="smoking[in_week]"></td>
                                        <td><input type="text" class="form-control" id='smoking.you_consume'
                                                name="smoking[you_consume]"></td>
                                        <td><input type="text" class="form-control" id='smoking.what_you_consume'
                                                name="smoking[what_you_consume]"></td>
                                    </tr>
                                    <tr>
                                        <td>Crabs</td>
                                        <td><input type="text" class="form-control" id='crabs.in_week'
                                                name="crabs[in_week]">
                                        </td>
                                        <td><input type="text" class="form-control" id='crabs.you_consume'
                                                name="crabs[you_consume]"></td>
                                        <td><input type="text" class="form-control" id='crabs.what_you_consume'
                                                name="crabs[what_you_consume]"></td>
                                    </tr>
                                    <tr>
                                        <td>Protiens</td>
                                        <td><input type="text" class="form-control" id='protien.in_week'
                                                name="protien[in_week]"></td>
                                        <td><input type="text" class="form-control" id='protien.you_consume'
                                                name="protien[you_consume]"></td>
                                        <td><input type="text" class="form-control" id='protien.what_you_consume'
                                                name="protien[what_you_consume]"></td>
                                    </tr>
                                    <tr>
                                        <td>Milk</td>
                                        <td><input type="text" class="form-control" id='milk.in_week'
                                                name="milk[in_week]">
                                        </td>
                                        <td><input type="text" class="form-control" id='milk.you_consume'
                                                name="milk[you_consume]"></td>
                                        <td><input type="text" class="form-control" id='milk.what_you_consume'
                                                name="milk[what_you_consume]"></td>
                                    </tr>
                                    <tr>
                                        <td>Veg</td>
                                        <td><input type="text" class="form-control" id='veg.in_week'
                                                name="veg[in_week]">
                                        </td>
                                        <td><input type="text" class="form-control" id='veg.you_consume'
                                                name="veg[you_consume]"></td>
                                        <td><input type="text" class="form-control" id='veg.what_you_consume'
                                                name="veg[what_you_consume]"></td>
                                    </tr>
                                    <tr>
                                        <td>Fruits</td>
                                        <td><input type="text" class="form-control" id='fruits.in_week'
                                                name="fruits[in_week]"></td>
                                        <td><input type="text" class="form-control" id='fruits.you_consume'
                                                name="fruits[you_consume]"></td>
                                        <td><input type="text" class="form-control" id='fruits.what_you_consume'
                                                name="fruits[what_you_consume]"></td>
                                    </tr>
                                    <tr>
                                        <td>Protien Powder</td>
                                        <td><input type="text" class="form-control" id='protien_powder.in_week'
                                                name="protien_powder[in_week]"></td>
                                        <td><input type="text" class="form-control" id='protien_powder.you_consume'
                                                name="protien_powder[you_consume]"></td>
                                        <td><input type="text" class="form-control" id='protien_powder.what_you_consume'
                                                name="protien_powder[what_you_consume]"></td>
                                    </tr>
                                    <tr>
                                        <td>Nuts</td>
                                        <td><input type="text" class="form-control" id='nuts.in_week'
                                                name="nuts[in_week]">
                                        </td>
                                        <td><input type="text" class="form-control" id='nuts.you_consume'
                                                name="nuts[you_consume]"></td>
                                        <td><input type="text" class="form-control" id='nuts.what_you_consume'
                                                name="nuts[what_you_consume]"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"
                        onclick="close_diet_followed_modal()">Close</button>
                    <button type="button" class="btn btn-primary" id="saveDietRecall" data-process="add"
                        data-id="0">Save
                        changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal  -->


@include('dev.include.footer')

<!-- JS Libraies -->
<script src="{{ asset('assets/modules/codemirror/lib/codemirror.js') }}"></script>
<script src="{{ asset('assets/modules/codemirror/mode/javascript/javascript.js') }}"></script>

<!-- Page Specific JS File -->
<script src="{{ asset('assets/js/page/features-setting-detail.js') }}"></script>

<script>
// Document Tab

function show_diet_recall_modal(data, process) {
    document.getElementById("diet_recall_form").reset();
    if (process == 'add')
        $('.diet_recall').modal('show');
    else {

        data = JSON.parse(data);
        $(`form#diet_recall_form :input`).each(function() {
            var input = $(this);
            if ($(this).attr('type') == 'date')
                $(this).val(data[$(this).attr('name')]);
            else if ($(this).attr('type') == 'text') {
                value = $(this).attr("id");
                value = value.split('.')
                $(this).val(data[value[0]][value[1]]);

            } else if ($(this).attr('type') == 'button') {
                $(this).attr('data-id', data.id)
                $(this).attr('data-process', 'edit')
            }

        });

        $('.diet_recall').modal('show');
    }
}

function close_diet_plan_modal() {
    document.getElementById("diet_recall_form").reset();
    $('.diet_recall').modal('hide');
}

function delete_diet_recall(id, client_id) {

    if (confirm("Are you sure you want to do that?")) {
        var formdata = new FormData();
        formdata.append('id', id);
        formdata.append('client_id', client_id);
        formdata.append('process', 'delete');
        axios.post(`${url}/update_diet_recall_data`, formdata, {
            headers: {
                'Content-Type': 'application/json',
            }
        }).then(function(response) {
            // handle success
            show_Toaster(response.data.message, response.data.type);
            if (response.data.type === 'success') {
                location.reload();
            }
        }).catch(function(err) {
            show_Toaster(err.response.data.message, 'error')
        })
    }
}

$('#saveDietRecall').on('click', async function() {

    let data = new FormData(document.getElementById('diet_recall_form'));
    data.append('client_id', user_id);
    data.append('process', $('#saveDietRecall').attr('data-process'));
    data.append('id', $('#saveDietRecall').attr('data-id'));

    axios.post(`${url}/update_diet_recall_data`, data, {
        headers: {
            'Content-Type': 'application/json',
        }
    }).then(function(response) {
        // handle success
        show_Toaster(response.data.message, response.data.type);
        if (response.data.type === 'success') {
            location.reload();
        }
    }).catch(function(err) {
        show_Toaster(err.response.data.message, 'error')
    })
});

var user_data <?= !empty($user_data) && $user_data != 'null' ? '= '.$user_data : `{}` ?>;
let user_id = `{{ $user_id }}`;
var is_data_changed = false;
var mobile = `{{ $mobile ?? '' }}`;

$('.appointment-link').click(async  function() {
    var url = $(this).attr('data-url');
    window.location.href = `{{ url('startAppointment/${mobile}/${url}') }} `
});
</script>