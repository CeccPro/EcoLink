document.addEventListener("DOMContentLoaded", () => {
  const plantas = document.querySelectorAll(".planta");

  plantas.forEach(planta => {
    planta.addEventListener("mouseover", () => {
      planta.style.transform = "scale(1.05)";
      planta.style.boxShadow = "0px 0px 15px #6c6";
    });

    planta.addEventListener("mouseout", () => {
      planta.style.transform = "scale(1)";
      planta.style.boxShadow = "0px 0px 5px #ccc";
    });
  });

  // Si agregás buscador en el futuro:
  const buscador = document.getElementById("buscador");
  if (buscador) {
    buscador.addEventListener("input", e => {
      const valor = e.target.value.toLowerCase();
      plantas.forEach(planta => {
        const nombre = planta.querySelector("h2").textContent.toLowerCase();
        planta.style.display = nombre.includes(valor) ? "block" : "none";
      });
    });
  }
});
