// Inicializar los formularios


document.addEventListener('DOMContentLoaded', function() {
    initForms();
    fetchBenefits();
});

function initForms() {
    // Obtener los formularios de la página
    var forms = document.querySelectorAll('form');

    // Iterar sobre los formularios y agregar los event listeners
    for (var i = 0; i < forms.length; i++) {
        forms[i].addEventListener('submit', handleFormSubmit);
    }
}

function handleFormSubmit(event) {
    event.preventDefault(); // Evitar el envío del formulario por defecto
    submitForm(event.target);
}

function submitForm(form) {
    // Lógica para enviar el formulario de manera asíncrona utilizando AJAX
    var formData = new FormData(form);

    fetch('submit_form.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        // Mostrar un mensaje de éxito o actualizar la interfaz de usuario
        console.log('Formulario enviado:', data);
    })
    .catch(error => {
        console.error('Error al enviar el formulario:', error);
    });
}

function fetchBenefits() {
    fetch('get_data.php')
        .then(response => response.json())
        .then(data => {
            // Actualizar la interfaz de usuario con los datos obtenidos
            updateBenefitsList(data);
        })
        .catch(error => {
            console.error('Error al obtener los datos:', error);
        });
}

function updateBenefitsList(benefits) {
    var benefitsList = document.getElementById('benefits-list');
    benefitsList.innerHTML = '';

    benefits.forEach(function(benefit) {
        var li = document.createElement('li');
        li.textContent = benefit.nombre + ' - ' + benefit.descripcion;
        benefitsList.appendChild(li);
    });
}
