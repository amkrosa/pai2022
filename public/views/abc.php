<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="/public/css/abc.css">
    <link rel="stylesheet" type="text/css" href="/public/css/landing_page.css">
    <link rel="stylesheet" type="text/css" href="/public/css/buttons.css">
    <link rel="stylesheet" type="text/css" href="/public/css/calendar.css">
    <link rel="stylesheet" type="text/css" href="/public/css/loader.css">

    <script src="https://kit.fontawesome.com/1437dfc48d.js" crossorigin="anonymous"></script>

    <title>mindhabit - Landing page</title>
</head>
<body>
<div class="base-container">
    <nav>
        <?php include "logo.php"; ?>
        <div class="nav-select">
            <div class="nav-icon">
                <i class="fa-solid fa-a"></i>
                <i class="fa-solid fa-b"></i>
                <i class="fa-solid fa-c"></i>
            </div>
            <p>Prioritization</p>
        </div>
        <div class="logout">
            <form action="/logout" method="POST">
                <button type="submit" class="button-fill-primary logout-button">
                    <i class="fa-solid fa-arrow-right-from-bracket"></i>
                    <div class="logout-text">Logout</div>
                </button>
            </form>
        </div>
    </nav>
    <main>
        <h3 class="title">ABC Technique</h3>
        <div class="content-container">
            <div class="desktop calendar-container">
                <?php include 'calendar.php' ?>
            </div>
            <section>
                <div id="A" class="category">Category A</div>
                <div id="a-tasks">
                    <?php
                    if (isset($tasks)) {
                        $categoryA = $tasks['A'];
                        foreach ($categoryA as $task): ?>
                            <div id="<?= $task->getId(); ?>"
                                 class="task<?= $task->getDateEnded() != null ? " task-done" : ""; ?>">
                                <div class="task-check">
                                    <i class="task-check-button fa-solid fa-circle-check"></i>
                                </div>
                                <div class="task-content">
                                    <?= $task->getValue() ?>
                                </div>
                            </div>
                        <?php endforeach;
                    } ?>
                </div>
                <div class="addButton-wrapper">
                    <i id="add-a" class="addButton fa-solid fa-circle-plus"></i>
                </div>
            </section>
            <section>
                <div id="B" class="category">Category B</div>
                <div id="b-tasks">
                    <?php
                    if (isset($tasks)) {
                        $categoryB = $tasks['B'];
                        foreach ($categoryB as $task): ?>
                            <div id="<?= $task->getId(); ?>"
                                 class="task<?= $task->getDateEnded() != null ? " task-done" : ""; ?>">
                                <div class="task-check">
                                    <i class="task-check-button fa-solid fa-circle-check"></i>
                                </div>
                                <div class="task-content">
                                    <?= $task->getValue() ?>
                                </div>
                            </div>
                        <?php endforeach;
                    } ?>
                </div>
                <div class="addButton-wrapper">
                    <i id="add-b" class="addButton fa-solid fa-circle-plus"></i>
                </div>
            </section>
            <section>
                <div id="C" class="category">Category C</div>
                <div id="c-tasks">
                    <?php
                    if (isset($tasks)) {
                        $categoryC = $tasks['C'];
                        foreach ($categoryC as $task): ?>
                            <div id="<?= $task->getId(); ?>"
                                 class="task<?= $task->getDateEnded() != null ? " task-done" : ""; ?>">
                                <div class="task-check">
                                    <i class="task-check-button fa-solid fa-circle-check"></i>
                                </div>
                                <div class="task-content">
                                    <?= $task->getValue() ?>
                                </div>
                            </div>
                        <?php endforeach;
                    } ?>
                </div>
                <div class="addButton-wrapper">
                    <i id="add-c" class="addButton fa-solid fa-circle-plus"></i>
                </div>
            </section>
        </div>
    </main>
    <i id="modalBtn" class="fa-solid fa-calendar"></i>

    <div id="simpleModal" class="modal-overlay">
        <iframe id="modal-iframe" src="/modal" allowtransparency="true"></iframe>
    </div>

    <div id="create-task-modal" class="modal-overlay">
        <iframe id="create-modal-iframe" src="/create" allowtransparency="true"></iframe>
    </div>
</div>
<script>
    // Get modal element
    const modal = document.getElementById('simpleModal');
    const createTaskModal = document.getElementById('create-task-modal');
    // Get open modal button
    const modalBtn = document.getElementById('modalBtn');
    const createTaskButtons = [document.getElementById('add-a'), document.getElementById('add-b'), document.getElementById('add-c')];

    // Listen for open click
    modalBtn.addEventListener('click', openModal);

    // Open modal
    function openModal() {
        modal.style.display = 'flex';
    }

    function openCreateTaskModal(e) {
        createTaskModal.style.display = 'flex';
        addedCategory = e.target.id.substring(4).toUpperCase();
        const iframe = document.getElementById('create-modal-iframe');
        const selectedDate = document.getElementById('calendar').getAttribute('selected');
        iframe.contentWindow.postMessage(addedCategory, '*');
        iframe.contentWindow.postMessage(selectedDate, '*');
    }

    function closeCreateTaskModal() {
        createTaskModal.style.display = 'none';
        getTasksByDay();
    }

    function closeIFrame() {
        modal.style.display = 'none';
        getTasksByDay();
    }
</script>
<script src="/public/js/calendar.js"></script>
<script src="/public/js/tasks.js"></script>
<template id="task-template">
    <div id="" class="task">
        <div class="task-check">
            <i class="task-check-button fa-solid fa-circle-check"></i>
        </div>
        <div class="task-content">content</div>
    </div>
</template>
</body>
</html>