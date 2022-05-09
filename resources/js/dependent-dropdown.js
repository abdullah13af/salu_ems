// subjects dependent-dropdown start
$(document).ready(function() {
  $('#department_id').on('change', function() {
     var departmentID = $(this).val();
     console.log(departmentID);
     if(departmentID) {
         $.ajax({
             url: '/get_subjects/'+departmentID,
             type: "GET",
             data : {"_token":"{{ csrf_token() }}"},
             dataType: "json",
             success:function(data)
             {
              console.log(data);
              console.log(typeof(data));
               if(data){
                  $('#subject_id').empty();
                  $('#subject_id').append('<option >Select Subject</option>'); 
                  $.each(data, function(key, subject){
                      $('select[name="subject_id"]').append('<option value="'+ subject.id +'">' + subject.name+ '</option>');
                  });
              }else{
                  $('#subject_id').empty();
              }
           }
         });
     }else{
       $('#subject_id').empty();
     }
  });
});
// subjects dependent-dropdown end

