
    var state= false;
    side = document.getElementById('sidebar')

    function sidebar(){
        state= !state;
        // if(state == true){
        //     
        //     console.log(state)
        // }
         console.log(state)
         if(state == true){
            side.style.marginLeft=0;
         }else{
             side.style.marginLeft=`${-250}px`;
             side.style.transition=`${0.1}s`;

         }
            
    }
    
    var search = document.getElementById('pesquisar');

    search.addEventListener("keydown", function(event) {
        if (event.key === "Enter") 
        {
            searchData();
        }
    });

    function searchData()
    {
        window.location = 'sistema.php?search='+search.value;
    }
