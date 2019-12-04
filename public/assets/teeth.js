function clickTeeth(id) {
    $('#myModal').modal('show');
    $('#myInput').val(id);
    $('#myModalLabel').text('Diente ' + id);
}