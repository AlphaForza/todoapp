let deleteBtn = document.querySelectorAll('.delete');

deleteBtn.forEach((del)=>{
    del.addEventListener('click', deleteTask);
});


function deleteTask(){
    let id = this.getAttribute('id');
    let fd = new FormData();
    fd.append("id", id);

    fetch('deleteTodo.php', {
        method: 'POST',
        body: fd,
    })
        .then((res) => res.text())
        .then((data) => console.log(data));


}
