var BASE_URL = document.getElementById("base_url").value;

window.addEventListener("hashchange", () => {

    let opcion = window.location.hash;

    switch(opcion)
    {

        case "#/RegistroPlanAccion":
            
           
            for(let i=0; i<document.getElementsByClassName("opcion").length; i++)
            {
                document.getElementsByClassName("opcion")[i].style.display = "none";

                // $(".menu li").removeClass("activado");
            }
           
            document.querySelectorAll(".menu li").forEach(element => {
                element.classList.remove("activado");
            });
            document.getElementById("apartRegistroPlanAccion").style.display = "block";
            document.getElementById("registroPlanAccion").className = "activado";
            LoadTabletable_PlanAccion();
            
            
            
        window.location.hash = '#';   
        break;

    }

});