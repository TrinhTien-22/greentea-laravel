// function confirmDelete(menuid) {
//     var confirmdelete = confirm("Yes sure Delete");
//     if (confirmdelete) {
//         $.ajax({
//             type: "DELETE",
//             url: "/dashboard/menu/delete/" + menuid,
//             headers: {
//                 "X-CSRF-TOKEN": $('mete[name="csrf-token"]'),
//             },
//             success: function (respone) {
//                 alert(respone.message);
//             },
//         });
//     }
// }
