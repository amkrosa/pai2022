<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="/public/css/landing_page.css">
    <link rel="stylesheet" type="text/css" href="/public/css/buttons.css">
    <link rel="stylesheet" type="text/css" href="/public/css/abc.css">
    <link rel="stylesheet" type="text/css" href="/public/css/calendar.css">
    <link rel="stylesheet" type="text/css" href="/public/css/modal.css">
    <link rel="stylesheet" type="text/css" href="/public/css/login.css">
    <script src="https://kit.fontawesome.com/1437dfc48d.js" crossorigin="anonymous"></script>

    <title>mindhabit - Landing page</title>
</head>
<body>
<div class="create-modal-content">
    <div class="create-task-container">
        <div class="card">
            <form action="/create" method="POST">
                <div class="login-input-container">
                    <div class="login-input-wrapper">
                        <div class="login-input-label">Category</div>
                        <div class="login-input-icon"><i class="fa-solid fa-books"></i></div>
                        <input disabled name="category"/>
                    </div>
                </div>
                <div class="login-input-container text-area">
                    <div class="login-input-wrapper">
                        <div class="login-input-label">Task</div>
                        <div class="login-input-icon"><i class="fa-solid fa-align-left"></i></div>
                        <input class="input-wrap" name="value" type="text" placeholder="Task content..."/>
                    </div>
                </div>
                <button type="submit" class="button-fill-primary">Submit</button>
            </form>
            <i class="createCloseButton fa-solid fa-circle-xmark"></i>
        </div>
    </div>
</div>
<script src="/public/js/create.js"></script>
<script>
    console.log(parent.addedCategory);
    const closeBtn = document.getElementsByClassName('createCloseButton')[0];
    const modalBody = document.getElementsByClassName('create-modal-content')[0];

    // Close modal
    function closeModal() {
        parent.closeCreateTaskModal();
    }

    // Click outside and close
    function outsideClick(e) {

        if (e.target === modalBody) {
            parent.closeCreateTaskModal();
        }
    }

    window.onmessage = function(e) {
        if (e.data === 'A' || e.data === 'B' || e.data === 'C') {
            const categoryElement = document.getElementsByName('category')[0];
            categoryElement.setAttribute('value', e.data);
        }
    };

    closeBtn.addEventListener('click', closeModal);
    window.addEventListener('click', outsideClick);
</script>
</body>
</html>