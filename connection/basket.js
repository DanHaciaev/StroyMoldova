// Изменение корзины

const basketForm = document.getElementById("basket-form");
const createBasketButton = document.getElementById("create-basket");
const updateBasketButton = document.getElementById("update-basket");
const deleteBasketButton = document.getElementById("delete-basket");

createBasketButton.addEventListener("click", function () {
    basketForm.action = ".././changes/orders/create_basket.php";
    basketForm.submit();
});

updateBasketButton.addEventListener("click", function () {
    basketForm.action = ".././changes/orders/update_basket.php";
    basketForm.submit();
});

deleteBasketButton.addEventListener("click", function () {
    basketForm.action = ".././changes/orders/delete_basket.php";
    basketForm.submit();
});