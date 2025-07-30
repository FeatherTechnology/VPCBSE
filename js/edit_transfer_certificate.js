$(document).on('click','.printpo',function(){
    var tcID = $(this).attr('value');
    $.ajax({
        url: 'ajaxFiles/transfer_certificate_print.php',
        cache: false,
        type: 'POST',
        data: {'tcID': tcID},
        success: function(html){
            var printWindow = window.open('', '_blank', 'height=800,width=1200');

            if (printWindow) { // Check if the window is successfully opened
                printWindow.document.write(html);
                printWindow.document.close();
                printWindow.print();
                printWindow.close();
            } else {
                alert('Pop-up blocked. Please allow pop-ups for this site.');
            }
        },
        error: function () {
            alert('Error loading print content.');
        }
    });
});
