<template>
    <div class="container">
        <div class="row ">
            <div class="col-md-10 offset-md-1">
                <div class="card rounded-0">
                    <div class="card-header">
                        Task List
                        <button class="btn btn-primary btn-sm rounded-0 float-right">Add New Task</button>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered table-striped">
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
                                        <a href="#" class="btn btn-secondary btn-sm rounded-0">Edit</a>
                                        <a href="#" class="btn btn-danger btn-sm rounded-0">Delete</a>
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
