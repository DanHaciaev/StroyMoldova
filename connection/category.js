// Изменение категорий

const categoryForm = document.getElementById("category-form");
const createCategoryButton = document.getElementById("create-category");
const updateCategoryButton = document.getElementById("update-category");
const deleteCategoryButton = document.getElementById("delete-category");

createCategoryButton.addEventListener("click", function () {
    categoryForm.action = ".././changes/categories/create_category.php";
    categoryForm.submit();
});

updateCategoryButton.addEventListener("click", function () {
    categoryForm.action = ".././changes/categories/update_category.php";
    categoryForm.submit();
});

deleteCategoryButton.addEventListener("click", function () {
    categoryForm.action = ".././changes/categories/delete_category.php";
    categoryForm.submit();
});