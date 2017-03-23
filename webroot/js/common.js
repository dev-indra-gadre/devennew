$(document).ready(function(){


   
    $("#designation-id").on('change', function(){
        
        var designation_id = $("#designation-id").val();

        $.ajax({
        type:'POST',
         url: "Permissions/dashboard_permission", 
 
        success: function(response) {
            window.setTimeout(function() {
                // New content replaces the loading image
                $('#abc').html(response);
            }, 1000);
        },
        data: ({ designation_id:designation_id })
        });
        return false;   
    });



// var OptionNumber = $("#OptionNumber").val();
//          var QuestionId = $("#QuestionId").val();
//         $.ajax({
//         type:'POST',
//        url:"ajax_option_dashboard",
      
//          beforeSend: function() { 
         
//         window.setTimeout(function() {
//             $(".load").css('display','block');
//             $(".load").fadeOut("slow");
            
//               }, 1000);
     

//            },
//         success: function(response) {
//             window.setTimeout(function() {
//                 // New content replaces the loading image
//                 $('#ParamBody').html(response);
//             }, 1000);
//         },
//         data: ({ OptionNumber:OptionNumber,QuestionId:QuestionId })
//         });


//   $("#OptionNumber").on('change', function(){
        
//         var OptionNumber = $("#OptionNumber").val();
//          var QuestionId = $("#QuestionId").val();
//         $.ajax({
//         type:'POST',
//        //  url: "../questions/ajax_option_dashboard",
//           url:"http://localhost/devencake2/questions/ajax_option_dashboard", 
//         // url: basePath+"questions/ajax_option_dashboard",
//          beforeSend: function() { 
         
//         window.setTimeout(function() {
//             $(".load").css('display','block');
//             $(".load").fadeOut("slow");
            
//               }, 1000);
     

//            },
//         success: function(response) {
//             window.setTimeout(function() {
//                 // New content replaces the loading image
//                 $('#ParamBody').html(response);
//             }, 1000);
//         },
//         data: ({ OptionNumber:OptionNumber,QuestionId:QuestionId })
//         });
//        // return false;   
//     });





//       var OptionNumber = $("#OptionNumber").val();
//       var correct_option = $("#correct_option_hidden").val();

//         $.ajax({
//         type:'POST',
//        // url: basePath+"questions/ajax_option_dashboard",
//          //url:"http://localhost/devencake2/questions/ajax_option_dashboard_update", 
//          url:"http://localhost/devencake2/questions/ajax_correct_option", 
//          beforeSend: function() { 
         
//         window.setTimeout(function() {
//             $(".load").css('display','block');
//             $(".load").fadeOut("slow");
            
//               }, 1000);
     

//            },
//         success: function(response) {
//             window.setTimeout(function() {
//                 // New content replaces the loading image
//                 $('#correct_option').html(response);
//             }, 1000);
//         },
//         data: ({ OptionNumber:OptionNumber,correct_option:correct_option })
//         });


//   $("#OptionNumber").on('change', function(){
        
//         var OptionNumber = $("#OptionNumber").val();
//         var correct_option = $("#correct_option_hidden").val();
//         $.ajax({
//         type:'POST',
//        //  url: "../questions/ajax_option_dashboard",
//           url:"http://localhost/devencake2/questions/ajax_correct_option", 
//         // url: basePath+"questions/ajax_option_dashboard",
//          beforeSend: function() { 
         
//         window.setTimeout(function() {
//             $(".load").css('display','block');
//             $(".load").fadeOut("slow");
            
//               }, 1000);
     

//            },
//         success: function(response) {
//             window.setTimeout(function() {
//                 // New content replaces the loading image
//                 $('#correct_option').html(response);
//             }, 1000);
//         },
//         data: ({ OptionNumber:OptionNumber,correct_option:correct_option })
//         });
//        // return false;   
//     });


      });