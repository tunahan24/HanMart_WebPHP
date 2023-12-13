document.addEventListener('DOMContentLoaded', function () {
    const quantityContainers = document.querySelectorAll('.product-button');

    quantityContainers.forEach(function (container) {
        const decreaseButton = container.querySelector('.decrease');
        const increaseButton = container.querySelector('.increase');
        const quantityInput = container.querySelector('.quantity');

        decreaseButton.addEventListener('click', function () {
            let currentValue = parseInt(quantityInput.value);
            if (currentValue > 0) {
                quantityInput.value = currentValue - 1;
            }
        });

        increaseButton.addEventListener('click', function () {
            let currentValue = parseInt(quantityInput.value);
            quantityInput.value = currentValue + 1;
        });
    });
});
function xoaSp(){
    var conf =confirm("Bạn có chắc chắn muốn xóa sản phẩm khỏi giỏ hàng không?");
    return conf;
}

