<?php ?>
<div>

    <h3 class="my-2 px-5 py-2 p-3 mb-2  text-dark ">My tasks</h3>

    <div id="listOfTasks" class="list-group ">
        <button id="tasksField" type="button" class="list-group-item list-group-item-action" data-bs-toggle="modal" data-bs-target="#exampleModal"> <span class="badge rounded-pill bg-danger">Urgente</span>
            The current button
        </button>



        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit your task</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div id="taskDescription" class="modal-body">
                        <!-- THE taskDescription -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary">Confirme</button>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>