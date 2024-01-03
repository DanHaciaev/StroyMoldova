// Изменение продуктов

const productForm = document.getElementById("product-form");
const createProductButton = document.getElementById("create-product");
const deleteProductButton = document.getElementById("delete-product");
const updateProductButton = document.getElementById("update-product");

createProductButton.addEventListener("click", function () {
    productForm.action = ".././changes/product/create_product.php";
    productForm.submit();
});

deleteProductButton.addEventListener("click", function () {
    productForm.action = ".././changes/product/delete_product.php";
    productForm.submit();
});


updateProductButton.addEventListener("click", function () {
    productForm.action = ".././changes/product/update_product.php";
    productForm.submit();
});