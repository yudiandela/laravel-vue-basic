<template>
    <div class="container">
        <div class="row ">
            <div class="col-md-10 offset-md-1">
                <div class="card rounded-0">
                    <div class="card-header">
                        Task List
                        <button class="btn btn-primary btn-sm rounded-0 float-right" @click="showModal()">
                            <i class="fa fa-plus"></i> Add New Task
                        </button>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Task Name</th>
                                    <th>Priority</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Nama Task</td>
                                    <td>high</td>
                                    <td>
                                        <button class="btn btn-secondary btn-sm rounded-0"><i class="fa fa-edit"></i> Edit</button>
                                        <button class="btn btn-danger btn-sm rounded-0"><i class="fa fa-trash"></i> Delete</button>
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
                        <h5 class="modal-title" id="ModalTaskLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Task Name</label>
                            <input type="text" name="name" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="">Priority</label>
                            <select name="prior" id="" class="form-control">
                                <option value="low">Low</option>
                                <option value="medium">Medium</option>
                                <option value="high">High</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary rounded-0" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary rounded-0">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    methods: {
        showModal(){
            $("#ModalTask").modal("show");
        }
    },
    mounted(){
        console.log('component task')
    }
}
</script>

