$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$('body').bootstrapMaterialDesign();

function escapeHtml(text) {
    return text.toString()
        .replace(/&/g, "&amp;")
        .replace(/</g, "&lt;")
        .replace(/>/g, "&gt;")
        .replace(/"/g, "&quot;")
        .replace(/'/g, "&#039;");
}

function showMessage(message) {
    $.snackbar({content: message});
}


$('#get_ills_form').submit(function (e) {
    e.preventDefault();
    $.ajax({
        method: "GET",
        url: "/ajax/ill",
        data: $('#get_ills_form').serialize(),
        success: function (data) {
         if(data.status !== "OK"){
             showMessage(data.message);
         }
         else{
             $('#ills_table tbody').empty();
             data.data.forEach(function (item) {
                 item.first_name = escapeHtml(item.first_name);
                 item.last_name = escapeHtml(item.last_name);
                 item.name  = escapeHtml(item.name);
                 $('#ills_table tbody').append(`<tr><td>${item.first_name} ${item.last_name}</td><td>${item.name}</td></tr>`)
             });
         }
        }
    });
});

$('#get_medic_info').submit(function (e) {
    e.preventDefault();
    $.ajax({
        method: "GET",
        url: "/ajax/medic_info",
        data: $('#get_medic_info').serialize(),
        success: function (data) {
            if(data.status !== "OK"){
                showMessage(data.message);
                $('#medic_card')[0].style.display = "none";
            }
            else{
                $('#medic_card')[0].style.display = "block";
                data = data.data;
                $('#medic_name').html(escapeHtml(data.name));
                $('#medic_type').html(escapeHtml(data.use_type));
                $('#medic_action').html(escapeHtml(data.action));
                $('#medic_post').html(escapeHtml(data.post_effect));
            }
        }
    });
});

$('#new_report_form').submit(function (e) {
   e.preventDefault();
   $.ajax({
      method: "POST",
      url: "/ajax/new_report",
      data: $('#new_report_form').serialize(),
      success: function (data) {
          if(data.status !== "OK"){
              showMessage(data.message)
          }else {
              $('#new_report_form')[0].reset();
              showMessage('Отчет успешно добавлен');
          }
      }
   });
});

$('#new_medic_form').submit(function (e) {
    e.preventDefault();
    $.ajax({
        method: "POST",
        url: "/ajax/new_medic",
        data: $('#new_medic_form').serialize(),
        success: function (data) {
            if(data.status !== "OK"){
                showMessage(data.message)
            }else {
                $('#new_medic_form')[0].reset();
                showMessage('Лекарство успешно добавлена');
            }
        }
    });
});
