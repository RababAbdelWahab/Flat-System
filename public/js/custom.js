var flatId=1;
$(document).ready(function () {
    $("#flatSelect").change(function (event) {
        flatId= $(this).val();
    });
});

// function getFlatReceivables() {
//     if (flatId!=null) {
//         $('#receivables-container').slideDown(500);
//         $('#receivable_id').children('option').remove();
//         $.ajax({
//             type: 'GET',
//             url: '/abmAssessment/public/flatsreceivables/get',
//             data: { flatId: flatId },
//             success: function (data) {
//                 console.log(data);
//                 if (data.status == 'success') {
//                     var list = data.list;
//                     $('#receivable_id').append(list.map(function (sObj) {
//                         var selected = '';
//                         // if (sObj._id == offer_id_val) {
//                         //     selected = 'selected';
//                         // }
//                         return '<option value="' + sObj.id + '" '  + '>' + sObj.receivableName + '</option>'
//                     }));
//                 } else {
//                     alert(' 1حدث خطأ من فضلك اختر رقم الشقة مرة اخرى');
//                 }
//             },
//             error: function (err) {
//                 alert('2حدث خطأ من فضلك اختر رقم الشقة مرة اخرى');
//             }
//         });
//     }
//  }