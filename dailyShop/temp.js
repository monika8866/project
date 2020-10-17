
$('.aa-filter-btn').click(function()
{
    var someValue = $("#skip-value-lower").text();
    var some = $("#skip-value-upper").text();
$.ajax({
    method: "POST",
    url: "product.php",
    data: { id1: someValue, id2: some},
})
});