const myInput = document.getElementById("my-input");
function stepper(btn){
    event.preventDefault();
    let id = btn.getAttribute("id");
    let min = myInput.getAttribute("min");
    let max = myInput.getAttribute("max");
    let step = parseInt(myInput.getAttribute("step")); // Chuyển step sang dạng số nguyên
    let val = parseInt(myInput.value); // Lấy giá trị của ô input dưới dạng số nguyên
    let calcStep;

    switch (id) {
        case "increment":
            calcStep = step * 1;
            break;
        case "increment5":
            calcStep = step * 5;
            break;
        case "decrement":
            calcStep = step * -1;
            break;
        case "decrement5":
            calcStep = step * -5;
            break;
        default:
            calcStep = 0;
            break;
    }
    let newVal = val + calcStep;

    if(newVal >= min && newVal <= max){
        myInput.value = newVal; // Gán giá trị mới cho ô input
    }
}


// const myButton = document.getElementById("add-cart");
// const notification = document.getElementById("notification");
// myButton.addEventListener("click", function() {
//     // Hiển thị thông báo
//     notification.style.display = "block";

//     // Tự đóng thông báo sau 2 giây
//     setTimeout(function() {
//         notification.style.display = "none";
//     }, 2000);
// });