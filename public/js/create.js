const submitBtn = document.getElementById("submit");

function postTask(event) {
    event.preventDefault();
    const form = document.getElementsByTagName("form")[0];
    const date = document.getElementsByName("date")[0];
    const category = document.getElementsByName("category")[0];
    const value = document.getElementsByName("value")[0];

    if (!validatePostTask(value)) {
        return;
    }

    const data = {
        date: date.getAttribute("value"),
        category: category.getAttribute("value"),
        value: value.value
    }

    const loader = document.createElement('div');
    loader.classList.add('loader');
    form.appendChild(loader);
    fetch(`/task`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    })
        .then((response) => response.json())
        .then((json) => {
            console.log(json);
            document.getElementsByClassName("loader")[0].remove();
            value.value = "";
            parent.closeCreateTaskModal();
        });
}

function validatePostTask(value) {
    const messages = document.querySelector(".messages");
    if (!value.value) {
        value.classList.add('invalid')
        messages.textContent = "Task cannot be empty."
        return false;
    }
    messages.textContent = ""
    value.classList.remove('invalid');
    return true;
}

submitBtn.addEventListener('click', postTask);
