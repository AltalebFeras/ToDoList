<?php ?>
   
   <h3 class="my-2 px-5 py-2 p-3 mb-2 bg-info text-dark ">Créer une tache</h3>
   
   <form class="d-flex flex-column bd-highlight mb-3 form-control" action="src/addTasks.php">
       <label for="taskTitle">Titre de la tâche : </label>
       <input id="taskTitle" type="text" name="taskTitle" minlength="3" maxlength="50" required>

       <label for="Description">Description</label>
       <input id="Description" type="text" name="Descriptions" minlength="3" maxlength="50">

       <label for="taskDeadline">Date limite de réalisation : </label>
       <input id="taskDeadline" type="date" name="taskDeadline" required>

       <label for="taskPriority">Niveau de priorité de la tâche : </label>
       <select name="taskPriority" id="taskPriority">
           <option value="0"> Normale</option>
           <option value="1">Importante</option>
           <option value="2">Urgente</option>
       </select>
       
        <input type="submit" name="submit" id="ajouterUneTache"  class="btn btn-primary my-2" value="Ajouter une tache" >

    </form>