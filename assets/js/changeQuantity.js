let buttons = document.getElementsByClassName('btn_changeQuantity');
buttons = Array.prototype.slice.call(buttons);

function totalSum() {
    let totalSum = 0;
    buttons.forEach(function(button){
        totalSum += button.dataset.price * button.dataset.quantity;
    })
    document.getElementById('totalSum').innerHTML = totalSum;
}

async function changeQuantity(quantity, productId, action) {
    const response = await fetch('async_request.php', {
        method: 'POST',
        headers: new Headers({
            'Content-Type': 'application/json'
        }),
        body: JSON.stringify({
            productId: productId,
            quantity: quantity,
            action: action,
        }),
    })
        .then(res => res.text())
        .then(res => {
            if (res == 0) {
                document.getElementById(`changeQuantity${productId}`).dataset.quantity = res;
                totalSum();
                document.getElementById(`product${productId}`).innerHTML = "Товар удален из корзины";
                setTimeout(() => {
                    document.getElementById(`product${productId}`).innerHTML = "";
                }, 5000)
            }

        })
        .catch(err => console.error(err));
}

buttons.forEach((button) => {
    button.addEventListener('click', () => {
        let productId = button.dataset.id;
        let quantity = document.getElementById(`quantity${productId}`).value;
        let action = "changeQuantity";

        changeQuantity(quantity, productId, action);

    })

})
