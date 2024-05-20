function showProducts()
{
    $.ajax({
        url: "/api/products",
        dataType: "json",
        success: function (data)
        {
            let html = '';

            for (let item of data)
            {
                html = html + "<h2>" + item.name + "</h2><p>" + item.description + "</p>";
            }

            $('#productsList').append(html);
        }
    })
}
//
// $('#productStore').submit(function (e) {
//     e.preventDefault();
//
//     // const data = new FormData(this);
//
//     let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
//
//     $.ajax({
//         url: "/api/products/store",
//         method: "POST",
//         dataType: "JSON",
//         data: {
//             _token: CSRF_TOKEN,
//             name: $('#name').val(),
//             count: $('#count').val(),
//             cost: $('#cost').val(),
//             description: $('#description').val(),
//         },
//         // processData: false,
//         // contentType: false,
//
//         success: function(data)
//         {
//             console.log(data)
//         }
//     });
// });
