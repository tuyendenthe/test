const btn_action_buy = document.querySelectorAll('.btn-action-buy');
const btn_action_add_cart = document.querySelectorAll('.btn-action-addCart');
const icon_cart = document.querySelector('.icon-cart span');
let listCart = [];
btn_action_add_cart.forEach((element) => {
    element.addEventListener('click', () => {
        const checkAdd = listCart.includes(element.parentElement.id);
        if (!checkAdd) {
            listCart.push(element.parentElement.id);
            icon_cart.innerText = listCart.length;
        } else {
            alert('Đã tồn tại trong giỏ hàng');
        }
    });
});
  