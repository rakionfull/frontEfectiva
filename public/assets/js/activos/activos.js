var BASE_URL = document.getElementById("base_url").value;

window.addEventListener("hashchange", () => {

    let opcion = window.location.hash;

    switch(opcion)
    {
        case "#/Empresa":
            
           
            for(let i=0; i<document.getElementsByClassName("opcion").length; i++)
            {
                document.getElementsByClassName("opcion")[i].style.display = "none";

                // $(".menu li").removeClass("activado");
            }
           
            document.querySelectorAll(".menu li").forEach(element => {
                element.classList.remove("activado");
            });
            document.getElementById("apartEmpresa").style.display = "block";
            document.getElementById("empresa").className = "activado";
            LoadTableEmpresa();
            
            
            
        window.location.hash = '#';   
        break;
        
        case "#/Area":
            
       
        for(let i=0; i<document.getElementsByClassName("opcion").length; i++)
        {
            document.getElementsByClassName("opcion")[i].style.display = "none";
        }
        document.querySelectorAll(".menu li").forEach(element => {
            element.classList.remove("activado");
        });
        document.getElementById("apartArea").style.display = "block";
        document.getElementById("area").className = "activado";
        LoadTableAreaEmpresa();
        

        window.location.hash = '#';   
        break;

        case "#/Unidades":
          
        for(let i=0; i<document.getElementsByClassName("opcion").length; i++)
        {
            document.getElementsByClassName("opcion")[i].style.display = "none";
        }
        document.querySelectorAll(".menu li").forEach(element => {
            element.classList.remove("activado");
        });
        document.getElementById("apartUnidades").style.display = "block";
        document.getElementById("unidades").className = "activado";
        LoadTableUnidades();
        cargarDatosUnidadesEmpresa();
        

        window.location.hash = '#';   
        break;

        case "#/Macroproceso":
            
           
            for(let i=0; i<document.getElementsByClassName("opcion").length; i++)
            {
                document.getElementsByClassName("opcion")[i].style.display = "none";

                // $(".menu li").removeClass("activado");
            }
           
            document.querySelectorAll(".menu li").forEach(element => {
                element.classList.remove("activado");
            });
            document.getElementById("apartMacroproceso").style.display = "block";
            document.getElementById("macroproceso").className = "activado";
            LoadTableMacroproceso();
            cargarDatosMacroEmpresa();
            
        window.location.hash = '#';   
        break;
                
        case "#/Proceso":
            
           
            for(let i=0; i<document.getElementsByClassName("opcion").length; i++)
            {
                document.getElementsByClassName("opcion")[i].style.display = "none";

                // $(".menu li").removeClass("activado");
            }
           
            document.querySelectorAll(".menu li").forEach(element => {
                element.classList.remove("activado");
            });
            document.getElementById("apartProceso").style.display = "block";
            document.getElementById("proceso").className = "activado";
            LoadTableProceso();
            cargarDatosProEmpresa();
            
        window.location.hash = '#';   
        break;
        
        case "#/Posicion":
            
           
            for(let i=0; i<document.getElementsByClassName("opcion").length; i++)
            {
                document.getElementsByClassName("opcion")[i].style.display = "none";

                // $(".menu li").removeClass("activado");
            }
           
            document.querySelectorAll(".menu li").forEach(element => {
                element.classList.remove("activado");
            });
            document.getElementById("apartPosicion").style.display = "block";
            document.getElementById("posicion_puesto").className = "activado";
            LoadTablePosicion();
            cargarDatosPosEmpresa();
            
            
        window.location.hash = '#';   
        break;
        
        case "#/AspectoSeg":
          
        for(let i=0; i<document.getElementsByClassName("opcion").length; i++)
        {
            document.getElementsByClassName("opcion")[i].style.display = "none";
        }
        document.querySelectorAll(".menu li").forEach(element => {
            element.classList.remove("activado");
        });
        document.getElementById("apartAspectoSeg").style.display = "block";
        document.getElementById("aspectoSeg").className = "activado";
        LoadTableAspectoSeg();

        window.location.hash = '#';   
        break;

        case "#/Valor_activo":
            
       
        for(let i=0; i<document.getElementsByClassName("opcion").length; i++)
        {
            document.getElementsByClassName("opcion")[i].style.display = "none";
        }
        document.querySelectorAll(".menu li").forEach(element => {
            element.classList.remove("activado");
        });
        document.getElementById("apartValor_activo").style.display = "block";
        document.getElementById("valor_activo").className = "activado";
        LoadTableValorActivo();
        
        window.location.hash = '#';   
        break;

        case "#/Tipo_activo":
                   
        for(let i=0; i<document.getElementsByClassName("opcion").length; i++)
        {
            document.getElementsByClassName("opcion")[i].style.display = "none";
        }
        document.querySelectorAll(".menu li").forEach(element => {
            element.classList.remove("activado");
        });
        document.getElementById("apartTipo_activo").style.display = "block";
        document.getElementById("tipo_activo").className = "activado";
        LoadTableTipo_activo();

        window.location.hash = '#';   
        break;

        case "#/Categoria_activo":
            
           
            for(let i=0; i<document.getElementsByClassName("opcion").length; i++)
            {
                document.getElementsByClassName("opcion")[i].style.display = "none";

                // $(".menu li").removeClass("activado");
            }
           
            document.querySelectorAll(".menu li").forEach(element => {
                element.classList.remove("activado");
            });
            document.getElementById("apartCatActivo").style.display = "block";
            document.getElementById("Categoria_activo").className = "activado";
            LoadTableCatActivo();
            cargarDatosCatActivo();
        window.location.hash = '#';   
        break;
        
        case "#/Ubicacion_activo":
            
           
            for(let i=0; i<document.getElementsByClassName("opcion").length; i++)
            {
                document.getElementsByClassName("opcion")[i].style.display = "none";

                // $(".menu li").removeClass("activado");
            }
           
            document.querySelectorAll(".menu li").forEach(element => {
                element.classList.remove("activado");
            });
            document.getElementById("apartUbiActivo").style.display = "block";
            document.getElementById("ubicacion_activo").className = "activado";
            LoadTableUbiActivo();
            cargarDatosContinentes();
            
        window.location.hash = '#';   
        break;
        
        case "#/Valoracion_activo":
            
           
            for(let i=0; i<document.getElementsByClassName("opcion").length; i++)
            {
                document.getElementsByClassName("opcion")[i].style.display = "none";

                // $(".menu li").removeClass("activado");
            }
           
            document.querySelectorAll(".menu li").forEach(element => {
                element.classList.remove("activado");
            });
            document.getElementById("apartValActivo").style.display = "block";
            document.getElementById("valoracion_activo").className = "activado";
            LoadTableValActivo();
            cargarDatosValActivo();
        window.location.hash = '#';   
        break;
        
        case "#/Clasificacion_informacion":
            
       
        for(let i=0; i<document.getElementsByClassName("opcion").length; i++)
        {
            document.getElementsByClassName("opcion")[i].style.display = "none";
        }
        document.querySelectorAll(".menu li").forEach(element => {
            element.classList.remove("activado");
        });
        document.getElementById("apartClasificacion_informacion").style.display = "block";
        document.getElementById("clasificacion_informacion").className = "activado";
        LoadTableClasificacion_informacion();

        window.location.hash = '#';   
        break;

       }    

});