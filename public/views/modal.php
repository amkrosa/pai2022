<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="/public/css/landing_page.css">
    <link rel="stylesheet" type="text/css" href="/public/css/buttons.css">
    <link rel="stylesheet" type="text/css" href="/public/css/abc.css">
    <link rel="stylesheet" type="text/css" href="/public/css/calendar.css">
    <link rel="stylesheet" type="text/css" href="/public/css/modal.css">
    <script src="https://kit.fontawesome.com/1437dfc48d.js" crossorigin="anonymous"></script>

    <title>mindhabit - Landing page</title>
</head>
<body>
    <div class="modal-content">
        <div class="calendar-container">
            <?php include 'calendar.php'?>
        </div>
    </div>
<script>
    const closeBtn = document.getElementsByClassName('closeBtn')[0];
    const modalBody = document.getElementsByTagName('body')[0];
    closeBtn.addEventListener('click', closeModal);
    window.addEventListener('click', outsideClick);

    // Close modal
    function closeModal() {
        parent.closeIFrame();
    }

    // Click outside and close
    function outsideClick(e) {

        if (e.target === modalBody) {
            parent.closeIFrame();
        }
    }
</script>
    <script type="module" src="/public/js/calendar.js"></script>
</body>
</html>