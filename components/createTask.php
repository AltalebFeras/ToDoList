<?php ?>
<div>
<h3 class="my-2 px-5 py-2 p-3 mb-2 text-dark ">Create a new task</h3>

<form id="createNewTaskForm" class="d-flex flex-column bd-highlight px-5 mb-3 form-control" method="post" action="treatmentCreateTask.php">
    <label for="taskTitle">Title * </label>
    <input id="taskTitle" type="text" name="taskTitle" minlength="3" maxlength="50" required>

    <label for="taskDescription">Description </label>
    <textarea  id="taskDescription"  name="taskDescription" rows="2" cols="25" maxlength="250"></textarea>

    <label for="taskDeadline">Deadline * </label>
    <input id="taskDeadline" type="date" name="taskDeadline" required>

    <label for="taskPriority">Priority level *</label>
    <select name="taskPriority" id="taskPriority">
        <option value="Normale"> Normale</option>
        <option value="Importante">Importante</option>
        <option value="Urgente">Urgente</option>
    </select>

    <label for="taskCategory">Category </label>
    <input id="taskCategory" type="text" name="taskCategory" required>
    
    <input type="submit" name="submit" id="createTaskButton" class="btn btn-primary my-2" value="Create">

</form>

</div>
