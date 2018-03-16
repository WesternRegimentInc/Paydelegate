var baseURL = location.protocol + "//" + location.hostname + (location.port && ":" + location.port) + "";

$('payoption').change(function(){
   var options = $('#payoption').val();    
   $.post(baseURL + '/paydelegate/accounts/getoptions/'+ options, { options: options }, function(data){
    $('#optionsdata').html(data);   
   }); 
});