const checkButtons = document.querySelectorAll(".task-check-button");
const calendarBody = document.getElementById("calendar-body");
const categoriesContainers = {
    "A": document.getElementById("a-tasks"),
    "B": document.getElementById("b-tasks"),
    "C": document.getElementById("c-tasks")
}

function markAsDone(e) {
    const task = this;
    const container = task.parentElement.parentElement;
    const id = container.getAttribute("id");

    container.classList.add('task-done');
    fetch(`/done/${id}`).then(() => {
        e.target.removeEventListener("click", markAsDone)
    })
}

function getTasksByDay() {
    const calendarTable = document.getElementById("calendar");
    const selectedDate = calendarTable.getAttribute("selected");
    removeAllTasks();
    addLoaders(categoriesContainers);
    fetch(`/tasks/${selectedDate}`, {
        headers: {
            'Content-Type': 'application/json'
        },
    })
        .then((response) => response.json())
        .then((json) => {
            console.log(json);
            removeAllTasks();
            createTasks(json);
        });
}

function createTasks(categories) {
    Object.values(categories).forEach(category =>
        category.forEach(task => createTask(task))
    )
}

function createTask(task) {
    const template = document.getElementById("task-template");
    const clone = template.content.cloneNode(true);
    const taskMain = clone.querySelector(".task");
    taskMain.id = task.id;
    if (task.dateEnded !== null) {
        taskMain.classList.add("task-done");
    } else {
        taskMain.getElementsByClassName("task-check-button")[0].addEventListener('click', markAsDone)
    }
    const taskContent = clone.querySelector(".task-content");
    taskContent.innerHTML = task.value;
    categoriesContainers[task.categoryName].appendChild(clone);
}

function removeAllTasks() {
    checkButtons.forEach(button => removeEventListener("click", markAsDone));
    Object.values(categoriesContainers).forEach(categoryElement => removeAllChildNodes(categoryElement));
}

function addLoaders(categories) {
    Object.values(categories).forEach(category => {
        const loader = document.createElement('div');
        loader.classList.add('loader');
        loader.classList.add('big');
        category.appendChild(loader)
    });
}

function removeAllChildNodes(parent) {
    while (parent.firstChild) {
        parent.removeChild(parent.firstChild);
    }
}

calendarBody.addEventListener("click", getTasksByDay);
checkButtons.forEach(button => {
    if (!button.parentElement.parentElement.classList.contains("task-done")){
        button.addEventListener("click", markAsDone)
    }
});
