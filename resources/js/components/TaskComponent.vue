<template>
    <div class="container">
        <div class="row ">
            <div class="col-md-10 offset-md-1">
                <div class="card rounded-0">
                    <div class="card-header">
                        Task List
                        <button class="btn btn-primary btn-sm rounded-0 float-right"><i class="fa fa-plus"></i> Add New Task</button>
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
    </div>
</template>
