document.addEventListener('DOMContentLoaded', () => {
    let buttons = Array.from(document.getElementsByClassName('examples-header-link'));

    buttons.forEach(item => {
        item.onclick = (element) => {
            // Очистить блок примера работ
            document.getElementById('examples-list').innerHTML = '';
            // Убрать активность с заголовка
            document.querySelector('button[class="examples-header-link active"]').classList.remove('active');
            // Включить лоадер
            document.querySelector('.loader-block').style.display = 'flex';

            fetch('/ajax/examples.php?id=' + element.target.value)
                .then(response => {
                    return response.json();
                })
                .then(data => {
                    // Выключить лоадер
                    document.querySelector('.loader-block').style.display = 'none';
                    // Поставить активность новому заголовку
                    document.querySelector(`button[value="${data.id}"]`).classList.add('active');

                    // Заполнить блок примера работ
                    let html = '';
                    for (let example of data.examples) {
                        html +=`<div class="examples-item"><img class="examples-img" src="${example.img}" alt="example"></div>`;
                    }
                    document.getElementById('examples-list').innerHTML = html;
                })
                .catch(error => {
                    console.log(error);
                });
        };
    });
});