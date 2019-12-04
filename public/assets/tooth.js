function saveJob() {
    var jobs = [];
    var id = $('#myInput').val();
    $.each($('input[name="job"]:checked'), function () {
        jobs.push($(this).val());
    });
    // Close modal
    $('#myModal').modal('hide');
    // Clean checked
    $.each($('input[name="job"]'), function () {
        $(this).prop('checked', false);
    });
}