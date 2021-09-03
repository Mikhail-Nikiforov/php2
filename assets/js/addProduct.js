let button = document.getElementById('addToBasket');
button.addEventListener('click', () => {
    let quantity = document.getElementById('quantity').value;
    let productId = button.dataset.id;
    let action = "addProduct";

    async function addProduct() {
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
                document.getElementById('productBuyForm').innerText = res;
            })
            .catch(err => console.error(err));
    }
    addProduct();
})


