const botones = document.querySelectorAll("#menu a");

botones.forEach(boton => {

    boton.addEventListener("mouseenter", () => {
        boton.style.transform = "scale(1.3)";
        boton.style.transition = "0.3s";
    });

    boton.addEventListener("mouseleave", () => {
        boton.style.transform = "scale(1)";
    });

});