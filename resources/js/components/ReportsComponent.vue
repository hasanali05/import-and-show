<template>
    <div>
        <h1>
            Report page
            
            <a class="btn btn-primary float-right" target="_blank" :href="`/pdf?employee_id=${this.employee_id}&in_time=${this.in_time}&out_time=${this.out_time}`">Pdf</a>
        </h1>
        <div class="form-group row">
            <label for="employee_id" class="col-sm-2 col-form-label">Employee Id</label>
            <div class="col-sm-10">
                <input type="text" id="employee_id" class="form-control" placeholder="Employee Id" v-model="employee_id" @keypress.enter="loadWorks">
            </div>
        </div>
        <div class="form-group row">
            <label for="in_time" class="col-sm-2 col-form-label">In time</label>
            <div class="col-sm-10">
                <input type="time" id="in_time" class="form-control" placeholder="In time" v-model="in_time">
            </div>
        </div>
        <div class="form-group row">
            <label for="out_time" class="col-sm-2 col-form-label">Out Time</label>
            <div class="col-sm-10">
                <input type="time" id="out_time" class="form-control" placeholder="Out Time" v-model="out_time">
            </div>
        </div>
        <div >
            <table class="table table-striped ">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Month</th>
                        <th scope="col">Day</th>
                        <th scope="col">Date</th>
                        <th scope="col">Employee Id</th>
                        <th scope="col">Employee name</th>
                        <th scope="col">Department</th>
                        <th scope="col">First In Time</th>
                        <th scope="col">Last Out Time</th>
                        <th scope="col">Hour of Work</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(work, workIndex) in works" :key="'works_' + workIndex">
                        <th scope="row">{{workIndex+1}}</th>
                        <td>{{work.month}}</td>
                        <td>{{work.day}}</td>
                        <td>{{work.date}}</td>
                        <td>{{work.employee_id}}</td>
                        <td>{{work.employee_name}}</td>
                        <td>{{work.department}}</td>
                        <td :class="{'bg-danger' : getDanger(work)}">{{work.first_in_time}} ( {{work.first_in_time_formatted}})</td>
                        <td :class="{'bg-warning' : getWarning(work)}">{{work.last_out_time}} ( {{work.last_out_time_formatted}})</td>
                        <td>{{work.hour_of_work}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>
<script>
export default {
    name: "ReportsComponent",
    data() {
        return {
            works: [],
            employee_id: '',
            in_time: '',
            out_time: '',
        };
    },
    mounted() {
        this.loadWorks();
    },
    methods: {
        loadWorks() {
            axios.get('/works', { params: {employee_id: this.employee_id}})
            .then((response) => {
                this.works = response.data.data
            })
        }, 
        getDanger(work) {
            let response = false;
            if(this.in_time) {
                response = work.first_in_time > this.in_time
            }
            return response
        },
        getWarning(work) {
            let response = false;
            if(this.out_time) {
                response = work.last_out_time < this.out_time
            }
            return response
        },
    }
}
</script>
