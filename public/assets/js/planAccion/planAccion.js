var BASE_URL = document.getElementById("base_url").value;

window.addEventListener("hashchange", () => {

    let opcion = window.location.hash;

    switch(opcion)
    {
        
        case "#/Estado":
            
           
            for(let i=0; i<document.getElementsByClassName("opcion").length; i++)
            {
                document.getElementsByClassName("opcion")[i].style.display = "none";

                // $(".menu li").removeClass("activado");
            }
           
            document.querySelectorAll(".menu li").forEach(element => {
                element.classList.remove("activado");
            });
            document.getElementById("apartEstado").style.display = "block";
            document.getElementById("estado").className = "activado";
            LoadTableEstado();
            
            
            
        window.location.hash = '#';   
        break;

        case "#/Prioridad":
            
           
            for(let i=0; i<document.getElementsByClassName("opcion").length; i++)
            {
                document.getElementsByClassName("opcion")[i].style.display = "none";

                // $(".menu li").removeClass("activado");
            }
           
            document.querySelectorAll(".menu li").forEach(element => {
                element.classList.remove("activado");
            });
            document.getElementById("apartPrioridad").style.display = "block";
            document.getElementById("prioridad").className = "activado";
            LoadTablePrioridad();
            
            
            
        window.location.hash = '#';   
        break;

        case "#/AlertaSeguimiento":
            
           
            for(let i=0; i<document.getElementsByClassName("opcion").length; i++)
            {
                document.getElementsByClassName("opcion")[i].style.display = "none";

                // $(".menu li").removeClass("activado");
            }
           
            document.querySelectorAll(".menu li").forEach(element => {
                element.classList.remove("activado");
            });
            document.getElementById("apartAlertaSeguimiento").style.display = "block";
            document.getElementById("alertaSeguimiento").className = "activado";
            LoadTableAlerSeguimiento();
            
            
            
        window.location.hash = '#';   
        break;

    }    

});