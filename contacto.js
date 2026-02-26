function guardarContacto() {

    const nombre = document.getElementById("nombre").value;
    const correo = document.getElementById("correo").value;
    const telefono = document.getElementById("telefono").value;

    if(nombre === "" || correo === "" || telefono === ""){
        alert("Completa todos los campos");
        return;
    }

    const contacto = {
        nombre,
        correo,
        telefono
    };

    let contactos = JSON.parse(localStorage.getItem("contactos")) || [];

    contactos.push(contacto);

    localStorage.setItem("contactos", JSON.stringify(contactos));

    mostrarContactos();

}

function mostrarContactos(){

    const lista = document.getElementById("listaContactos");

    lista.innerHTML = "";

    const contactos = JSON.parse(localStorage.getItem("contactos")) || [];

    contactos.forEach(c => {

        lista.innerHTML += `
            <div class="contacto">
                <strong>${c.nombre}</strong><br>
                ${c.correo}<br>
                ${c.telefono}
            </div>
        `;

    });

}

mostrarContactos();