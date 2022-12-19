@include('dev.include.header')
@include('dev.include.sidebar')


<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Clients List</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="" method="POST">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4>Search by filter</h4>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" class="form-control" placeholder="Search By Client Name">
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" class="form-control" placeholder="Search By File Number">
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" class="form-control" placeholder="Search By Date">
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" class="form-control" placeholder="Search By Contact Number">
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" class="form-control" placeholder="Search By Refered By">
                                    </div>
                                    <div class="col-md-2">
                                        <button type="submit" name="search_client" class="btn btn-lg btn-primary">Search</button>
                                        <button type="submit" name="search_client" class="btn btn-lg btn-primary">Clear Feilds</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-2">
                                    <thead>
                                        <tr>
                                            <!-- <th class="text-center">
                                                <div class="custom-checkbox custom-control">
                                                    <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                                                    <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                                                </div>
                                            </th> -->
                                            <th>File Number</th>
                                            <th>Fullname</th>
                                            <th>Email</th>
                                            <th>Phone Number</th>
                                            <th>Address</th>
                                            <th>Reference</th>
                                            <th>Profession</th>
                                            <th>Work Timming</th>
                                            <th>Instagram Profile</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>12345</td>
                                            <td>Shrikunj Vyas</td>
                                            <td>shreevyas65@gmail.com</td>
                                            <td>7066498174</td>
                                            <td>MIRA ROAD</td>
                                            <td>Rohit Vishwakarma</td>
                                            <td>Software Engineer</td>
                                            <td>7am - 9pm</td>
                                            <td>iamshreevyas</td>
                                            <td><a href="#" class="btn btn-primary">Detail</a></td>
                                        </tr>
                                        <tr>
                                            <td>12345</td>
                                            <td>Shrikunj Vyas</td>
                                            <td>shreevyas65@gmail.com</td>
                                            <td>7066498174</td>
                                            <td>MIRA ROAD</td>
                                            <td>Rohit Vishwakarma</td>
                                            <td>Software Engineer</td>
                                            <td>7am - 9pm</td>
                                            <td>iamshreevyas</td>
                                            <td><a href="#" class="btn btn-primary">Detail</a></td>
                                        </tr>
                                        <tr>
                                            <td>12345</td>
                                            <td>Shrikunj Vyas</td>
                                            <td>shreevyas65@gmail.com</td>
                                            <td>7066498174</td>
                                            <td>MIRA ROAD</td>
                                            <td>Rohit Vishwakarma</td>
                                            <td>Software Engineer</td>
                                            <td>7am - 9pm</td>
                                            <td>iamshreevyas</td>
                                            <td><a href="#" class="btn btn-primary">Detail</a></td>
                                        </tr>
                                        <tr>
                                            <td>12345</td>
                                            <td>Shrikunj Vyas</td>
                                            <td>shreevyas65@gmail.com</td>
                                            <td>7066498174</td>
                                            <td>MIRA ROAD</td>
                                            <td>Rohit Vishwakarma</td>
                                            <td>Software Engineer</td>
                                            <td>7am - 9pm</td>
                                            <td>iamshreevyas</td>
                                            <td><a href="#" class="btn btn-primary">Detail</a></td>
                                        </tr>
                                        <tr>
                                            <td>12345</td>
                                            <td>Shrikunj Vyas</td>
                                            <td>shreevyas65@gmail.com</td>
                                            <td>7066498174</td>
                                            <td>MIRA ROAD</td>
                                            <td>Rohit Vishwakarma</td>
                                            <td>Software Engineer</td>
                                            <td>7am - 9pm</td>
                                            <td>iamshreevyas</td>
                                            <td><a href="#" class="btn btn-primary">Detail</a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
</div>

@include('dev.include.footer')