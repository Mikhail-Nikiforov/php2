let buttons = document.getElementsByClassName('btn_changeStatus');
buttons = Array.prototype.slice.call(buttons);

async function changeStatus(statusId, orderId, action) {
    const response = await fetch('async_request.php', {
        method: 'POST',
        headers: new Headers({
            'Content-Type': 'application/json'
        }),
        body: JSON.stringify({
            orderId: orderId,
            statusId: statusId,
            action: action,
        }),
    })
        .then(res => res.text())
        .then(res => {
            alert(`Статус изменён на '${res}'`);
            if (res == 0) {
                console.log(res)

            }
        })
        .catch(err => console.error(err));
}

buttons.forEach((button) => {
    button.addEventListener('click', () => {
        let selectedIndex = document.getElementById(`select${button.dataset.id}`).options.selectedIndex;
        let statusId = document.getElementById(`select${button.dataset.id}`).options[selectedIndex].value;
        let orderId = button.dataset.id;
        let action = "changeOrderStatus";

        changeStatus(statusId, orderId, action);
    })
})