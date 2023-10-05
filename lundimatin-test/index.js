$(document).ready(function () {
    loadCostumers();
});

function displayCostumers(data){
        let costumersList = $('.list-section');

        data.forEach(function (costumer, i) {
            costumersList.append(`
            <ul class="list-costumers">
                <li class="costumer-avatar">${costumer.datas.nom.split(" ")[0][0]}${costumer.datas.nom.split(" ")[1][0]}</li>
                <li>${costumer.datas.nom}</li>
                <li>${costumer.datas.adresse}</li>
                <li>${costumer.datas.ville}</li>
                <li>${costumer.datas.tel}</li>
                <li><a href="customer.html?id=${costumer.datas.id}"><button class="button-customers">Voir</button></a></li>
            </ul>`
            );
        });
    //}

}

function loadCostumers() {
    fetch('http://localhost:8888/php-lundimatin/', {
        method: 'GET',
    })
        .then(response => {
            console.log(response)
            if (!response.ok) {
                throw new Error(`Error loading users: ${response.statusText}`);
            }
            return response.json();
        })
        .then(data => {
            // Display users
            displayCostumers(data);
        })
        .catch(error => {
            console.error('Error loading users:', error);
        });
}
