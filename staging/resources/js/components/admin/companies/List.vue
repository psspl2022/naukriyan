<template>
    <div>
        <section class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">

                            <a href="" @click.prevent="exportCompanies()" type="button"
                               class="btn btn-success btn-xl" :class="{disabled : allExportStatus}">
                                {{ allExportStatus ? 'Data Exporting...' : 'Data Export in Excel' }}</a>

                            <a href="" type="button" @click.prevent="exportCompaniesChecked()"
                               class="btn btn-success btn-xl" :class="{disabled : checkedExportStatus}" id="checkboxsButton">
                                {{ checkedExportStatus ? 'Data Exporting...' : 'Data Export with Checked Row' }}</a>
                            <button class="btn btn-primary gr">
                                <router-link to="/add-companies" style="color:#fff"> Add Company</router-link>
                            </button>

                        </div>

                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <select name="industry_id" class="form-control" v-model="industry_id">
                                            <option value="">-- Select Industry Name --</option>
                                            <option v-for='data in industries' :value='data.id'>{{ data.category_name
                                                }}
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <select name="employee_range" class="form-control" v-model="employee_range">
                                            <option value="">-- Select Employee Range --</option>
                                            <option value="1-10">1-10</option>
                                            <option value="11-100">11-100</option>
                                            <option value="101-1000">101-1000</option>
                                            <option value="1001-10000">1001-10000</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="text" name="cin_no" class="form-control" v-model="cin_no"
                                               placeholder="Enter CIN">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <select name="status" class="form-control" v-model="status">
                                                    <option value="">Status</option>
                                                    <option value="yes">Yes</option>
                                                    <option value="no">No</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <button type="submit" name="submit" class="btn btn-primary"
                                                        @click="getFilterData()">Search
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                          <table id="example1"
                                 class="table table-bordered table-hover dt-responsive table-striped">
                            <thead>
                            <tr>
                              <th>#</th>
                              <th>SNo</th>
                              <th>Company Name</th>
                              <th>CIN</th>
                              <th>Contact No.</th>
                              <th>No.of Employee</th>
                              <th>Mark as Top</th>
                              <th>Mark as Featured</th>
                              <th>Active</th>
                              <th width="14%">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="(companies,index) in CompaniesData.data" :key="companies.id">
                              <td><input type="checkbox" id="jack" :value="companies.id"
                                         @click="uncheck(companies.id)" v-model="checkedNames"></td>
                              <td>{{index+1}}</td>
                              <td>{{ companies.company_name }}</td>

                              <td>{{ (companies.cin_no) ? companies.cin_no : 'Not Available' }}</td>

                              <td>{{ (companies.com_contact) ? companies.com_contact : 'Not Available'
                                }}
                              </td>
                              <td>{{ (companies.no_of_employee) ? companies.no_of_employee : '0' }}
                              </td>
                              <td><input @click.prevent="disableMarked(companies.id)"
                                         name="marked_top" type="checkbox"
                                         v-if="companies.marked_top==='Yes'" checked>
                                <input @click.prevent="enableMarked(companies.id)" name="marked_top"
                                       type="checkbox" v-if="companies.marked_top==='No'"></td>

                              <td><input @click.prevent="disableFeatured(companies.id)"
                                         name="marked_featured" type="checkbox"
                                         v-if="companies.marked_featured==='Yes'" checked>
                                <input @click.prevent="enableFeatured(companies.id)"
                                       name="marked_featured" type="checkbox"
                                       v-if="companies.marked_featured==='No'"></td>

                              <td>{{ companies.active }}</td>
                              <td>

                                <router-link :to="`/edit-companies/${companies.id}`"><i
                                    class="far fa-edit"></i></router-link>
                                <a href="" @click.prevent="deleteCompany(companies.id)"><i
                                    class="far fa-trash-alt"></i></a>
                                <a href="" @click.prevent="deactivateCompany(companies.id)"
                                   v-if="companies.active==='Yes'">
                                  <button name="status" type="button" value=""
                                          class="btn btn-danger btn-xs">De-Active
                                  </button>
                                </a>

                                <a href="" @click.prevent="activeCompany(companies.id)"
                                   v-if="companies.active==='No'">
                                  <button name="status" type="button" value=""
                                          class="btn btn-success btn-xs">Active
                                  </button>
                                </a>
                              </td>
                            </tr>
                            </tbody>
                          </table>
                        </div>

                        <div class="card-footer">
                          <pagination :data="CompaniesData" @pagination-change-page="getFilterData"></pagination>
                        </div>
                    </div>

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
</template>

<script>
    export default {
        name: "List",
        data() {
            return {
                checkedNames: [],
                checkedName: true,
                industry: 0,
                industries: [],
                industry_id: '',
                employee_range: '',
                cin_no: '',
                status: '',
                CompaniesData: [],
                allExportStatus: false,
                checkedExportStatus: false
            }
        },
        methods: {
            uncheck: function (id) {
                this.checkedName = !this.checkedName;
                let cv = document.getElementById("checkvalue").value;
                document.getElementById("checkvalue").value = id + "," + cv;
            },
            getFilterData(page = 1) {
                axios.get('companies-filter?industry_id=' + this.industry_id + '&employee_range=' + this.employee_range + '&cin_no=' + this.cin_no + '&status=' + this.status + '&page=' + page).then(response => {
                    this.CompaniesData = response.data.data;
                });
            },
            getIndustries: function () {
                axios.get('get-industries-list')
                    .then(function (response) {
                        this.industries = response.data;
                    }.bind(this));
            },
            deactivateCompany(id) {
                var uri = '/deactive-companies/' + id;
                swal.fire({
                    title: 'Are you sure want to change?',
                    text: "You would be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, change it!'
                }).then((result) => {
                    if (result.value) {
                        axios.get(uri).then(response => {
                            if (response.status === 200) {
                                swal.fire(
                                    'Change status!',
                                    'Your status has been changed.',
                                    'success'
                                )

                                this.getFilterData();
                            }
                        });
                    }
                });
            },
            activeCompany(id) {
                var uri = '/active-companies/' + id;
                swal.fire({
                    title: 'Are you sure want to change?',
                    text: "You would be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, change it!'
                }).then((result) => {
                    if (result.value) {
                        axios.get(uri).then(response => {
                            if (response.status === 200) {
                                swal.fire(
                                    'Change status!',
                                    'Your status has been changed.',
                                    'success'
                                )

                                this.getFilterData();
                            }
                        });
                    }
                });
            },
            enableMarked(id) {
                var uri = '/marked-top-enable/' + id;
                swal.fire({
                    title: 'Are you sure want to change Status',
                    text: "You would be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, change it!'
                }).then((result) => {
                    if (result.value) {
                        swal.fire(
                            'Change status!',
                            'Your status has been changed.',
                            'success'
                        )

                        axios.get(uri).then(response => {
                            this.$router.push('/companies-list')
                            window.location.reload();
                        });

                    }
                });
            },
            disableMarked(id) {
                var uri = '/marked-top-disable/' + id;
                swal.fire({
                    title: 'Are you sure want to change Status',
                    text: "You would be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, change it!'
                }).then((result) => {
                    if (result.value) {
                        axios.get(uri).then(response => {
                            this.$router.push('/companies-list')
                            window.location.reload();
                            swal.fire(
                                'Change status!',
                                'Your status has been changed.',
                                'success'
                            )
                        });
                    }
                });
            },
            enableFeatured(id) {
                var uri = '/marked-featured-enable/' + id;
                swal.fire({
                    title: 'Are you sure want to change Status',
                    text: "You would be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, change it!'
                }).then((result) => {
                    if (result.value) {
                        axios.get(uri).then(response => {
                            swal.fire(
                                'Change status!',
                                'Your status has been changed.',
                                'success'
                            )
                            window.location.reload();
                        });

                    }
                });
            },
            disableFeatured(id) {
                var uri = '/marked-featured-disable/' + id;
                swal.fire({
                    title: 'Are you sure want to change Status',
                    text: "You would be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, change it!'
                }).then((result) => {
                    if (result.value) {
                        axios.get(uri).then(response => {
                            swal.fire(
                                'Change status!',
                                'Your status has been changed.',
                                'success'
                            )
                            window.location.reload();
                        });
                    }
                });
            },
            exportCompanies() {
                swal.fire({
                    title: 'Are you sure want export all data?',
                    text: "Company details!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, export it!'
                }).then((result) => {
                    if (result.value) {
                        this.allExportStatus = true;
                        axios.get('export-companies').then(response => {
                            if (response.status === 200) {
                                toast({
                                    type: 'success',
                                    title: 'Data Exported successfully.',
                                })
                                this.allExportStatus = false;
                                window.open('/export-companies', '_blank');
                            } else {
                                toast({
                                    type: 'warning',
                                    title: 'Something went wrong.',
                                })
                                this.allExportStatus = false;
                            }
                        }).catch(error => {
                            toast({
                                type: 'warning',
                                title: 'Something went wrong.',
                            })
                            this.allExportStatus = false;
                        })
                    }
                });
            },
            exportCompaniesChecked() {
                if (!this.checkedNames.length) {
                    alert('Please select at least one row');
                } else {
                    swal.fire({
                        title: 'Are you sure want export all data?',
                        text: "Company details!",
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, export it!'
                    }).then((result) => {
                        if (result.value) {
                            this.checkedExportStatus = true;
                            axios.get('export-companies-checked/' + this.checkedNames).then(response => {
                                if (response.status === 200) {
                                    toast({
                                        type: 'success',
                                        title: 'Data Exported successfully.',
                                    })
                                    window.open('/export-companies-checked/' + this.checkedNames, '_blank');
                                    this.checkedExportStatus = false;
                                } else {
                                    toast({
                                        type: 'success',
                                        title: 'Something went wrong.',
                                    })
                                    this.checkedExportStatus = false;
                                }
                            }).catch(error => {
                                toast({
                                    type: 'success',
                                    title: 'Something went wrong.',
                                })
                                this.checkedExportStatus = false;
                            })
                        }
                    });
                }
            },
            deleteCompany(id) {
                var uri = '/companies/' + id;
                swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.value) {
                        axios.get(uri).then(response => {
                            if (response.status === 200) {
                                swal.fire(
                                    'Deleted!',
                                    'Your file has been deleted.',
                                    'success'
                                )
                                this.getFilterData();
                            }
                        });
                    }
                });
            }
        },
        created: function () {
            this.getIndustries()
            this.getFilterData()
        }
    }
</script>

<style scoped>
</style>
