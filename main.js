let showBtn = document.querySelectorAll('.show');
let taskBody = document.querySelectorAll('.taskBody');

showBtn.forEach(function (el) {
	el.addEventListener('click', () => {
		let id = el.getAttribute('id');
		if (taskBody[id].style.display === 'none') {
			taskBody[id].style.display = 'flex';
		} else {
			taskBody[id].style.display = 'none';
		}
	});
});

// DRAG AND DROP
const draggables = document.querySelectorAll('.draggable');
const containers = document.querySelectorAll('.containerTask');

// effect with opacity when take draggable and remove when drop!
draggables.forEach((draggable) => {
	draggable.addEventListener('dragstart', () => {
		draggable.classList.add('dragging');
	});

	draggable.addEventListener('dragend', () => {
		draggable.classList.remove('dragging');

		checkDoneTask(draggable);
	});
});

containers.forEach((container) => {
	container.addEventListener('dragover', (e) => {
		// with preventDefault we enable to put inside the container! Cursor is not circle(disabled)
		e.preventDefault();
		const afterElement = getDragAfterElement(container, e.clientY);

		// with draggable i take one item with this class!
		const draggable = document.querySelector('.dragging');
		if (afterElement === null) {
			container.appendChild(draggable);
		} else {
			container.insertBefore(draggable, afterElement);
		}
	});
});

function getDragAfterElement(container, y) {
	// here is changed in array, all item but not current item(.dragging);
	const draggableElements = [
		...container.querySelectorAll('.draggable:not(.dragging)'),
	];

	return draggableElements.reduce(
		(closest, child) => {
			const box = child.getBoundingClientRect();
			const offset = y - box.top - box.height / 2;
			if (offset < 0 && offset > closest.offset) {
				return { offset: offset, element: child };
			} else {
				return closest;
			}
		},
		{ offset: Number.NEGATIVE_INFINITY }
	).element;
}

// here i delete on timer! when come in done task!
// let doneTask = document.querySelector('.complete');

function checkDoneTask(task) {
	let allTask = document.querySelectorAll('.complete .task');

	if (allTask.length > 0) {
		let id = null;
		allTask.forEach((el) => {
			id = el.getAttribute('date-id');
		});
		let url = `deleteTodo.php?id=${id}&x=xml`;

		setTimeout(() => {
			let xml = new XMLHttpRequest();
			xml.open('GET', `${url}`);
			xml.onreadystatechange = () => {
				if (xml.readyState == 4 && xml.status == 200) {
					window.location.reload();
					// i can get data from the server!
					// console.log(JSON.parse(xml.responseText));
				}
			};
			xml.send();
		}, 5000);
	}
}

// DONE
let doneBtn = document.querySelectorAll('.done');
let doneText = document.querySelectorAll('.oneTask');

doneBtn.forEach((el, index) => {
	el.addEventListener('click', function () {
		let id = this.getAttribute('data-id');
		doneText[index].classList.add('finish');
		let fd = new FormData();
		fd.append('id', id);
		fetch('doneTask.php', {
			method: 'POST',
			body: fd,
		})
			.then((res) => res.text())
			.then((data) => console.log(data));
	});
});
