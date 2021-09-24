document.addEventListener('DOMContentLoaded', () => {
    
    const goods = document.querySelectorAll('.card__title');
    const overlay = document.querySelector('.overlay');
    const form = document.querySelector('.form');

    document.querySelectorAll('.card__btn').forEach((button, index) => {
        button.addEventListener('click', () => {
            document.querySelector('.form__title').value = goods[index].textContent;
            overlay.classList.add('active');
        })
    })

    overlay.addEventListener('click', (e) => {
        if (e.target != form) {
            overlay.classList.remove('active');
        }
    })

    form.addEventListener('submit', (e) => {
        e.preventDefault();
        const formData = new FormData(form);
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "http://localhost/test_work/dist/mailer/smart.php")
        xhr.onload = function() {
            if (xhr.status === 200) {
                console.log('sucsess')
                form.reset();
                overlay.classList.remove('active');
            } 
            else {
                console.log('failure')
            }
        }
        xhr.onerror = function() { 
            console.log('error')
        }
        xhr.send(formData); 
    })
    
})

