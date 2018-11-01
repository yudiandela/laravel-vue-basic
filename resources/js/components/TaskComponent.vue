<template>
    <div class="container">
        <div class="row ">
            <div class="col-md-10 offset-md-1">
                <div class="card rounded-0">
                    <div class="card-header">
                        Task List
                        <button class="btn btn-primary btn-sm rounded-0 float-right" @click="addTask()">
                            <i class="fa fa-plus"></i> Add New Task
                        </button>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Task Title</th>
                                    <th>Priority</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(task, index) in tasks" :key="index">
                                    <td>{{ index + 1 }}</td>
                                    <td>{{ task.name }}</td>
                                    <td>{{ task.prior }}</td>
                                    <td class="text-center">
                                        <button @click="updateTask(task)" class="btn btn-secondary btn-sm rounded-0"><i class="fa fa-edit"></i></button>
                                        <button class="btn btn-danger btn-sm rounded-0"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="ModalTask" tabindex="-1" role="dialog" aria-labelledby="ModalTaskLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content rounded-0">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ModalTaskLabel" v-if="edit">Edit Task</h5>
                        <h5 class="modal-title" id="ModalTaskLabel" v-else>Add Task</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div v-if="errors.length > 0" class="alert alert-danger rounded-0 p-0" role="alert">
                            <ul class="list-group list-group-flush">
                                <li v-for="(error, key) in errors" :key="key" class="list-group-item">
                                    {{ error }}
                                </li>
                            </ul>
                        </div>

                        <div class="form-group">
                            <label for="">Task Name</label>
                            <input v-model="task.name" type="text" name="name" class="form-control rounded-0">
                        </div>

                        <div class="form-group">
                            <label for="">Priority</label>
                            <select v-model="task.prior" name="prior" id="" class="form-control rounded-0">
                                <option value="low">Low</option>
                                <option value="medium">Medium</option>
                                <option value="high">High</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button @click="resetFormModal()" type="button" class="btn btn-warning rounded-0">Reset Form</button>
                        <button @click="hideModal()" type="button" class="btn btn-secondary rounded-0" data-dismiss="modal">Close</button>
                        <button @click="saveTask()" type="button" class="btn btn-primary rounded-0">Submit Data</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            tasks: [],
            task: {
                id: '',
                name:'',
                prior:''
            },
            errors: [],
            edit: false
        }
    },

    methods: {
        showModal() {
            this.errors = []
            $("#ModalTask").modal("show");
        },

        hideModal() {
            $("#ModalTask").modal("hide")
        },

        getTasks() {
            axios.get('/task')
                .then(response => {
                    this.tasks = response.data.data
                })
        },

        saveTask() {
            this.errors = []
            if (this.edit === false) {
                axios.post('/task', {
                    name: this.task.name,
                    prior: this.task.prior
                })
                .then(response => {
                    this.getTasks()
                    this.resetFormModal()
                    this.hideModal()
                })
                .catch(error => {
                    if(error.response.data.errors.name){
                        this.errors.push(error.response.data.errors.name[0])
                    }
                    if(error.response.data.errors.prior){
                        this.errors.push(error.response.data.errors.prior[0])
                    }
                })
            } else {
                axios.put('/task/' + this.task.id, {
                    name: this.task.name,
                    prior: this.task.prior
                })
                .then(response => {
                    this.getTasks()
                    this.resetFormModal()
                    this.hideModal()
                })
                .catch(error => {
                    if(error.response.data.errors.name){
                        this.errors.push(error.response.data.errors.name[0])
                    }
                    if(error.response.data.errors.prior){
                        this.errors.push(error.response.data.errors.prior[0])
                    }
                })
            }
        },

        addTask(task) {
            this.resetFormModal()
            this.edit = false
            this.showModal()
        },

        updateTask(task) {
            this.task.id = task.id
            this.task.name = task.name
            this.task.prior = task.prior

            this.edit = true

            this.showModal()
        },

        resetFormModal() {
            this.errors = []
            this.task.name = '',
            this.task.prior = ''
        }
    },

    mounted() {
        this.getTasks()
    }
}
</script>

