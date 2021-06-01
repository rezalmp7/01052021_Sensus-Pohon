function showPassword() {
    var x = document.getElementById("myInput");
    var button = document.getElementById("buttonShowPassword");
    if (x.type === "password") {
        x.type = "text";
        button.innerHTML = '<span class="iconify" data-icon="bx:bxs-hide" data-inline="false"></span>';
    } else {
        x.type = "password";
        button.innerHTML = '<span class="iconify" data-icon="bx:bxs-show" data-inline="false"></span>';
    }
}
$(document).ready(function () {
    $('#data_table').DataTable({
        "ordering": false
    });
    $('#selectAll').click(function (e) {
        $(this).closest('table').find('td input:checkbox').prop('checked', this.checked);
    });
    $('.select2_include').select2();
});