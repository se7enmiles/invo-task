
    function delete_row(id) {
        $("#mb-remove-row").addClass("open");
        $("#mb-remove-row .mb-control-yes").attr('onclick', 'yes_delete_row('+id+')');
    }

    function yes_delete_row(id){

            var params = {
                delete_id:id
            };
            $.post('/components/Ajax.php', params, function (data, status) {
                if (status === 'success') {
                    console.log(data);
                }
            });

            $("#mb-remove-row").removeClass("open");

            $("#"+id).hide("slow",function(){
                $(this).remove();
            });
    }
