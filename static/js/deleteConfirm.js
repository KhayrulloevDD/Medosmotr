$(document).ready( function() {
    $('.removeDoc').click( function(event) {
        var confimationbtn = $('#removebtn').get(0),
            removingRow = event.target.href;
        confimationbtn.href = removingRow;
    });
});