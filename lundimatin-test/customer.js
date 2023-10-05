// Récupération de l'id dans l'url

let params = new URLSearchParams(document.location.search);

let id = params.get("id");

// fetch get pour récupérer l'utilisateur correspondant à l'id

$(document).ready(function () {
    loadCostumer();
});

function loadCostumer() {
    fetch(`http://localhost:8888/php-lundimatin/customer?id=${id}`, {
        method: 'GET',
    })
        .then(response => {
            if (!response.ok) {
                throw new Error(`Error loading users: ${response.statusText}`);
            }
            return response.json();
        })
        .then(data => {
            // Display users
            displayCostumers(data)
        })
        .catch(error => {
            console.error('Error loading users:', error);
        });

}

function displayCostumers(data) {
    $("#customer-name").text(data.datas.nom)
    $("#customer-input-name").val(data.datas.nom)
    $("#customer-input-tel").val(data.datas.tel)
    $("#customer-input-email").val(data.datas.email)
    $("#customer-input-adresse").val(data.datas.adresse)
}

$(".button-edit").on("click", function () {
    $("#customer-input-name").removeAttr('disabled');
    $("#customer-input-tel").removeAttr('disabled');
    $("#customer-input-email").removeAttr('disabled');
    $("#customer-input-adresse").removeAttr('disabled');
    $(".save-button").css("display", "block");
    $(".cancel-button").css("display", "block");
    $("#customer-input-name").css('border', "1px solid black");
    $("#customer-input-tel").css('border', "1px solid black");
    $("#customer-input-email").css('border', "1px solid black");
    $("#customer-input-adresse").css('border', "1px solid black");
})

$(".cancel-button").on("click", function () {
    $("#customer-input-name").attr('disabled', 'disabled');
    $("#customer-input-tel").attr('disabled', 'disabled');
    $("#customer-input-email").attr('disabled', 'disabled');
    $("#customer-input-adresse").attr('disabled', 'disabled');
    $(".save-button").css("display", "none");
    $(".cancel-button").css("display", "none");
    $("#customer-input-name").css('border', "transparent");
    $("#customer-input-tel").css('border', "transparent");
    $("#customer-input-email").css('border', "transparent");
    $("#customer-input-adresse").css('border', "transparent");
})


$(".save-button").on("click", function(){

    const updatedData = {
        nom: $("#customer-input-name").val(),
        tel: $("#customer-input-tel").val(),
        email: $("#customer-input-email").val(),
        adresse : $("#customer-input-adresse").val(),
        id: id
        // Include other updated fields as needed
    };

    console.log(updatedData)
    
    fetch(`http://localhost:8888/php-lundimatin/update/`, {
        method: 'PUT',
        headers: 
        {
            'Access-Control-Allow-Origin': '*',
            'Content-Type': 'application/json',
        },
        body: updatedData
    })
        .then(response => {
            if (!response.ok) {
                throw new Error(`Error loading users: ${response.statusText}`);
            }
            return response.json();
        })
        .then(data => {
            // Display users
            console.log(data)
            loadCostumer();
        })
        .catch(error => {
            console.error('Error loading users:', error);
        });
})