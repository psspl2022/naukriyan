<template>
    <div id="PackageInfo">
        <Emp-header></Emp-header>
        <section class="top-adjust pt-5 pb-5">
            <div id="breadcrumb">
                <div class="breadcrumb-wrapper">

                    <div class="container">

                        <div class="row">

                            <div class="col-xs-12 col-sm-8">
                                <ol class="breadcrumb">
                                    <li><a href="#"><i class="fa fa-home mr-1"></i>Home</a></li>
                                    <li class="active">Packages Information</li>
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

        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered">
                            <tbody>
                            <tr>
                                <th>Package Name</th>
                                <td colspan="2">{{ packageObject.package_name }}</td>
                            </tr>
                            <tr>
                                <th>Package For</th>
                                <td colspan="2">{{ packageObject.user_type }}</td>
                            </tr>
                            <tr>
                                <th>Package Validity</th>
                                <td colspan="2">{{ packageObject.validity }}</td>
                            </tr>
                            <tr class="tbl-heading">
                                <th colspan="3">Package Information</th>
                            </tr>
                            <tr>
                                <th>#LIST</th>
                                <th>Total</th>
                                <th>Available</th>
                            </tr>
                            <tr>
                                <th>Total Job Post</th>
                                <td>{{ packageObject.package_total_jobs }}</td>
                                <td>00</td>
                            </tr>
                            <tr>
                                <th>Export Excel</th>
                                <td>{{ packageObject.package_total_excel_export }}</td>
                                <td>00</td>
                            </tr>
                            <tr>
                                <th>Total Resume Download</th>
                                <td>{{ packageObject.package_total_resume_downloads }}</td>
                                <td>00</td>
                            </tr>
                            <tr>
                                <th>Resume Views</th>
                                <td>{{ packageObject.package_total_resume_views }}</td>
                                <td>00</td>
                            </tr>
                            <tr>
                                <th>Resume Forward</th>
                                <td>{{ packageObject.package_total_resume_forward }}</td>
                                <td>00</td>
                            </tr>
                            <tr>
                                <th>Resume Search</th>
                                <td>{{ packageObject.package_total_resume_search }}</td>
                                <td>00</td>
                            </tr>
                            <tr>
                                <th>Total Email</th>
                                <td>{{ packageObject.package_total_email }}</td>
                                <td>00</td>
                            </tr>
                            <tr>
                                <th>Total SMS</th>
                                <td>{{ packageObject.package_total_sms }}</td>
                                <td>00</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>

        <main-footer></main-footer>
    </div>
</template>

<script>
    export default {
        name: "PackageInfo",
        data() {
            return {
                packageObject: {},
                packageID: this.$route.params.id
            }
        },
        mounted() {
            axios.get('subscriber-package-info/'+this.packageID).then(response => {
                this.packageObject = response.data.data;
            })
        }
    }
</script>

<style scoped>
    .tbl-heading {
        text-align: center;
        text-transform: uppercase;
        background: tomato;
        color: white;
    }
</style>
