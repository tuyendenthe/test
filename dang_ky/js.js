const submit_login = document.querySelector('.submit-login');
const input_logins = document.querySelectorAll('.input-login');

submit_login.addEventListener('click', (e) => {
    e.preventDefault();
    let allConditionsMet = true;

    input_logins.forEach((element) => {
        if (element.name == 'code-student') {
            const value = element.value;
            if (!value.endsWith('@fpt.edu.vn')) {
                alert('Đây không phải email cao đẳng FPT');
                allConditionsMet = false;
            }
        }
        if (element.name == 'password') {
            const value = element.value;
            if (!value.startsWith('ph')) {
                alert('Mật khẩu là mã sinh viên');
                allConditionsMet = false;
            }
            if (value.length < 7) {
                alert('Độ dài tối thiểu của mật khẩu là 7 ký tự!');
                allConditionsMet = false;
            }
        }
        
    });

    if (allConditionsMet) {
        alert('Đăng ký thành công');
        window.location.href = '../dang_nhap/dangnhap.html';
    }
});


let tk = document.getElementById('tk');
    let mk = document.getElementById('mk');
    let luu = document.getElementById('luu');
    let xoamk = document.getElementById('xoa');
 
        mk.value= localStorage.getItem('count');
        tk.value= localStorage.getItem('tk');
   
   
    localStorage.getItem('count',0)
    localStorage.getItem('tk',0)
    luu.addEventListener('click',function(){
        let my_tk = tk.value;
        let my_mk = mk.value;
        console.log(my_mk);
        console.log(my_tk);
        localStorage.setItem('count',my_mk);
        localStorage.setItem('tk',my_tk);


        
    });
    xoa.addEventListener('click',function(){
        my_mk = '';
        my_tk = '';
        localStorage.setItem('count',my_mk)
        localStorage.setItem('count',my_tk)
    })
        
      