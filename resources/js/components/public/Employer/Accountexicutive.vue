<template>
    <div id="accountexicutive">
        <Emp-header></Emp-header>
         <section class="top-adjust pt-5 pb-5">
            <div id="breadcrumb">
                <div class="breadcrumb-wrapper">

                    <div class="container">

                        <div class="row">

                            <div class="col-xs-12 col-sm-8">
                                <ol class="breadcrumb">
                                    <li><a href="#"><i class="fa fa-home mr-1"></i>Home</a></li>
                                    <li><a href="#">Emplyee Dashboard</a></li>
                                    <li class="active">Account Executive</li>
                                </ol>
                            </div>

                            <div class="col-xs-12 col-sm-4 hidden-xs">
                                <p class="hot-line"> <i class="fa fa-headphones mr-1 Phone is-animating"
                                        aria-hidden="true"></i> <a href="tel:+91 11 7962 6411">Hot Line: +91 11 7962 6411
                                        </a>  </p>
                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </section>
        <section class="top-adjust section pb-5 mt-0 pt-0">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="cms-pg-header">
                            <h2 class="hk-pg-title">Account Executive</h2>
                            <!-- <a href="" class="btn btn-primary text-white" data-toggle="modal" data-target="#addQuestionnaires"><i class="fas fa-plus mr-2"></i>Add Questionnaires</a> -->
                        </div>


                        <div class="card mt-3">

                            <div class="card-body  ">
                                <div class="row mb-3">
                                    <div class="col-sm-12">
                                        <ul class="nav nav-tabs nav-fill">
                                            <li class="nav-item"><a class="nav-link active fs-12" data-toggle="tab"
                                                    href="#All">All</a></li>
                                            <li class="nav-item"><a class="nav-link fs-12 border-right-0"
                                                    data-toggle="tab" href="#NewApplied">New Applied</a></li>
                                            <li class="nav-item"><a class="nav-link fs-12 border-right-0"
                                                    data-toggle="tab" href="#Shortlisted">Shortlisted</a></li>
                                            <li class="nav-item"><a class="nav-link fs-12 border-right-0"
                                                    data-toggle="tab" href="#Rejected">Rejected</a></li>
                                            <li class="nav-item"><a class="nav-link fs-12 border-right-0"
                                                    data-toggle="tab" href="#InterviewScheduled">Interview Scheduled</a>
                                            </li>
                                            <li class="nav-item"><a class="nav-link fs-12 border-right-0"
                                                    data-toggle="tab" href="#Offer">Offer</a></li>
                                            <li class="nav-item"><a class="nav-link fs-12 border-right-0"
                                                    data-toggle="tab" href="#Hire">Hire</a></li>
                                            <li class="nav-item"><a class="nav-link fs-12 border-right-0"
                                                    data-toggle="tab" href="#SaveForFuture">Save For Future</a></li>


                                        </ul>
                                    </div>
                                </div>

                                <div class="tab-content">
                                    <!-- all tab start -->

                                    <div id="All" class="tab-pane fade show active">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-6">
                                                <div class="dataTables_length" id="example1_length"><label>Show
                                                        entries<select name="example1_length" aria-controls="example1"
                                                            class="custom-select custom-select-sm form-control form-control-sm">
                                                            <option value="10">10</option>
                                                            <option value="25">25</option>
                                                            <option value="50">50</option>
                                                            <option value="100">100</option>
                                                        </select> </label></div>
                                            </div>
                                            <div class="col-sm-12 col-md-6">
                                                <div id="example1_filter" class="dataTables_filter"><label>Search:<input
                                                            type="search" class="form-control form-control-sm"
                                                            placeholder="" aria-controls="example1"></label></div>
                                            </div>
                                        </div>

                                        <div class="table-responsive custom-height">
                                            <table class="table custom-table mt-2">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Applied On</th>
                                                        <th>Experience </th>
                                                        <th>Current Designation</th>
                                                        <th>Expected Salary</th>
                                                        <th>Notice Period</th>
                                                        <th>Actions</th>


                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>John Due</td>
                                                        <td>5/2/2020</td>
                                                        <td>2 Year</td>
                                                        <td>Web Designer</td>
                                                        <td>50,0000</td>
                                                        <td>1 Month</td>
                                                        <td>
                                                            <a class="btn btn-sm btn-primary text-white"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="Shortlisted"><i
                                                                    class="fas fa-check"></i></a>

                                                            <a class="btn btn-sm btn-danger text-white"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="Rejected"><i
                                                                    class="fas fa-closed-captioning"></i></a>

                                                            <a class="btn btn-sm btn-primary text-white"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="Interview Schedule"><i
                                                                    class="fas fa-calendar"></i></a>

                                                            <a class="btn btn-sm btn-danger text-white"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="Offer Letter"><i
                                                                    class="fas fa-file-archive"></i></a>

                                                            <a class="btn btn-sm btn-primary text-white"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="Hire"><i
                                                                    class="fas fa-thumbs-up"></i></a>

                                                            <a class="btn btn-sm btn-danger text-white"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="Message"><i
                                                                    class="fa fa-weixin"></i></a>

                                                            <a class="btn btn-sm btn-primary text-white"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="Save For Future"><i
                                                                    class="fas fa-star"></i></a>

                                                        </td>


                                                    </tr>

                                                </tbody>
                                            </table>
                                            <div class="row">
                                                <div class="col-sm-12 col-md-5">
                                                    <div class="dataTables_info" id="example1_info" role="status"
                                                        aria-live="polite">Showing 1 to 10 of 57 entries</div>
                                                </div>
                                                <div class="col-sm-12 col-md-7">
                                                    <div class="dataTables_paginate paging_simple_numbers"
                                                        id="example1_paginate">
                                                        <ul class="pagination">
                                                            <li class="paginate_button page-item previous disabled"
                                                                id="example1_previous"><a href="#"
                                                                    aria-controls="example1" data-dt-idx="0"
                                                                    tabindex="0" class="page-link">Previous</a></li>
                                                            <li class="paginate_button page-item active"><a href="#"
                                                                    aria-controls="example1" data-dt-idx="1"
                                                                    tabindex="0" class="page-link">1</a></li>
                                                            <li class="paginate_button page-item "><a href="#"
                                                                    aria-controls="example1" data-dt-idx="2"
                                                                    tabindex="0" class="page-link">2</a></li>
                                                            <li class="paginate_button page-item "><a href="#"
                                                                    aria-controls="example1" data-dt-idx="3"
                                                                    tabindex="0" class="page-link">3</a></li>
                                                            <li class="paginate_button page-item "><a href="#"
                                                                    aria-controls="example1" data-dt-idx="4"
                                                                    tabindex="0" class="page-link">4</a></li>
                                                            <li class="paginate_button page-item "><a href="#"
                                                                    aria-controls="example1" data-dt-idx="5"
                                                                    tabindex="0" class="page-link">5</a></li>
                                                            <li class="paginate_button page-item "><a href="#"
                                                                    aria-controls="example1" data-dt-idx="6"
                                                                    tabindex="0" class="page-link">6</a></li>
                                                            <li class="paginate_button page-item next"
                                                                id="example1_next"><a href="#" aria-controls="example1"
                                                                    data-dt-idx="7" tabindex="0"
                                                                    class="page-link">Next</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>


                                    </div>

                                    <!-- All tab end -->



                                    <!-- NewApplied tab start -->

                                    <div id="NewApplied" class="tab-pane fade">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-6">
                                                <div class="dataTables_length" id="example1_length"><label>Show
                                                        entries<select name="example1_length" aria-controls="example1"
                                                            class="custom-select custom-select-sm form-control form-control-sm">
                                                            <option value="10">10</option>
                                                            <option value="25">25</option>
                                                            <option value="50">50</option>
                                                            <option value="100">100</option>
                                                        </select> </label></div>
                                            </div>
                                            <div class="col-sm-12 col-md-6">
                                                <div id="example1_filter" class="dataTables_filter"><label>Search:<input
                                                            type="search" class="form-control form-control-sm"
                                                            placeholder="" aria-controls="example1"></label></div>
                                            </div>
                                        </div>

                                        <div class="table-responsive custom-height">
                                            <table class="table custom-table mt-2">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Applied On</th>
                                                        <th>Experience </th>
                                                        <th>Current Designation</th>
                                                        <th>Expected Salary</th>
                                                        <th>Notice Period</th>
                                                        <th>Actions</th>


                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>John Due</td>
                                                        <td>5/2/2020</td>
                                                        <td>2 Year</td>
                                                        <td>Web Designer</td>
                                                        <td>50,0000</td>
                                                        <td>1 Month</td>
                                                        <td>
                                                            <a class="btn btn-sm btn-primary text-white"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="Shortlisted"><i
                                                                    class="fas fa-check"></i></a>

                                                            <a class="btn btn-sm btn-danger text-white"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="Rejected"><i
                                                                    class="fas fa-closed-captioning"></i></a>

                                                            <a class="btn btn-sm btn-primary text-white"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="Interview Schedule"><i
                                                                    class="fas fa-calendar"></i></a>

                                                            <a class="btn btn-sm btn-danger text-white"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="Offer Letter"><i
                                                                    class="fas fa-file-archive"></i></a>

                                                            <a class="btn btn-sm btn-primary text-white"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="Hire"><i
                                                                    class="fas fa-thumbs-up"></i></a>

                                                            <a class="btn btn-sm btn-danger text-white"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="Message"><i
                                                                    class="fa fa-weixin"></i></a>

                                                            <a class="btn btn-sm btn-primary text-white"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="Save For Future"><i
                                                                    class="fas fa-star"></i></a>

                                                        </td>


                                                    </tr>

                                                    <tr>
                                                        <td>John Due</td>
                                                        <td>5/2/2020</td>
                                                        <td>2 Year</td>
                                                        <td>Web Designer</td>
                                                        <td>50,0000</td>
                                                        <td>1 Month</td>
                                                        <td>
                                                            <a class="btn btn-sm btn-primary text-white"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="Shortlisted"><i
                                                                    class="fas fa-check"></i></a>

                                                            <a class="btn btn-sm btn-danger text-white"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="Rejected"><i
                                                                    class="fas fa-closed-captioning"></i></a>

                                                            <a class="btn btn-sm btn-primary text-white"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="Interview Schedule"><i
                                                                    class="fas fa-calendar"></i></a>

                                                            <a class="btn btn-sm btn-danger text-white"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="Offer Letter"><i
                                                                    class="fas fa-file-archive"></i></a>

                                                            <a class="btn btn-sm btn-primary text-white"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="Hire"><i
                                                                    class="fas fa-thumbs-up"></i></a>

                                                            <a class="btn btn-sm btn-danger text-white"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="Message"><i
                                                                    class="fa fa-weixin"></i></a>

                                                            <a class="btn btn-sm btn-primary text-white"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="Save For Future"><i
                                                                    class="fas fa-star"></i></a>

                                                        </td>

                                                    </tr>

                                                </tbody>
                                            </table>
                                            <div class="row">
                                                <div class="col-sm-12 col-md-5">
                                                    <div class="dataTables_info" id="example1_info" role="status"
                                                        aria-live="polite">Showing 1 to 10 of 57 entries</div>
                                                </div>
                                                <div class="col-sm-12 col-md-7">
                                                    <div class="dataTables_paginate paging_simple_numbers"
                                                        id="example1_paginate">
                                                        <ul class="pagination">
                                                            <li class="paginate_button page-item previous disabled"
                                                                id="example1_previous"><a href="#"
                                                                    aria-controls="example1" data-dt-idx="0"
                                                                    tabindex="0" class="page-link">Previous</a></li>
                                                            <li class="paginate_button page-item active"><a href="#"
                                                                    aria-controls="example1" data-dt-idx="1"
                                                                    tabindex="0" class="page-link">1</a></li>
                                                            <li class="paginate_button page-item "><a href="#"
                                                                    aria-controls="example1" data-dt-idx="2"
                                                                    tabindex="0" class="page-link">2</a></li>
                                                            <li class="paginate_button page-item "><a href="#"
                                                                    aria-controls="example1" data-dt-idx="3"
                                                                    tabindex="0" class="page-link">3</a></li>
                                                            <li class="paginate_button page-item "><a href="#"
                                                                    aria-controls="example1" data-dt-idx="4"
                                                                    tabindex="0" class="page-link">4</a></li>
                                                            <li class="paginate_button page-item "><a href="#"
                                                                    aria-controls="example1" data-dt-idx="5"
                                                                    tabindex="0" class="page-link">5</a></li>
                                                            <li class="paginate_button page-item "><a href="#"
                                                                    aria-controls="example1" data-dt-idx="6"
                                                                    tabindex="0" class="page-link">6</a></li>
                                                            <li class="paginate_button page-item next"
                                                                id="example1_next"><a href="#" aria-controls="example1"
                                                                    data-dt-idx="7" tabindex="0"
                                                                    class="page-link">Next</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>


                                    </div>

                                    <!-- NewApplied tab end -->


                                    <!-- Shortlisted tab start -->

                                    <div id="Shortlisted" class="tab-pane fade">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-6">
                                                <div class="dataTables_length" id="example1_length"><label>Show
                                                        entries<select name="example1_length" aria-controls="example1"
                                                            class="custom-select custom-select-sm form-control form-control-sm">
                                                            <option value="10">10</option>
                                                            <option value="25">25</option>
                                                            <option value="50">50</option>
                                                            <option value="100">100</option>
                                                        </select> </label></div>
                                            </div>
                                            <div class="col-sm-12 col-md-6">
                                                <div id="example1_filter" class="dataTables_filter"><label>Search:<input
                                                            type="search" class="form-control form-control-sm"
                                                            placeholder="" aria-controls="example1"></label></div>
                                            </div>
                                        </div>

                                        <div class="table-responsive custom-height">
                                            <table class="table custom-table mt-2">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Applied On</th>
                                                        <th>Experience </th>
                                                        <th>Current Designation</th>
                                                        <th>Expected Salary</th>
                                                        <th>Notice Period</th>
                                                        <th>Actions</th>


                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>John Due</td>
                                                        <td>5/2/2020</td>
                                                        <td>2 Year</td>
                                                        <td>Web Designer</td>
                                                        <td>50,0000</td>
                                                        <td>1 Month</td>
                                                        <td>
                                                            <a class="btn btn-sm btn-primary text-white"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="Shortlisted"><i
                                                                    class="fas fa-check"></i></a>

                                                            <a class="btn btn-sm btn-danger text-white"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="Rejected"><i
                                                                    class="fas fa-closed-captioning"></i></a>

                                                            <a class="btn btn-sm btn-primary text-white"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="Interview Schedule"><i
                                                                    class="fas fa-calendar"></i></a>

                                                            <a class="btn btn-sm btn-danger text-white"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="Offer Letter"><i
                                                                    class="fas fa-file-archive"></i></a>

                                                            <a class="btn btn-sm btn-primary text-white"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="Hire"><i
                                                                    class="fas fa-thumbs-up"></i></a>

                                                            <a class="btn btn-sm btn-danger text-white"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="Message"><i
                                                                    class="fa fa-weixin"></i></a>

                                                            <a class="btn btn-sm btn-primary text-white"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="Save For Future"><i
                                                                    class="fas fa-star"></i></a>

                                                        </td>


                                                    </tr>

                                                    <tr>
                                                        <td>John Due</td>
                                                        <td>5/2/2020</td>
                                                        <td>2 Year</td>
                                                        <td>Web Designer</td>
                                                        <td>50,0000</td>
                                                        <td>1 Month</td>
                                                        <td>
                                                            <a class="btn btn-sm btn-primary text-white"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="Shortlisted"><i
                                                                    class="fas fa-check"></i></a>

                                                            <a class="btn btn-sm btn-danger text-white"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="Rejected"><i
                                                                    class="fas fa-closed-captioning"></i></a>

                                                            <a class="btn btn-sm btn-primary text-white"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="Interview Schedule"><i
                                                                    class="fas fa-calendar"></i></a>

                                                            <a class="btn btn-sm btn-danger text-white"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="Offer Letter"><i
                                                                    class="fas fa-file-archive"></i></a>

                                                            <a class="btn btn-sm btn-primary text-white"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="Hire"><i
                                                                    class="fas fa-thumbs-up"></i></a>

                                                            <a class="btn btn-sm btn-danger text-white"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="Message"><i
                                                                    class="fa fa-weixin"></i></a>

                                                            <a class="btn btn-sm btn-primary text-white"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="Save For Future"><i
                                                                    class="fas fa-star"></i></a>

                                                        </td>


                                                    </tr>

                                                    <tr>
                                                        <td>John Due</td>
                                                        <td>5/2/2020</td>
                                                        <td>2 Year</td>
                                                        <td>Web Designer</td>
                                                        <td>50,0000</td>
                                                        <td>1 Month</td>
                                                        <td>
                                                            <a class="btn btn-sm btn-primary text-white"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="Shortlisted"><i
                                                                    class="fas fa-check"></i></a>

                                                            <a class="btn btn-sm btn-danger text-white"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="Rejected"><i
                                                                    class="fas fa-closed-captioning"></i></a>

                                                            <a class="btn btn-sm btn-primary text-white"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="Interview Schedule"><i
                                                                    class="fas fa-calendar"></i></a>

                                                            <a class="btn btn-sm btn-danger text-white"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="Offer Letter"><i
                                                                    class="fas fa-file-archive"></i></a>

                                                            <a class="btn btn-sm btn-primary text-white"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="Hire"><i
                                                                    class="fas fa-thumbs-up"></i></a>

                                                            <a class="btn btn-sm btn-danger text-white"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="Message"><i
                                                                    class="fa fa-weixin"></i></a>

                                                            <a class="btn btn-sm btn-primary text-white"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="Save For Future"><i
                                                                    class="fas fa-star"></i></a>

                                                        </td>


                                                    </tr>

                                                </tbody>
                                            </table>
                                            <div class="row">
                                                <div class="col-sm-12 col-md-5">
                                                    <div class="dataTables_info" id="example1_info" role="status"
                                                        aria-live="polite">Showing 1 to 10 of 57 entries</div>
                                                </div>
                                                <div class="col-sm-12 col-md-7">
                                                    <div class="dataTables_paginate paging_simple_numbers"
                                                        id="example1_paginate">
                                                        <ul class="pagination">
                                                            <li class="paginate_button page-item previous disabled"
                                                                id="example1_previous"><a href="#"
                                                                    aria-controls="example1" data-dt-idx="0"
                                                                    tabindex="0" class="page-link">Previous</a></li>
                                                            <li class="paginate_button page-item active"><a href="#"
                                                                    aria-controls="example1" data-dt-idx="1"
                                                                    tabindex="0" class="page-link">1</a></li>
                                                            <li class="paginate_button page-item "><a href="#"
                                                                    aria-controls="example1" data-dt-idx="2"
                                                                    tabindex="0" class="page-link">2</a></li>
                                                            <li class="paginate_button page-item "><a href="#"
                                                                    aria-controls="example1" data-dt-idx="3"
                                                                    tabindex="0" class="page-link">3</a></li>
                                                            <li class="paginate_button page-item "><a href="#"
                                                                    aria-controls="example1" data-dt-idx="4"
                                                                    tabindex="0" class="page-link">4</a></li>
                                                            <li class="paginate_button page-item "><a href="#"
                                                                    aria-controls="example1" data-dt-idx="5"
                                                                    tabindex="0" class="page-link">5</a></li>
                                                            <li class="paginate_button page-item "><a href="#"
                                                                    aria-controls="example1" data-dt-idx="6"
                                                                    tabindex="0" class="page-link">6</a></li>
                                                            <li class="paginate_button page-item next"
                                                                id="example1_next"><a href="#" aria-controls="example1"
                                                                    data-dt-idx="7" tabindex="0"
                                                                    class="page-link">Next</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>


                                    </div>

                                    <!-- Shortlisted tab end -->


                                    <!-- Rejected tab start -->

                                    <div id="Rejected" class="tab-pane fade">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-6">
                                                <div class="dataTables_length" id="example1_length"><label>Show
                                                        entries<select name="example1_length" aria-controls="example1"
                                                            class="custom-select custom-select-sm form-control form-control-sm">
                                                            <option value="10">10</option>
                                                            <option value="25">25</option>
                                                            <option value="50">50</option>
                                                            <option value="100">100</option>
                                                        </select> </label></div>
                                            </div>
                                            <div class="col-sm-12 col-md-6">
                                                <div id="example1_filter" class="dataTables_filter"><label>Search:<input
                                                            type="search" class="form-control form-control-sm"
                                                            placeholder="" aria-controls="example1"></label></div>
                                            </div>
                                        </div>

                                        <div class="table-responsive custom-height">
                                            <table class="table custom-table mt-2">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Applied On</th>
                                                        <th>Experience </th>
                                                        <th>Current Designation</th>
                                                        <th>Expected Salary</th>
                                                        <th>Notice Period</th>
                                                        <th>Actions</th>


                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>John Due</td>
                                                        <td>5/2/2020</td>
                                                        <td>2 Year</td>
                                                        <td>Web Designer</td>
                                                        <td>50,0000</td>
                                                        <td>1 Month</td>
                                                        <td>
                                                            <a class="btn btn-sm btn-primary text-white"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="Shortlisted"><i
                                                                    class="fas fa-check"></i></a>

                                                            <a class="btn btn-sm btn-danger text-white"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="Rejected"><i
                                                                    class="fas fa-closed-captioning"></i></a>

                                                            <a class="btn btn-sm btn-primary text-white"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="Interview Schedule"><i
                                                                    class="fas fa-calendar"></i></a>

                                                            <a class="btn btn-sm btn-danger text-white"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="Offer Letter"><i
                                                                    class="fas fa-file-archive"></i></a>

                                                            <a class="btn btn-sm btn-primary text-white"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="Hire"><i
                                                                    class="fas fa-thumbs-up"></i></a>

                                                            <a class="btn btn-sm btn-danger text-white"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="Message"><i
                                                                    class="fa fa-weixin"></i></a>

                                                            <a class="btn btn-sm btn-primary text-white"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="Save For Future"><i
                                                                    class="fas fa-star"></i></a>

                                                        </td>


                                                    </tr>

                                                </tbody>
                                            </table>
                                            <div class="row">
                                                <div class="col-sm-12 col-md-5">
                                                    <div class="dataTables_info" id="example1_info" role="status"
                                                        aria-live="polite">Showing 1 to 10 of 57 entries</div>
                                                </div>
                                                <div class="col-sm-12 col-md-7">
                                                    <div class="dataTables_paginate paging_simple_numbers"
                                                        id="example1_paginate">
                                                        <ul class="pagination">
                                                            <li class="paginate_button page-item previous disabled"
                                                                id="example1_previous"><a href="#"
                                                                    aria-controls="example1" data-dt-idx="0"
                                                                    tabindex="0" class="page-link">Previous</a></li>
                                                            <li class="paginate_button page-item active"><a href="#"
                                                                    aria-controls="example1" data-dt-idx="1"
                                                                    tabindex="0" class="page-link">1</a></li>
                                                            <li class="paginate_button page-item "><a href="#"
                                                                    aria-controls="example1" data-dt-idx="2"
                                                                    tabindex="0" class="page-link">2</a></li>
                                                            <li class="paginate_button page-item "><a href="#"
                                                                    aria-controls="example1" data-dt-idx="3"
                                                                    tabindex="0" class="page-link">3</a></li>
                                                            <li class="paginate_button page-item "><a href="#"
                                                                    aria-controls="example1" data-dt-idx="4"
                                                                    tabindex="0" class="page-link">4</a></li>
                                                            <li class="paginate_button page-item "><a href="#"
                                                                    aria-controls="example1" data-dt-idx="5"
                                                                    tabindex="0" class="page-link">5</a></li>
                                                            <li class="paginate_button page-item "><a href="#"
                                                                    aria-controls="example1" data-dt-idx="6"
                                                                    tabindex="0" class="page-link">6</a></li>
                                                            <li class="paginate_button page-item next"
                                                                id="example1_next"><a href="#" aria-controls="example1"
                                                                    data-dt-idx="7" tabindex="0"
                                                                    class="page-link">Next</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>


                                    </div>

                                    <!-- Rejected tab end -->


                                    <!-- InterviewScheduled tab start -->

                                    <div id="InterviewScheduled" class="tab-pane fade">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-6">
                                                <div class="dataTables_length" id="example1_length"><label>Show
                                                        entries<select name="example1_length" aria-controls="example1"
                                                            class="custom-select custom-select-sm form-control form-control-sm">
                                                            <option value="10">10</option>
                                                            <option value="25">25</option>
                                                            <option value="50">50</option>
                                                            <option value="100">100</option>
                                                        </select> </label></div>
                                            </div>
                                            <div class="col-sm-12 col-md-6">
                                                <div id="example1_filter" class="dataTables_filter"><label>Search:<input
                                                            type="search" class="form-control form-control-sm"
                                                            placeholder="" aria-controls="example1"></label></div>
                                            </div>
                                        </div>

                                        <div class="table-responsive custom-height">
                                            <table class="table custom-table mt-2">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Applied On</th>
                                                        <th>Experience </th>
                                                        <th>Current Designation</th>
                                                        <th>Expected Salary</th>
                                                        <th>Notice Period</th>
                                                        <th>Actions</th>


                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>John Due</td>
                                                        <td>5/2/2020</td>
                                                        <td>2 Year</td>
                                                        <td>Web Designer</td>
                                                        <td>50,0000</td>
                                                        <td>1 Month</td>
                                                        <td>
                                                            <a class="btn btn-sm btn-primary text-white"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="Shortlisted"><i
                                                                    class="fas fa-check"></i></a>

                                                            <a class="btn btn-sm btn-danger text-white"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="Rejected"><i
                                                                    class="fas fa-closed-captioning"></i></a>

                                                            <a class="btn btn-sm btn-primary text-white"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="Interview Schedule"><i
                                                                    class="fas fa-calendar"></i></a>

                                                            <a class="btn btn-sm btn-danger text-white"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="Offer Letter"><i
                                                                    class="fas fa-file-archive"></i></a>

                                                            <a class="btn btn-sm btn-primary text-white"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="Hire"><i
                                                                    class="fas fa-thumbs-up"></i></a>

                                                            <a class="btn btn-sm btn-danger text-white"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="Message"><i
                                                                    class="fa fa-weixin"></i></a>

                                                            <a class="btn btn-sm btn-primary text-white"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="Save For Future"><i
                                                                    class="fas fa-star"></i></a>

                                                        </td>

                                                    </tr>

                                                    <tr>
                                                        <td>John Due</td>
                                                        <td>5/2/2020</td>
                                                        <td>2 Year</td>
                                                        <td>Web Designer</td>
                                                        <td>50,0000</td>
                                                        <td>1 Month</td>
                                                        <td>
                                                            <a class="btn btn-sm btn-primary text-white"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="Shortlisted"><i
                                                                    class="fas fa-check"></i></a>

                                                            <a class="btn btn-sm btn-danger text-white"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="Rejected"><i
                                                                    class="fas fa-closed-captioning"></i></a>

                                                            <a class="btn btn-sm btn-primary text-white"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="Interview Schedule"><i
                                                                    class="fas fa-calendar"></i></a>

                                                            <a class="btn btn-sm btn-danger text-white"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="Offer Letter"><i
                                                                    class="fas fa-file-archive"></i></a>

                                                            <a class="btn btn-sm btn-primary text-white"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="Hire"><i
                                                                    class="fas fa-thumbs-up"></i></a>

                                                            <a class="btn btn-sm btn-danger text-white"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="Message"><i
                                                                    class="fa fa-weixin"></i></a>

                                                            <a class="btn btn-sm btn-primary text-white"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="Save For Future"><i
                                                                    class="fas fa-star"></i></a>

                                                        </td>


                                                    </tr>

                                                    <tr>
                                                        <td>John Due</td>
                                                        <td>5/2/2020</td>
                                                        <td>2 Year</td>
                                                        <td>Web Designer</td>
                                                        <td>50,0000</td>
                                                        <td>1 Month</td>
                                                        <td>
                                                            <a class="btn btn-sm btn-primary text-white"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="Shortlisted"><i
                                                                    class="fas fa-check"></i></a>

                                                            <a class="btn btn-sm btn-danger text-white"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="Rejected"><i
                                                                    class="fas fa-closed-captioning"></i></a>

                                                            <a class="btn btn-sm btn-primary text-white"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="Interview Schedule"><i
                                                                    class="fas fa-calendar"></i></a>

                                                            <a class="btn btn-sm btn-danger text-white"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="Offer Letter"><i
                                                                    class="fas fa-file-archive"></i></a>

                                                            <a class="btn btn-sm btn-primary text-white"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="Hire"><i
                                                                    class="fas fa-thumbs-up"></i></a>

                                                            <a class="btn btn-sm btn-danger text-white"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="Message"><i
                                                                    class="fa fa-weixin"></i></a>

                                                            <a class="btn btn-sm btn-primary text-white"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="Save For Future"><i
                                                                    class="fas fa-star"></i></a>

                                                        </td>


                                                    </tr>

                                                </tbody>
                                            </table>
                                            <div class="row">
                                                <div class="col-sm-12 col-md-5">
                                                    <div class="dataTables_info" id="example1_info" role="status"
                                                        aria-live="polite">Showing 1 to 10 of 57 entries</div>
                                                </div>
                                                <div class="col-sm-12 col-md-7">
                                                    <div class="dataTables_paginate paging_simple_numbers"
                                                        id="example1_paginate">
                                                        <ul class="pagination">
                                                            <li class="paginate_button page-item previous disabled"
                                                                id="example1_previous"><a href="#"
                                                                    aria-controls="example1" data-dt-idx="0"
                                                                    tabindex="0" class="page-link">Previous</a></li>
                                                            <li class="paginate_button page-item active"><a href="#"
                                                                    aria-controls="example1" data-dt-idx="1"
                                                                    tabindex="0" class="page-link">1</a></li>
                                                            <li class="paginate_button page-item "><a href="#"
                                                                    aria-controls="example1" data-dt-idx="2"
                                                                    tabindex="0" class="page-link">2</a></li>
                                                            <li class="paginate_button page-item "><a href="#"
                                                                    aria-controls="example1" data-dt-idx="3"
                                                                    tabindex="0" class="page-link">3</a></li>
                                                            <li class="paginate_button page-item "><a href="#"
                                                                    aria-controls="example1" data-dt-idx="4"
                                                                    tabindex="0" class="page-link">4</a></li>
                                                            <li class="paginate_button page-item "><a href="#"
                                                                    aria-controls="example1" data-dt-idx="5"
                                                                    tabindex="0" class="page-link">5</a></li>
                                                            <li class="paginate_button page-item "><a href="#"
                                                                    aria-controls="example1" data-dt-idx="6"
                                                                    tabindex="0" class="page-link">6</a></li>
                                                            <li class="paginate_button page-item next"
                                                                id="example1_next"><a href="#" aria-controls="example1"
                                                                    data-dt-idx="7" tabindex="0"
                                                                    class="page-link">Next</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>


                                    </div>

                                    <!-- InterviewScheduled tab end -->


                                    <!-- Offer tab start -->

                                    <div id="Offer" class="tab-pane fade">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-6">
                                                <div class="dataTables_length" id="example1_length"><label>Show
                                                        entries<select name="example1_length" aria-controls="example1"
                                                            class="custom-select custom-select-sm form-control form-control-sm">
                                                            <option value="10">10</option>
                                                            <option value="25">25</option>
                                                            <option value="50">50</option>
                                                            <option value="100">100</option>
                                                        </select> </label></div>
                                            </div>
                                            <div class="col-sm-12 col-md-6">
                                                <div id="example1_filter" class="dataTables_filter"><label>Search:<input
                                                            type="search" class="form-control form-control-sm"
                                                            placeholder="" aria-controls="example1"></label></div>
                                            </div>
                                        </div>

                                        <div class="table-responsive custom-height">
                                            <table class="table custom-table mt-2">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Applied On</th>
                                                        <th>Experience </th>
                                                        <th>Current Designation</th>
                                                        <th>Expected Salary</th>
                                                        <th>Notice Period</th>
                                                        <th>Actions</th>


                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>John Due</td>
                                                        <td>5/2/2020</td>
                                                        <td>2 Year</td>
                                                        <td>Web Designer</td>
                                                        <td>50,0000</td>
                                                        <td>1 Month</td>
                                                        <td>
                                                            <a class="btn btn-sm btn-primary text-white"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="Shortlisted"><i
                                                                    class="fas fa-check"></i></a>

                                                            <a class="btn btn-sm btn-danger text-white"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="Rejected"><i
                                                                    class="fas fa-closed-captioning"></i></a>

                                                            <a class="btn btn-sm btn-primary text-white"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="Interview Schedule"><i
                                                                    class="fas fa-calendar"></i></a>

                                                            <a class="btn btn-sm btn-danger text-white"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="Offer Letter"><i
                                                                    class="fas fa-file-archive"></i></a>

                                                            <a class="btn btn-sm btn-primary text-white"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="Hire"><i
                                                                    class="fas fa-thumbs-up"></i></a>

                                                            <a class="btn btn-sm btn-danger text-white"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="Message"><i
                                                                    class="fa fa-weixin"></i></a>

                                                            <a class="btn btn-sm btn-primary text-white"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="Save For Future"><i
                                                                    class="fas fa-star"></i></a>

                                                        </td>


                                                    </tr>

                                                    <tr>
                                                        <td>John Due</td>
                                                        <td>5/2/2020</td>
                                                        <td>2 Year</td>
                                                        <td>Web Designer</td>
                                                        <td>50,0000</td>
                                                        <td>1 Month</td>
                                                        <td>
                                                            <a class="btn btn-sm btn-primary text-white"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="Shortlisted"><i
                                                                    class="fas fa-check"></i></a>

                                                            <a class="btn btn-sm btn-danger text-white"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="Rejected"><i
                                                                    class="fas fa-closed-captioning"></i></a>

                                                            <a class="btn btn-sm btn-primary text-white"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="Interview Schedule"><i
                                                                    class="fas fa-calendar"></i></a>

                                                            <a class="btn btn-sm btn-danger text-white"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="Offer Letter"><i
                                                                    class="fas fa-file-archive"></i></a>

                                                            <a class="btn btn-sm btn-primary text-white"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="Hire"><i
                                                                    class="fas fa-thumbs-up"></i></a>

                                                            <a class="btn btn-sm btn-danger text-white"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="Message"><i
                                                                    class="fa fa-weixin"></i></a>

                                                            <a class="btn btn-sm btn-primary text-white"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="Save For Future"><i
                                                                    class="fas fa-star"></i></a>

                                                        </td>


                                                    </tr>

                                                </tbody>
                                            </table>
                                            <div class="row">
                                                <div class="col-sm-12 col-md-5">
                                                    <div class="dataTables_info" id="example1_info" role="status"
                                                        aria-live="polite">Showing 1 to 10 of 57 entries</div>
                                                </div>
                                                <div class="col-sm-12 col-md-7">
                                                    <div class="dataTables_paginate paging_simple_numbers"
                                                        id="example1_paginate">
                                                        <ul class="pagination">
                                                            <li class="paginate_button page-item previous disabled"
                                                                id="example1_previous"><a href="#"
                                                                    aria-controls="example1" data-dt-idx="0"
                                                                    tabindex="0" class="page-link">Previous</a></li>
                                                            <li class="paginate_button page-item active"><a href="#"
                                                                    aria-controls="example1" data-dt-idx="1"
                                                                    tabindex="0" class="page-link">1</a></li>
                                                            <li class="paginate_button page-item "><a href="#"
                                                                    aria-controls="example1" data-dt-idx="2"
                                                                    tabindex="0" class="page-link">2</a></li>
                                                            <li class="paginate_button page-item "><a href="#"
                                                                    aria-controls="example1" data-dt-idx="3"
                                                                    tabindex="0" class="page-link">3</a></li>
                                                            <li class="paginate_button page-item "><a href="#"
                                                                    aria-controls="example1" data-dt-idx="4"
                                                                    tabindex="0" class="page-link">4</a></li>
                                                            <li class="paginate_button page-item "><a href="#"
                                                                    aria-controls="example1" data-dt-idx="5"
                                                                    tabindex="0" class="page-link">5</a></li>
                                                            <li class="paginate_button page-item "><a href="#"
                                                                    aria-controls="example1" data-dt-idx="6"
                                                                    tabindex="0" class="page-link">6</a></li>
                                                            <li class="paginate_button page-item next"
                                                                id="example1_next"><a href="#" aria-controls="example1"
                                                                    data-dt-idx="7" tabindex="0"
                                                                    class="page-link">Next</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>


                                    </div>

                                    <!-- Offer tab end -->


                                    <!-- hire tab start -->

                                    <div id="Hire" class="tab-pane fade">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-6">
                                                <div class="dataTables_length" id="example1_length"><label>Show
                                                        entries<select name="example1_length" aria-controls="example1"
                                                            class="custom-select custom-select-sm form-control form-control-sm">
                                                            <option value="10">10</option>
                                                            <option value="25">25</option>
                                                            <option value="50">50</option>
                                                            <option value="100">100</option>
                                                        </select> </label></div>
                                            </div>
                                            <div class="col-sm-12 col-md-6">
                                                <div id="example1_filter" class="dataTables_filter"><label>Search:<input
                                                            type="search" class="form-control form-control-sm"
                                                            placeholder="" aria-controls="example1"></label></div>
                                            </div>
                                        </div>

                                        <div class="table-responsive custom-height">
                                            <table class="table custom-table mt-2">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Applied On</th>
                                                        <th>Experience </th>
                                                        <th>Current Designation</th>
                                                        <th>Expected Salary</th>
                                                        <th>Notice Period</th>
                                                        <th>Actions</th>


                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>John Due</td>
                                                        <td>5/2/2020</td>
                                                        <td>2 Year</td>
                                                        <td>Web Designer</td>
                                                        <td>50,0000</td>
                                                        <td>1 Month</td>
                                                        <td>
                                                            <a class="btn btn-sm btn-primary text-white"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="Shortlisted"><i
                                                                    class="fas fa-check"></i></a>

                                                            <a class="btn btn-sm btn-danger text-white"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="Rejected"><i
                                                                    class="fas fa-closed-captioning"></i></a>

                                                            <a class="btn btn-sm btn-primary text-white"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="Interview Schedule"><i
                                                                    class="fas fa-calendar"></i></a>

                                                            <a class="btn btn-sm btn-danger text-white"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="Offer Letter"><i
                                                                    class="fas fa-file-archive"></i></a>

                                                            <a class="btn btn-sm btn-primary text-white"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="Hire"><i
                                                                    class="fas fa-thumbs-up"></i></a>

                                                            <a class="btn btn-sm btn-danger text-white"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="Message"><i
                                                                    class="fa fa-weixin"></i></a>

                                                            <a class="btn btn-sm btn-primary text-white"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="Save For Future"><i
                                                                    class="fas fa-star"></i></a>

                                                        </td>


                                                    </tr>

                                                </tbody>
                                            </table>
                                            <div class="row">
                                                <div class="col-sm-12 col-md-5">
                                                    <div class="dataTables_info" id="example1_info" role="status"
                                                        aria-live="polite">Showing 1 to 10 of 57 entries</div>
                                                </div>
                                                <div class="col-sm-12 col-md-7">
                                                    <div class="dataTables_paginate paging_simple_numbers"
                                                        id="example1_paginate">
                                                        <ul class="pagination">
                                                            <li class="paginate_button page-item previous disabled"
                                                                id="example1_previous"><a href="#"
                                                                    aria-controls="example1" data-dt-idx="0"
                                                                    tabindex="0" class="page-link">Previous</a></li>
                                                            <li class="paginate_button page-item active"><a href="#"
                                                                    aria-controls="example1" data-dt-idx="1"
                                                                    tabindex="0" class="page-link">1</a></li>
                                                            <li class="paginate_button page-item "><a href="#"
                                                                    aria-controls="example1" data-dt-idx="2"
                                                                    tabindex="0" class="page-link">2</a></li>
                                                            <li class="paginate_button page-item "><a href="#"
                                                                    aria-controls="example1" data-dt-idx="3"
                                                                    tabindex="0" class="page-link">3</a></li>
                                                            <li class="paginate_button page-item "><a href="#"
                                                                    aria-controls="example1" data-dt-idx="4"
                                                                    tabindex="0" class="page-link">4</a></li>
                                                            <li class="paginate_button page-item "><a href="#"
                                                                    aria-controls="example1" data-dt-idx="5"
                                                                    tabindex="0" class="page-link">5</a></li>
                                                            <li class="paginate_button page-item "><a href="#"
                                                                    aria-controls="example1" data-dt-idx="6"
                                                                    tabindex="0" class="page-link">6</a></li>
                                                            <li class="paginate_button page-item next"
                                                                id="example1_next"><a href="#" aria-controls="example1"
                                                                    data-dt-idx="7" tabindex="0"
                                                                    class="page-link">Next</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>


                                    </div>

                                    <!-- Hire tab end -->


                                    <!-- saveforfuture tab start -->

                                    <div id="SaveForFuture" class="tab-pane fade">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-6">
                                                <div class="dataTables_length" id="example1_length"><label>Show
                                                        entries<select name="example1_length" aria-controls="example1"
                                                            class="custom-select custom-select-sm form-control form-control-sm">
                                                            <option value="10">10</option>
                                                            <option value="25">25</option>
                                                            <option value="50">50</option>
                                                            <option value="100">100</option>
                                                        </select> </label></div>
                                            </div>
                                            <div class="col-sm-12 col-md-6">
                                                <div id="example1_filter" class="dataTables_filter"><label>Search:<input
                                                            type="search" class="form-control form-control-sm"
                                                            placeholder="" aria-controls="example1"></label></div>
                                            </div>
                                        </div>

                                        <div class="table-responsive custom-height">
                                            <table class="table custom-table mt-2">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Applied On</th>
                                                        <th>Experience </th>
                                                        <th>Current Designation</th>
                                                        <th>Expected Salary</th>
                                                        <th>Notice Period</th>
                                                        <th>Actions</th>


                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>John Due</td>
                                                        <td>5/2/2020</td>
                                                        <td>2 Year</td>
                                                        <td>Web Designer</td>
                                                        <td>50,0000</td>
                                                        <td>1 Month</td>
                                                        <td>
                                                            <a class="btn btn-sm btn-primary text-white"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="Shortlisted"><i
                                                                    class="fas fa-check"></i></a>

                                                            <a class="btn btn-sm btn-danger text-white"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="Rejected"><i
                                                                    class="fas fa-closed-captioning"></i></a>

                                                            <a class="btn btn-sm btn-primary text-white"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="Interview Schedule"><i
                                                                    class="fas fa-calendar"></i></a>

                                                            <a class="btn btn-sm btn-danger text-white"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="Offer Letter"><i
                                                                    class="fas fa-file-archive"></i></a>

                                                            <a class="btn btn-sm btn-primary text-white"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="Hire"><i
                                                                    class="fas fa-thumbs-up"></i></a>

                                                            <a class="btn btn-sm btn-danger text-white"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="Message"><i
                                                                    class="fa fa-weixin"></i></a>

                                                            <a class="btn btn-sm btn-primary text-white"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="Save For Future"><i
                                                                    class="fas fa-star"></i></a>

                                                        </td>


                                                    </tr>

                                                    <tr>
                                                        <td>John Due</td>
                                                        <td>5/2/2020</td>
                                                        <td>2 Year</td>
                                                        <td>Web Designer</td>
                                                        <td>50,0000</td>
                                                        <td>1 Month</td>
                                                        <td>
                                                            <a class="btn btn-sm btn-primary text-white"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="Shortlisted"><i
                                                                    class="fas fa-check"></i></a>

                                                            <a class="btn btn-sm btn-danger text-white"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="Rejected"><i
                                                                    class="fas fa-closed-captioning"></i></a>

                                                            <a class="btn btn-sm btn-primary text-white"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="Interview Schedule"><i
                                                                    class="fas fa-calendar"></i></a>

                                                            <a class="btn btn-sm btn-danger text-white"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="Offer Letter"><i
                                                                    class="fas fa-file-archive"></i></a>

                                                            <a class="btn btn-sm btn-primary text-white"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="Hire"><i
                                                                    class="fas fa-thumbs-up"></i></a>

                                                            <a class="btn btn-sm btn-danger text-white"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="Message"><i
                                                                    class="fa fa-weixin"></i></a>

                                                            <a class="btn btn-sm btn-primary text-white"
                                                                data-toggle="tooltip" title=""
                                                                data-original-title="Save For Future"><i
                                                                    class="fas fa-star"></i></a>

                                                        </td>


                                                    </tr>

                                                </tbody>
                                            </table>
                                            <div class="row">
                                                <div class="col-sm-12 col-md-5">
                                                    <div class="dataTables_info" id="example1_info" role="status"
                                                        aria-live="polite">Showing 1 to 10 of 57 entries</div>
                                                </div>
                                                <div class="col-sm-12 col-md-7">
                                                    <div class="dataTables_paginate paging_simple_numbers"
                                                        id="example1_paginate">
                                                        <ul class="pagination">
                                                            <li class="paginate_button page-item previous disabled"
                                                                id="example1_previous"><a href="#"
                                                                    aria-controls="example1" data-dt-idx="0"
                                                                    tabindex="0" class="page-link">Previous</a></li>
                                                            <li class="paginate_button page-item active"><a href="#"
                                                                    aria-controls="example1" data-dt-idx="1"
                                                                    tabindex="0" class="page-link">1</a></li>
                                                            <li class="paginate_button page-item "><a href="#"
                                                                    aria-controls="example1" data-dt-idx="2"
                                                                    tabindex="0" class="page-link">2</a></li>
                                                            <li class="paginate_button page-item "><a href="#"
                                                                    aria-controls="example1" data-dt-idx="3"
                                                                    tabindex="0" class="page-link">3</a></li>
                                                            <li class="paginate_button page-item "><a href="#"
                                                                    aria-controls="example1" data-dt-idx="4"
                                                                    tabindex="0" class="page-link">4</a></li>
                                                            <li class="paginate_button page-item "><a href="#"
                                                                    aria-controls="example1" data-dt-idx="5"
                                                                    tabindex="0" class="page-link">5</a></li>
                                                            <li class="paginate_button page-item "><a href="#"
                                                                    aria-controls="example1" data-dt-idx="6"
                                                                    tabindex="0" class="page-link">6</a></li>
                                                            <li class="paginate_button page-item next"
                                                                id="example1_next"><a href="#" aria-controls="example1"
                                                                    data-dt-idx="7" tabindex="0"
                                                                    class="page-link">Next</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>


                                    </div>

                                    <!-- SaveForFuture tab end -->
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </section>


        <main-footer></main-footer>
    </div>
</template>

<script>
    export default {
        name: "Accountexicutive",

    }
</script>

<style scoped>

</style>