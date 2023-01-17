<?php require 'headerNav.php' ?>

<div class="container">

    <div class="containerTask">
        <div class="todoTaskTitle">
            <h3>TODO Task</h3>
        </div>
        <!-- One CARD(task) -->
        <?php foreach ($results as $key => $task) : ?>
        <div class="task draggable" draggable="true" date-id=<?php echo $task['id']; ?>>
            <!-- Title of Card -->
            <div class="taskTitle">
                <p>
                    Todo <?php echo $key + 1; ?>
                </p>
                <p>
                    Created: <span class="time"><?php echo $task['created_time']; ?></span>
                </p>
                <button class="show" id=<?php echo $key ?>>Show More</button>
                <div class="arrow bounce"></div>
            </div>

            <!-- Body of Card -->
            <div class="taskBody  <?php echo $levelOfTask[$task['level']]; ?> " style="display: none;">
                <div class="important">
                    <img class="priority" src="./assets/priority.png" alt="">
                </div>
                <h3 class="oneTask ">
                    <?php echo $task['msg']; ?>
                </h3>
            </div>
            <!-- Footer of Card -->
            <div class="taskFooter">
                <span class="from">From: <?php echo $task['created_at']; ?></span>
                <span class="to">To: <?php echo $task['created_for']; ?></span>
                <a href="deleteTodo.php?id=<?php echo $task['id'] ?>" class="delete">
                    <img src="./assets/remove.png" alt="">
                </a>
                <button class="done" data-id=<?php echo $task['id']; ?>>
                    <img src="./assets/done.png" alt="">
                </button>
            </div>
        </div>


        <?php endforeach; ?>
        <!-- END of CARD(task) -->
    </div>

    <!-- RIGHT Side of DONE TASK(card) -->
    <div class="containerTask complete">
        <div class="todoDoneTitle">
            <h3>Done Task</h3>
        </div>
    </div>
    <!-- RIGHT Side END -->
</div>

<script src="main.js"></script>
</body>

</html>