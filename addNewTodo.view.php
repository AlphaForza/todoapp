<?php

$page = 'addNewTodo';
require 'headerNav.php'; ?>


<div class="newTask">
    <h2>Create One TASK</h2>
    <form action="addNewTodo.php" method="POST">

        <input type="text" name="created_for" placeholder="Created For">
        <input type="text" name="created_at" placeholder="Created From">
        <input type="number" min="1" max="3" name="level" placeholder="Insert Priority">
        <input type="datetime-local" name="datetime">
        <textarea type="text" name="msg" rows="10" cols="50" maxlength="255" placeholder="Insert Task"></textarea>
        <button type="submit">ADD TASK</button>
    </form>
</div>

</body>

</html>