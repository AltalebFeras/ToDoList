<?php ?>


<h3 class="px-5 py-2 p-3 mb-2 bg-info text-dark">Liste des taches à faire</h3>


<div class="container" ><div></div></div>


<div id="listOfTasks" class="list-group ">
    <button id="tasksField" type="button" class="list-group-item list-group-item-action" data-bs-toggle="modal" data-bs-target="#exampleModal" > <span class="badge rounded-pill bg-danger">Urgente</span>
        The current button
    </button>



    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Description</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="taskDescription" class="modal-body">
                    ... 
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Edit</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <button type="button" class="list-group-item list-group-item-action"><span class="badge rounded-pill bg-info text-dark">Normale</span>
        A second item</button>

    <button type="button" class="list-group-item list-group-item-action"><span class="badge rounded-pill bg-warning text-dark">Importante</span>
        A third button item</button>

</div>