const checkButtons = document.querySelectorAll(".task-check-button");
const calendarBody = document.getElementById("calendar-body");
const categoriesContainers = {
    "A": document.getElementById("a-tasks"),
    "B": document.getElementById("b-tasks"),
    "C": document.getElementById("c-tasks")
}

function markAsDone() {
    const task = this;
    const container = task.parentElement.parentElement;
    const id = container.getAttribute("id");

    fetch(`/done/${id}`).then(() => {
        container.classList.add('task-done');
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
    if (task.dateEnded !== null)    taskMain.classList.add("task-done");
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
        category.appendChild(loader)
    });
}

function removeAllChildNodes(parent) {
    while (parent.firstChild) {
        parent.removeChild(parent.firstChild);
    }
}

calendarBody.addEventListener("click", getTasksByDay);
checkButtons.forEach(button => button.addEventListener("click", markAsDone));
