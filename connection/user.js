// Изменение пользователей
const userForm = document.getElementById("users-form");
const createUserButton = document.getElementById("create-user");
const updateUserButton = document.getElementById("update-user");
const deleteUserButton = document.getElementById("delete-user");

createUserButton.addEventListener("click", function () {
    userForm.action = ".././changes/users/create_user.php";
    userForm.submit();
});

updateUserButton.addEventListener("click", function () {
    userForm.action = ".././changes/users/update_user.php";
    userForm.submit();
});

deleteUserButton.addEventListener("click", function () {
    userForm.action = ".././changes/users/delete_user.php";
    userForm.submit();
});