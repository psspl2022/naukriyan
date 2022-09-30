<template>
    <div id="enquirieslist">
        <Emp-header></Emp-header>
          <section class="top-adjust pt-5 pb-5">
            <div id="breadcrumb">
                <div class="breadcrumb-wrapper">

                    <div class="container">

                        <div class="row">

                            <div class="col-xs-12 col-sm-8">
                                <ol class="breadcrumb">
                                    <li><a href="#"><i class="fa fa-home mr-1"></i>Home</a></li>
                                    <li class="active">Enquiry List</li>
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
        <section class="top-adjust section pb-5 pt-0 mt-0">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="cms-pg-header">
                            <h2 class="hk-pg-title">Enquiry List</h2>
                            <a href="" class="btn btn-primary text-white" data-toggle="modal"
                                data-target="#addEnquiry"><i class="fas fa-plus mr-2"></i>Add Enquiry</a>
                        </div>


                        <div class="card mt-3">

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <div class="dataTables_length" id="example1_length"><label>Show entries<select
                                                    name="example1_length" aria-controls="example1"
                                                    class="custom-select custom-select-sm form-control form-control-sm">
                                                    <option value="10">10</option>
                                                    <option value="25">25</option>
                                                    <option value="50">50</option>
                                                    <option value="100">100</option>
                                                </select> </label></div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div id="example1_filter" class="dataTables_filter"><label>Search:<input
                                                    type="search" class="form-control form-control-sm" placeholder=""
                                                    aria-controls="example1"></label></div>
                                    </div>
                                </div>
                                <div class="table-responsive custom-height">
                                    <table class="table table-head-fixed custom-table mt-2">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Enquiry Type</th>
                                                <th>Message</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>183</td>
                                                <td>John Doe</td>
                                                <td>JohnDoe@gmail.com</td>
                                                <td>Gernal Enquiry</td>
                                                <td>Lorem Ipsum is simply dummy text of the printing and typesetting
                                                    industry. </td>
                                                <td> <select
                                                        class="custom-select custom-select-sm form-control form-control-sm"
                                                        id="sel1">
                                                        <option>Open</option>
                                                        <option>Close</option>
                                                        <option>Dropped</option>
                                                    </select></td>

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
                                                        id="example1_previous"><a href="#" aria-controls="example1"
                                                            data-dt-idx="0" tabindex="0" class="page-link">Previous</a>
                                                    </li>
                                                    <li class="paginate_button page-item active"><a href="#"
                                                            aria-controls="example1" data-dt-idx="1" tabindex="0"
                                                            class="page-link">1</a></li>
                                                    <li class="paginate_button page-item "><a href="#"
                                                            aria-controls="example1" data-dt-idx="2" tabindex="0"
                                                            class="page-link">2</a></li>
                                                    <li class="paginate_button page-item "><a href="#"
                                                            aria-controls="example1" data-dt-idx="3" tabindex="0"
                                                            class="page-link">3</a></li>
                                                    <li class="paginate_button page-item "><a href="#"
                                                            aria-controls="example1" data-dt-idx="4" tabindex="0"
                                                            class="page-link">4</a></li>
                                                    <li class="paginate_button page-item "><a href="#"
                                                            aria-controls="example1" data-dt-idx="5" tabindex="0"
                                                            class="page-link">5</a></li>
                                                    <li class="paginate_button page-item "><a href="#"
                                                            aria-controls="example1" data-dt-idx="6" tabindex="0"
                                                            class="page-link">6</a></li>
                                                    <li class="paginate_button page-item next" id="example1_next"><a
                                                            href="#" aria-controls="example1" data-dt-idx="7"
                                                            tabindex="0" class="page-link">Next</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                </div>


                            </div>
                        </div>

                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </section>
        <!-- The add Enquiry user start -->
        <div class="modal fade popupForm custom-model-width" id="addEnquiry">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Add Enquiry</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="form-group row">

                            <div class="col-sm-6">
                                <lable class="col-form-label" for="">Name</lable>
                                <input type="text" name="name" id="name" class="form-control custom-select"  placeholder="Enter Name">
                            </div>

                            <div class="col-sm-6">
                                <lable class="col-form-label" for="">Email</lable>
                                <input type="text" name="name" id="name" class="form-control custom-select" placeholder="Enter Email">
                            </div>
                        </div>
                        <div class="form-group row">

                            <div class="col-sm-6">
                                <lable class="col-form-label" for="">Contact</lable>
                                <input type="text" name="name" id="name" class="form-control custom-select" placeholder="Enter COntact">
                            </div>

                            <div class="col-sm-6">
                                <lable class="col-form-label" for="">Email</lable>
                                <input type="text" name="name" id="name"class="form-control custom-select" placeholder="Enter Email">
                            </div>
                        </div>
                        <div class="form-group row">

                            <div class="col-sm-12">
                                <lable class="col-form-label" for="">Subject</lable>
                                <select class="form-control custom-select" id="sel1">
                                    <option>Technical</option>
                                    <option>General</option>
                                    <option>Report an issue</option>
                                    <option>Feedback</option>
                                    <option>Other</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <lable class="col-form-label" for=""> Description</lable>
                                <textarea type="text" class="form-control" placeholder="Enter Your Message Here ....."
                                    id=""></textarea>
                            </div>
                        </div>

                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer justify-content-center">
                        <button type="button" class="btn btn-primary text-white">Save</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>
        <!-- The add Enquiry user end -->

        <main-footer></main-footer>
    </div>
</template>

<script>
    export default {
        name: "Enquirieslist",

    }
</script>

<style scoped>

</style>