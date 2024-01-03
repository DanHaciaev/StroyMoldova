// Изменение компаний

const manufForm = document.getElementById("manufacture-form");
const createManufButton = document.getElementById("create-manufac");
const deleteManufButton = document.getElementById("delete-manufac");
const updateManufButton = document.getElementById("update-manufac");

createManufButton.addEventListener("click", function () {
    manufForm.action = ".././changes/manufactures/create_manuf.php";
    manufForm.submit();
});

deleteManufButton.addEventListener("click", function () {
    manufForm.action = ".././changes/manufactures/delete_manuf.php";
    manufForm.submit();
});


updateManufButton.addEventListener("click", function () {
    manufForm.action = ".././changes/manufactures/update_manuf.php";
    manufForm.submit();
});