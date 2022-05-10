// subjects dependent-dropdown start
$(document).ready(function() {
  get_departments();
  $('#department_id').on('change', get_departments);

});

  function get_departments() {
    var departmentID = $('#department_id').val();
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
 }
// subjects dependent-dropdown end

