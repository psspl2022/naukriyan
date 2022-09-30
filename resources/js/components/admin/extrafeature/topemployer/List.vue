<template>
    <div>
        <section class="content">
            <div class="row justify-content-around" >
                <div class="col-11 ">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Top Employers</h3>
                        </div>
                        <div class="card-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12">
                                        <table class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <th>SN#</th>
                                                <th>Company Name</th>
                                                <th>Address</th>
                                                <th>Email</th>
                                                <th>Contact</th>
                                                <th>Mark Top</th>
                                                <th>Status</th>
                                                <th>Position</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-for="(item, index) in employers" :key="item.id">
                                                    <td>{{ index+1 }}</td>
                                                    <td>{{ item.company_name }}</td>
                                                    <td>{{ item.address }}</td>
                                                    <td>{{ item.com_email }}</td>
                                                    <td>{{ item.com_contact }}</td>
                                                    <td>
                                                        <input type="checkbox" :checked="item.marked_top === 'Yes'" @click="onToggleChange(item.id, $event)"><label for="switch">Toggle</label>
                                                    </td>
                                                    <td>
                                                        <select name="status" @change="onStatusChange(item.id, $event)">
                                                            <option value="Yes" :selected="item.active === 'Yes'">Active</option>
                                                            <option value="No" :selected="item.active === 'No'">Deactive</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select name="position" @change="onPositionChange(item.id, $event)">
                                                            <option :value="num" v-for="num in positionDropdown" :selected="item.position === num">{{ num }}</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
    export default {
        name: "List",
        data() {
            return {
                employers: {},
                status: '',
                positionDropdown: [1,2,3,4,5,6,7,8,9,10],
            }
        },
        methods: {
            onPositionChange(id, event) {
                $("body").css("cursor", "wait");
                axios.post('top-employers/change-position/position/'+event.target.value+ '/id/'+id).then(response => {
                    if(response.data.status === 'Success') {
                        toast({
                            type: 'success',
                            title: response.data.data
                        })
                    }
                    Fire.$emit('afterUpdate');
                    $("body").css("cursor", "default");
                });
            },

            onToggleChange(id, event) {
                let markTop = '';
                let mark = event.target.checked;
                if(mark === true) {
                    markTop = 'Yes'
                } else {
                    markTop = 'No';
                }
                $("body").css("cursor", "wait");
                axios.post('top-employers/mark-as-top/status/'+markTop+ '/id/'+id).then(response => {
                    if(response.data.status === 'Success') {
                        toast({
                            type: 'success',
                            title: response.data.data
                        })
                    }
                    Fire.$emit('afterUpdate');
                    $("body").css("cursor", "default");
                });

            },
            onStatusChange(id, event) {
                $("body").css("cursor", "wait");
                axios.post('top-employers/update-status/status/'+event.target.value+ '/id/'+id).then(response => {
                    if(response.data.status === 'Success') {
                        toast({
                            type: 'success',
                            title: response.data.data
                        })
                    }
                    Fire.$emit('afterUpdate');
                    $("body").css("cursor", "default");
                });
            },
            getTopEmployers() {
                axios.get('top-employers').then(response => {
                    if(response.data.status === 'Success') {
                        this.employers = response.data.data;
                    }
                });
            }
        },
        created: function() {
            this.getTopEmployers();
            Fire.$on('afterUpdate', () => {
                this.getTopEmployers();
            })
        }
    }
</script>

<style scoped>

</style>
