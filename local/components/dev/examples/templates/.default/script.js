document.addEventListener('DOMContentLoaded', () => {
    let buttons = Array.from(document.getElementsByClassName('examples-header-link'));

    buttons.forEach(item => {
        item.onclick = (e) => {
            let request = fetch('/ajax/examples.php?id=' + e.target.value);
            document.getElementById('examples-list').innerHTML = '';
            document.querySelector('button[class="examples-header-link active"]').classList.remove('active');
            document.querySelector('.loader-block').style.display = 'flex';

            request
                .then(response => {
                    return response.json();
                })
                .then(data => {
                    document.querySelector('.loader-block').style.display = 'none';

                    let examples = data.examples;
                    let id = data.id;

                    document.querySelector(`button[value="${id}"]`).classList.add('active');

                    let examplesList = document.getElementById('examples-list');

                    let html = '';
                    for (let example of examples) {
                        html +=`<div class="examples-item"><img class="examples-img" src="${example.img}" alt="example"></div>`;
                    }
                    examplesList.innerHTML = html;
                })
                .catch(error => {
                    console.log(error);
                });
        };
    });
});