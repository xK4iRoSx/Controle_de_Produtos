
// Agoritimo de pesquisa
function digitar(event){
  
    

            $('#pesquisa').keyup(function(e){

                var termo = $('#pesquisa').val().toUpperCase();
                $('.servicos').each(function() { 
                    if($(this).html().toUpperCase().indexOf(termo) === -1) {
                        $(this).hide();
                        if(document.querySelector('#pesquisa').length == ""){
                            document.querySelector('.filter').style.display = 'none'
                        }else{
                            document.querySelector('.filter').style.display = 'block'
                        }
                    } else {
                    
                        $(this).show();
                        if(document.querySelector('#pesquisa').value == ""){
                            document.querySelector('.filter').style.display = 'none'
                        }else{
                            document.querySelector('.filter').style.display = 'block'
                        }
                        }
                });
              });  
              
 
            
         
        }



       

        
 

    

  
 
 