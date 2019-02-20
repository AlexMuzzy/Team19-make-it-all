$(document).ready(function () {
    $('#resultsTable').DataTable();

    $('.form-control').addClass('shadow rounded border-0');
    $('.modal').addClass('border-0');
    $('.btn').addClass('shadow');
    $('.dataTables_filter input').addClass('shadow rounded border-0');
    $('.dataTables_length select').addClass('shadow rounded border-0');
    if($('#inputSolved').find('option:contains("No")')){
        $('#inputSolvedText').hide();
    }
});
