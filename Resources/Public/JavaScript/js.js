/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

(function($){
  $(document).ready(function(){
    
    $('.file-caption-name').html("Datei hochladen");  
    
 //   $("#addfolder").click(function () {
  //    $("#myModal").modal();
  //  });
     
      
         
      
  });
})(jQuery);





//confirm action
function ask(url, message) {

        question = window.confirm(message);

        if(question) {
            document.location.href = url;
        }
}
