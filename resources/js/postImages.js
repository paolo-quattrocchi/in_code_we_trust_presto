const Dropzone = require("dropzone");
const { add } = require("lodash");

$(function() {
    if ($("#drophere").length > 0 ){
        
        //alert('piffero');
        
        let csrfToken = $('input[name="_token"]').attr('value');
        let uniqueSecret = $('input[name="uniqueSecret"]').attr('value');
        //alert(csrfToken);
        //alert(uniqueSecret);
        let myDropzone = new Dropzone('#drophere', {
            url: '/post/images/upload',
            
            params: {
                _token: csrfToken,
                uniqueSecret: uniqueSecret
            },
            
            addRemoveLinks: true,


            init:function(){
                
                $.ajax({
                    
                    type:'GET',
                    url:'/post/images',
                    data:{
                        uniqueSecret: uniqueSecret
                    },
                    dataType:'json',
                    
                }).done(function(data){
                                   
                    $.each(data, function(key,value){                    
                        
                        let file = {                           
                            serverId: value.id                          
                        };
                        
                        myDropzone.options.addedfile.call(myDropzone, file);
                        myDropzone.options.thumbnail.call(myDropzone, file, value.src);
                                                                       
                    });


                });

            }

               });
                
                myDropzone.on("success", function(file, response){
                    file.serverId = response.id;
                });
                
                myDropzone.on("removedfile", function(file){
                    $.ajax({
                        type: 'DELETE',
                        url: '/post/images/remove',
                        data: {
                            _token: csrfToken,
                            id: file.serverId,
                            uniqueSecret: uniqueSecret
                        },
                        dataType: 'json'
                    });
                });
                
                
            }
        })