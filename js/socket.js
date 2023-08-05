$(function(){
    $("#form-chat").on("submit", function(e){
        e.preventDefault();
        var type = $("#form-chat").attr("type");
        
        if (type == "chat"){
            var message = $("#message").val();
            var name = $("#submit").attr("userName");

            if(message.length > 0){
                
                $.ajax({
                    type:"POST",
                    url: "controlador/modales-socket.php",
                    data: "name="+name+"&message="+message,
                    dataType: 'html',
                    success: function(data){
                        send(data);
                        //console.log(data);
                        var JSONdata = JSON.parse(data);
                        var nameData = JSONdata[0].name;
                        var messageData = JSONdata[0].message;
                        //var sesionData = JSONdata[0].sesion;
                        var dateTime = JSONdata[0].dataTime;
                        

                        $("#contenedormensaje").append(`<div class="row justify-content-end"> <div class="col-10">
                        <div class="alert alert-secondary text-end role="alert" >
                        <label>Yo: </label> ${ messageData }   <br> Fecha:${dateTime}  </div></div></div>`);
                        
                        $("#message").val('').focus();
                        var height = $("#contenedormensaje").prop('scrollHeight');
                        $("#contenedormensaje").scrollTop(height);

                        $("#message").val('').focus();
                    }
                
                })

            }else{
                alert("Ingrese un mensaje!")
                $("#message").focus();
            }
        }
    })
})